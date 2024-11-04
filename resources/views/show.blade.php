<link rel="stylesheet" href="{{ asset('css/show.css') }}">


<header>
        <h1>Welcome to Blog page</h1>
        <nav>
            <ul>
                <li><a href="{{ url('logout') }}">Logout</a></li>
                <li><a href="{{ url('blog') }}">ADD NEW</a></li>
               
            </ul>
        </nav>
    </header>



<div class="blog-container">
    @foreach($blog as $user)

    <div class="blog-card">
            <img src="{{ url('storage/public/' . $user->path) }}" alt="Blog Image" class="blog-image">
            <div class="blog-content">
                <p class="title">{{ $user->title }}</p>
                <p class="limited-content">{{ $user->content }}</p>
                <p>Created by: {{ $user->user->name }}</p>
                <div class="blog-actions">
                <a href="{{ url('detail', $user->id) }}">Detail</a>

                @auth 
                @if (Auth::id() === $user->user_id)
                    <a href="{{ url('delete', $user->id) }}" class="delete-button" >Delete</a>
                    <a href="{{ url('edit', $user->id) }}" class="edit-button" >Edit</a>
                @endif
                @endauth
</div>
            </div>
        </div>
    @endforeach
</div>
<footer>
        <p>&copy; {{ date('Y') }} Your Blog Name. All rights reserved.</p>
    </footer>