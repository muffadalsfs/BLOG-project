<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Blog Detail Page</title>
</head>
<body>
    <!-- Detail Page Content -->
    <div class="detail-container">
        <h1>Detail Page</h1>
        <img src="{{ url('storage/public/' . $show->path) }}" alt="Blog Image" class="blog-image">
        <h2>Title: {{ $show->title }}</h2>
        <h3>Content:</h3>
        <p>{{ $show->content }}</p>
        <a href="{{ url('show') }}" class="cancel-button">Back to Blogs</a>
        <a href="{{ url('/') }}" class="cancel-button">Back to Home</a>
    </div>
</body>
</html>
