<?php

namespace App\Http\Controllers;

use App\Services\SpotifyService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use \Illuminate\Http\JsonResponse;
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


    public function search(Request $request): JsonResponse
    {
        try {
            $query = $request->get('q');
            $type = $request->get('type', 'track');
            $limit = $request->get('limit', 20);

            $results = $this->spotify->search($query, $type, $limit);
            return response()->json($results);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
