# Music Blog with Spotify Integration

A modern music blog platform built with Laravel, featuring Spotify integration for playlist management and music
discovery.

## Features

- **Blog System**
    - Latest music stories
    - Categorized music content
    - Rich media support
    - SEO-friendly URLs

- **Spotify Integration**
    - Search tracks
    - View personal playlists
    - manage playlists
    - Seamless authentication

- **User Management**
    - Authentication
    - User profiles
    - Spotify account linking

## Requirements

- PHP >= 8.1
- Composer
- MySQL/PostgreSQL
- Spotify Developer Account

## Installation

1. Clone the repository:

    ```bash
    git clone <repository-url>
    cd music-blog
    ```
    2. Install dependencies:

        ```bash
        composer install
        ```
        3. Configure environment variables:

            ```bash
            cp .env.example .env
     
            ```
           Update the `.env` file with your database and Spotify API credentials.
            4. Generate application key:

           ```bash
             php artisan key:generate
             ```
            5. Configure the database in .env file:

           
            DB_CONNECTION=mysql
              DB_HOST=127.0.0.1
              DB_PORT=3306
              DB_DATABASE=music_blog
            DB_USERNAME=root
            DB_PASSWORD=

        6. Configure Spotify API credentials in .env:
            SPOTIFY_CLIENT_ID=your_client_id
            SPOTIFY_CLIENT_SECRET=your_client_secret
            SPOTIFY_REDIRECT_URI=http://your_address/spotify/callback
        
        7. Run migrations:
        
        ```bash
        php artisan migrate
        ```
        8. Serve the application:
        
        ```bash
        php artisan serve
        ```
