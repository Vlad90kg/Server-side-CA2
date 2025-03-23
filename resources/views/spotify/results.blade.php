@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold mb-6">Spotify Results for "{{ $query }}"</h2>
        <form action="{{ route('spotify.search') }}" method="GET" class="mb-6">
            <input type="text" name="q" placeholder="Search for tracks or artists..."
                   value="{{ request('q', 'The Beatles') }}"
                   class="border rounded p-2 w-3/4">
            <button type="submit" class="bg-green-500 text-white rounded p-2">Search</button>
        </form>

        @foreach($results->tracks->items as $track)
            <div class="mb-4 border rounded-lg p-4 shadow">
                <h3 class="text-xl font-semibold">{{ $track->name }}</h3>
                <p>by {{ $track->artists[0]->name }}</p>
                <a href="{{ $track->external_urls->spotify }}" class="text-green-500" target="_blank">
                    Listen on Spotify
                </a>
            </div>
        @endforeach

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($results->tracks->items as $track)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ $track->album->images[0]->url }}" alt="{{ $track->name }}" class="w-full">

                    <div class="p-4">
                        <h3 class="text-xl font-semibold">{{ $track->name }}</h3>
                        <p class="text-gray-600">
                            @foreach($track->artists as $artist)
                                {{ $artist->name }}@if(!$loop->last), @endif
                            @endforeacH
                        </p>
                        <a href="{{ $track->external_urls->spotify }}" target="_blank"
                           class="inline-block mt-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Listen on Spotify
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
