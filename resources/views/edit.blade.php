<link rel="stylesheet" href="{{asset('css/edit.css')}}">



<h2 class="edit-title">EDIT PAGE</h2>
<form action="/update/{{$blog->id}}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    @method('PUT')
    
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $blog->title }}" required class="input-field">

    <label for="content">Content</label>
    <textarea name="content" required class="textarea-field">{{ $blog->content }}</textarea>

  

    <!-- @if($blog->path)
        <p class="current-image">Current Image: <img src="{{ asset('storage/public/' . $blog->path) }}" alt="Image" class="current-image-thumbnail"></p>
        <label>
            <input type="checkbox" name="remove_image" value="1"> Remove current image
        </label>
    @endif -->
            <div class="image-container">
            @if($blog->path)
            <div class="current-image-wrapper">
                        <img src="{{ asset('storage/public/' . $blog->path) }}" alt="Image" class="current-image-thumbnail" id="currentImage">
                        

                        <!-- "X" button in the top-right corner of the image -->
                        <button type="button" class="remove-image-btn" id="removeImageBtn">&times;</button>
                    </div>
                    <label id="removeImageLabel">
                        <input type="checkbox" name="remove_image" value="1" style="display: none;"> <!-- Hidden by default -->
                    </label>
                    @endif
            </div>
            <!-- Image upload input, initially hidden if there's a current image -->
            <input type="file" name="file" class="file-input" id="fileInput" required class="input-field" 
            style="display: {{ $blog->path ? 'none' : 'block' }};">

            <button type="submit" class="submit-button">Update Blog</button>
            <a href="{{ url('show') }}" class="cancel-link">Cancel</a>
</form>
<script>
    document.getElementById('removeImageBtn').addEventListener('click', function() {
        // Hide the current image and remove button
        document.getElementById('currentImage').style.display = 'none';
        this.style.display = 'none';

        // Unhide the hidden checkbox and file input field
        document.querySelector('[name="remove_image"]').checked = true;
        document.getElementById('fileInput').style.display = 'block';
    });
</script>
