<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SpotifyService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyController extends Controller
{
    private $spotify;
    private $spotifySession;

    public function __construct(SpotifyService $spotify)
    {
        $this->spotify = $spotify;
    }

    public function auth()
    {
        \Illuminate\Support\Facades\Log::info('Auth method called');
        return Socialite::driver('spotify')
            ->scopes([
                'user-read-email',
                'user-read-private',
                'playlist-read-private',
                'playlist-modify-public',
                'playlist-modify-private'
            ])
            ->redirect();
    }

    public function callback(Request $request)
    {
        if ($request->has('error')) {
            return redirect()->route('login')->with('error', 'Spotify Authentication Failed.');
        }

        try {
            $spotifyUser = Socialite::driver('spotify')->user();

            $user = User::updateOrCreate(
                ['email' => $spotifyUser->email],
                [
                    'name' => $spotifyUser->name ?? 'Spotify User',
                    'password' => Hash::make(Str::random(24)),
                    'spotify_token' => $spotifyUser->token,
                    'spotify_refresh_token' => $spotifyUser->refreshToken,
                    'spotify_token_expires_at' => now()->addSeconds($spotifyUser->expiresIn)
                ]
            );

            Auth::login($user, true);

            return redirect()->route('spotify.search', ['q' => 'beatles']);

        } catch (Exception $e) {
            Log::error('Spotify Callback Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }


    public function search(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('spotify.auth');
        }

        try {
            $query = $request->input('q', 'beatles');
            $type = $request->input('type', 'track');
            $limit = $request->input('limit', 20);

            $results = $this->spotify->search($query, $type, $limit);

            return view('spotify.results', compact('results', 'query'));
        } catch (Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }

    public function playlists(): JsonResponse
    {
        try {
            $playlists = $this->spotify->getUserPlaylists();
            return response()->json($playlists);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function playlist($id): JsonResponse
    {
        try {
            $playlist = $this->spotify->getPlaylist($id);
            return response()->json($playlist);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createPlaylist(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'nullable|string|max:300',
                'public' => 'boolean'
            ]);

            $playlist = $this->spotify->createPlaylist(
                $validated['name'],
                $validated['description'] ?? '',
                $validated['public'] ?? false
            );

            return response()->json($playlist);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
