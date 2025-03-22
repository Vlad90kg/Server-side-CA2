@extends('layouts.app')

@section('content')
    <div class="background-image flex items-center justify-center h-36 bg-gray-800 text-white relative" style="background-image: url('https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <h1 class="text-4xl font-bold relative z-10">
            About Us
        </h1>
    </div>

    <div class="m-auto w-4/5 py-10 grid grid-cols-2 gap-4">
        <div class="bg-gray-200 p-4 text-gray-700 text-lg">
            <p class="py-4">
                Welcome to <span class="bold-text">MusicHub</span>! We are passionate about connecting people through the power of music. Our platform is dedicated to sharing inspiring stories, breaking music news, and exclusive artist interviews that resonate with every beat of your heart.
            </p>
            <p class="py-4">
                Founded in 2010 by a group of dedicated music enthusiasts, <span class="bold-text">MusicHub</span> has grown from a small local initiative into a vibrant online community of listeners, artists, and industry professionals. Our journey began with a simple idea: to create a space where every music lover can discover new sounds and share their passion.
            </p>
            <p class="py-4">
                Our mission is to celebrate musical diversity and provide a dynamic platform for discovering emerging artists, exploring different genres, and keeping up with the latest trends in the music world. From rock and jazz to electronic beats and classical symphonies, we cover it all.
            </p>
        </div>
        <div class="bg-gray-200 p-4 text-gray-700 text-lg">
            <p class="py-4">
                At <span class="bold-text">MusicHub</span>, we believe that music has the power to transform lives, spark creativity, and build communities. We are committed to offering high-quality content, insightful reviews, and engaging multimedia experiences that inspire and connect our audience.
            </p>
            <p class="py-4">
                Our dedicated team is composed of experienced journalists, creative designers, and tech-savvy professionals, all working together to bring you the best in music content. We continuously strive for excellence, innovation, and authenticity in every story we share.
            </p>
            <p class="py-4">
                Thank you for being part of our musical journey. Whether you're here to explore new tracks, revisit timeless classics, or get inspired by exclusive behind-the-scenes insights, <span class="bold-text">MusicHub</span> is your destination for all things music.
            </p>
            <p class="py-4">
                Stay tuned for exciting updates, special events, and fresh content that keeps the rhythm of music alive in our hearts and homes.
            </p>
        </div>
    </div>
@endsection
