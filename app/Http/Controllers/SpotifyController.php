<?php

namespace App\Http\Controllers;

use App\Services\SpotifyService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SpotifyController extends Controller
{
    private $spotify;

    public function __construct(SpotifyService $spotify)
    {
        $this->spotify = $spotify;
    }

    public function auth()
    {
        return redirect($this->spotify->getAuthUrl());
    }

    public function callback(Request $request)
    {
        try {
            if ($request->error) {
                throw new Exception('Authorization failed: ' . $request->error);
            }

            $code = $request->get('code');
            $this->spotify->handleCallback($code);

            return redirect()->route('dashboard')->with('success', 'Spotify connected successfully');
        } catch (Exception $e) {
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }
}
