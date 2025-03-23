@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-3xl font-bold mb-6">Your Spotify Playlists</h2>

        @foreach($playlists->items as $playlist)
            <div class="mb-4 flex items-center justify-between bg-gray-800 rounded-lg shadow-lg p-4 hover:bg-gray-700 transition-colors duration-200">
                <div>
                    <h3 class="text-xl font-semibold text-white">{{ $playlist->name }}</h3>
                    @if($playlist->description)
                        <p class="text-gray-400 text-sm">{{ Str::limit($playlist->description, 100) }}</p>
                    @else
                        <p class="text-gray-500 text-sm italic">No description provided</p>
                    @endif
                </div>
                <a href="{{ route('spotify.playlist.show', ['id' => $playlist->id]) }}"
                   class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition duration-200">
                    View Playlist
                </a>
            </div>
        @endforeach


    </div>
@endsection
