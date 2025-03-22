<?php


namespace App\Services;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use Illuminate\Support\Facades\Cache;


class SpotifyService
{
    private $client_id;
    private $client_secret;
    private $redirect_uri;
    private $api;
    private $session;

    public function __construct()
    {
        $this->client_id = config('services.spotify.client_id');
        $this->client_secret = config('services.spotify.client_secret');
        $this->redirect_uri = config('services.spotify.redirect_uri');
        $this->session = new Session(
            $this->client_id,
            $this->client_secret,
            $this->redirect_uri
        );
        $this->api = new SpotifyWebAPI();
    }

    public function getAuthUrl()
    {
        $scopes = [
            'user-read-email',
            'user-read-private',
            'playlist-read-private',
            'playlist-modify-public',
            'playlist-modify-private'
        ];

        return $this->session->getAuthorizeUrl([
            'scope' => $scopes
        ]);
    }

    public function handleCallback($code)
    {
        $this->session->requestAccessToken($code);
        Cache::put('spotify_access_token', $this->session->getAccessToken(), 3600);
        Cache::put('spotify_refresh_token', $this->session->getRefreshToken());

        return $this->session->getAccessToken();
    }

    private function getApi()
    {
        $accessToken = Cache::get('spotify_access_token');

        if (!$accessToken) {
            if ($refreshToken = Cache::get('spotify_refresh_token')) {
                $this->session->refreshAccessToken($refreshToken);
                $accessToken = $this->session->getAccessToken();
                Cache::put('spotify_access_token', $accessToken, 3600);
            }
        }

        $this->api->setAccessToken($accessToken);
        return $this->api;
    }

// Search Methods
    public function search($query, $type = 'track', $limit = 20)
    {
        return $this->getApi()->search($query, $type, ['limit' => $limit]);
    }

    // Playlist Methods
    public function getUserPlaylists($limit = 20)
    {
        return $this->getApi()->getMyPlaylists(['limit' => $limit]);
    }

    public function getPlaylist($playlistId)
    {
        return $this->getApi()->getPlaylist($playlistId);
    }

    public function createPlaylist($name, $description = '', $public = false)
    {
        return $this->getApi()->createPlaylist([
            'name' => $name,
            'description' => $description,
            'public' => $public
        ]);
    }



}
