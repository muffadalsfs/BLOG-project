<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    <title>Home Page</title>
</head>
<body>
<header>
    <h1>Welcome to Our Blog</h1>
    <nav>
        <ul>
            @guest
                <!-- Show Login and Register only for guests -->
                <li><a href="{{ url('login') }}">Login</a></li>
                <li><a href="{{ url('register') }}">Register</a></li>
                <li><a href="{{ url('show') }}">blog page</a></li>
            @else
                <!-- Show Logout for authenticated users -->
                <li><a href="{{ url('show') }}">All Blogs</a></li>
                <li><a href="{{ url('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                </li>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </nav>
</header>

<main>
    <h2>Latest Blogs</h2>
    <div class="blog-container">
        @foreach($data as $blog)
            <div class="blog-card">
                <img src="{{ url('storage/public/' . $blog->path) }}" alt="Blog Image" class="blog-image">
                <h3>{{ $blog->title }}</h3>
                <p class="limited-content">{{ Str::limit($blog->content, 100, '...') }}</p>
                <a href="{{ route('blog.detail', $blog->id) }}">Read More</a>
            </div>
        @endforeach
    </div>
</main>

<footer>
    <p>&copy; {{ date('Y') }} Your Blog Name. All rights reserved.</p>
</footer>
</body>
</html>
