@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-3xl font-bold mb-6">Your Spotify Playlists</h2>

        @foreach($playlists->items as $playlist)
            <div class="mb-4 border rounded-lg p-4 shadow">
                <h3 class="text-xl font-semibold">{{ $playlist->name }}</h3>
                <p>{{ $playlist->description }}</p>
                <a href="{{ route('spotify.playlist.show', ['id' => $playlist->id]) }}" class="text-blue-500">View Playlist</a>
            </div>
        @endforeach

        <a href="{{ route('spotify.playlist.create') }}" class="mt-6 inline-block bg-green-500 text-white px-4 py-2 rounded">
            Create New Playlist
        </a>
    </div>
@endsection
