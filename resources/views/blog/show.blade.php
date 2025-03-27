<!-- resources/views/blog/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15">
        <div>
            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
        </div>
        <div>
            <h1 class="text-6xl">
                {{ $post->title }}
            </h1>

            <span class="text-gray-500 mt-4 block">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <div class="mt-4">
                    <a href="/blog/{{ $post->slug }}/edit"
                       class="bg-blue-500 text-gray-100 text-sm font-extrabold py-2 px-4 rounded-3xl mr-2">
                        Edit Post
                    </a>

                    <form action="/blog/{{ $post->slug }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button class="bg-red-500 text-gray-100 text-sm font-extrabold py-2 px-4 rounded-3xl"
                                type="submit">
                            Delete Post
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
