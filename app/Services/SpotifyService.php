<?php


namespace App\Services;
use Exception;
use Illuminate\Support\Facades\Cache;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;


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

    public function getAuthUrl(): string
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

    public function handleCallback($code): string
    {
        $this->session->requestAccessToken($code);
        Cache::put('spotify_access_token', $this->session->getAccessToken(), 3600);
        Cache::put('spotify_refresh_token', $this->session->getRefreshToken());

        return $this->session->getAccessToken();
    }

    /**
     * @throws Exception
     */
    private function getApi(): SpotifyWebAPI
    {
        if (!auth()->check()) {
            throw new Exception('User not authenticated');
        }

        $user = auth()->user();
        $accessToken = $user->spotify_token;

        if (!$accessToken) {
            throw new Exception('Spotify token not found in user record');
        }

        if ($user->spotify_token_expires_at <= now()) {
            throw new Exception('Spotify token expired, re-authenticate');
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
