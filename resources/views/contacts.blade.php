@extends('layouts.app')

@section('content')
    <div class="background-image flex items-center justify-center h-36 bg-gray-800 text-white relative" style="background-image: url('https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <h1 class="text-4xl font-bold relative z-10">
            Contact Us
        </h1>
    </div>

    <div class="m-auto w-4/5 py-10 grid grid-cols-2 gap-4">
        <div class="bg-gray-200 p-4 text-gray-700">
            <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" class="w-full p-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" class="w-full p-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Message</label>
                    <textarea rows="4" class="w-full p-2 border rounded-md"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Send Message</button>
            </form>
        </div>

        <div class="bg-gray-200 p-4 text-gray-700">
            <h2 class="text-2xl font-bold mb-4">Contact Information</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-bold">Address</h3>
                    <p>123 Music Street</p>
                    <p>Melody City, MC 12345</p>
                </div>
                <div>
                    <h3 class="font-bold">Email</h3>
                    <p>info@musichub.com</p>
                    <p>support@musichub.com</p>
                </div>
                <div>
                    <h3 class="font-bold">Phone</h3>
                    <p>+1 (555) 123-4567</p>
                    <p>+1 (555) 987-6543</p>
                </div>
                <div>
                    <h3 class="font-bold">Business Hours</h3>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                    <p>Saturday: 10:00 AM - 4:00 PM</p>
                    <p>Sunday: Closed</p>
                </div>
            </div>
        </div>
    </div>
@endsection
