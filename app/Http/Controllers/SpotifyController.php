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

}
