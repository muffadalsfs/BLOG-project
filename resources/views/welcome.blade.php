<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> <!-- Link to your CSS file -->

    <title>Home Page</title>
</head>
<body>
<header>
        <h1>Welcome to Home  Blog</h1>
        <nav>
            <ul>
                <li><a href="{{ url('login') }}">Login</a></li>
                <li><a href="{{ url('show') }}">Blog page</a></li>
                <li><a href="{{ url('register') }}">Register</a></li>
            </ul>
        </nav>
    </header>
   
    <!-- Main Content -->
    <main>
        <h2>Latest Blogs</h2>
        <div class="blog-container">
            @foreach($data as $blog)
                <div class="blog-card">
                    <img src="{{ url('storage/public/' . $blog->path) }}" alt="Blog Image" class="blog-image">
                    <h3>{{ $blog->title }}</h3>
                    <p class="limited-content">{{ $blog->content }}</p>
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
