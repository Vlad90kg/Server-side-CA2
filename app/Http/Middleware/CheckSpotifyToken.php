<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SpotifyWebAPI\SpotifyWebAPI;

class CheckSpotifyToken
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user || !$user->spotify_token || $user->spotify_token_expires_at <= now()) {
            return redirect()->route('spotify.auth');
        }

        // Ensure API is configured with user's token
        $spotifyApi = app(SpotifyWebAPI::class);
        $spotifyApi->setAccessToken($user->spotify_token);

        return $next($request);
    }
}
