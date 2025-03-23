@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-3xl font-bold mb-4">{{ $playlist->name }}</h2>
        <p>{{ $playlist->description }}</p>

        <h3 class="text-2xl font-semibold mt-8">Tracks</h3>
        <ul>
            @foreach($playlist->tracks->items as $item)
                <li class="border-b py-2">
                    {{ $item->track->name }} by {{ implode(', ', array_map(fn($artist) => $artist->name, $item->track->artists)) }}
                </li>
            @endforeach
        </ul>

        <a href="{{ route('spotify.playlists') }}" class="text-blue-500 mt-6 inline-block">Back to playlists</a>
    </div>
@endsection
