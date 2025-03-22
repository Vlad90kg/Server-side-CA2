@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('spotify.search') }}" method="GET">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search tracks...">
            <select name="type">
                <option value="track">Tracks</option>
                <option value="album">Albums</option>
                <option value="artist">Artists</option>
            </select>
            <button type="submit">Search</button>
        </form>

        @if(isset($results))
            <div class="results mt-4">
                @foreach($results->items as $item)
                    <div class="result-item">
                        <h4>{{ $item->name }}</h4>
                        <!-- Display other item details -->
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
