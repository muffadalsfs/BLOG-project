<link rel="stylesheet" href="{{asset('css/edit.css')}}">

<link rel="stylesheet" href="{{ asset('css/edit.css') }}">

<h2 class="edit-title">EDIT PAGE</h2>
<form action="/update/{{$blog->id}}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    @method('PUT')
    
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $blog->title }}" required class="input-field">

    <label for="content">Content</label>
    <textarea name="content" required class="textarea-field">{{ $blog->content }}</textarea>

    <label for="file">Image</label>
    <input type="file" name="file" class="file-input">

    @if($blog->path)
        <p class="current-image">Current Image: <img src="{{ asset('storage/public/' . $blog->path) }}" alt="Image" class="current-image-thumbnail"></p>
        <label>
            <input type="checkbox" name="remove_image" value="1"> Remove current image
        </label>
    @endif

    <button type="submit" class="submit-button">Update Blog</button>
    <a href="{{ url('show') }}" class="cancel-link">Cancel</a>
</form>
