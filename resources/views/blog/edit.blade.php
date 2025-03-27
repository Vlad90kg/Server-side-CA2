<!-- resources/views/blog/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15">
        <div>
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full">

            <div class="mt-4">
                <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                            Update Image
                        </label>
                        <input type="file"
                               name="image"
                               class="border rounded w-full py-2 px-3"
                               accept="image/jpeg,image/png,image/webp,image/gif">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Title
                        </label>
                        <input type="text"
                               name="title"
                               value="{{ $post->title }}"
                               class="border rounded w-full py-2 px-3">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            Description
                        </label>
                        <textarea name="description"
                                  class="border rounded w-full py-2 px-3 h-60">{{ $post->description }}</textarea>
                    </div>

                    <button type="submit"
                            class="bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                        Submit Post
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
