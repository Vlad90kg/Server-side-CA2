@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto relative" style="background-image: url('https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="flex text-gray-100 pt-10 relative">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Feel the Rhythm of Life!
                </h1>
                <a
                    href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Discover Music
                </a>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Ready for a Musical Journey?
            </h2>

            <p class="py-8 text-gray-500 text-s">
                Dive into a world filled with captivating harmonies and soul-stirring rhythms.
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Explore the stories behind the melodies, discover emerging artists, and let every beat inspire you.
            </p>

            <a
                href="/blog"
                class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Learn More
            </a>
        </div>
    </div>

    <div class="text-center p-15 text-white relative" style="background-image: url('https://images.unsplash.com/photo-1499415479124-43c32433a620?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <h2 class="text-2xl pb-5 text-l relative">
            Explore a World of Sound...
        </h2>

        <span class="font-extrabold block text-4xl py-1 relative">
            Rock & Roll
        </span>
        <span class="font-extrabold block text-4xl py-1 relative">
            Jazz & Blues
        </span>
        <span class="font-extrabold block text-4xl py-1 relative">
            Classical Elegance
        </span>
        <span class="font-extrabold block text-4xl py-1 relative">
            Electronic Vibes
        </span>
    </div>

    <div class="text-center py-15 ">
        <span class="uppercase text-s text-black">
            Music Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Latest Music Stories
        </h2>

        <div class="m-auto w-4/5 text-black">
            @foreach($posts as $post)
                <div class="py-5 grid grid-cols-2 gap-4 items-center border-b border-gray-600 bg-gray-200">
                    <div class="pl-7">
                        <img src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-1/2 rounded-lg shadow-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="text-2xl pr-8 font-bold">{{ $post->title }}</h3>
                        <p class="text-black pr-8 text-xl overflow-hidden" style="max-height: 4.5em; line-height: 1.5em;">
                            {{ $post->description }}
                        </p>
                        <a href="{{ url('/blog/' . $post->slug) }}" class="text-blue-500">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    MUSIC
                </span>

                <h3 class="text-xl font-bold py-10">
                    Immerse yourself in a symphony of sounds, where every note tells a story and every melody awakens your soul.
                </h3>

                <a
                    href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Discover More
                </a>
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="">
        </div>
    </div>
@endsection
