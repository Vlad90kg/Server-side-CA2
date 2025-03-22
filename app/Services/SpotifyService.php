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


}
