<link rel="stylesheet" href="{{ asset('css/edit.css') }}">

<h2 class="edit-title">EDIT PAGE</h2>
<form action="/update/{{$blog->id}}" method="POST" enctype="multipart/form-data" class="edit-form" onsubmit="return validateForm()">
    @csrf
    @method('PUT')
    
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $blog->title }}" required class="input-field">

    <label for="content">Content</label>
    <textarea name="content" required class="textarea-field">{{ $blog->content }}</textarea>

    @if($blog->path)
        <div class="image-container">
            <div class="current-image-wrapper">
                <img src="{{ asset('storage/public/' . $blog->path) }}" alt="Image" class="current-image-thumbnail" id="currentImage">
                
                <button type="button" class="remove-image-btn" id="removeImageBtn">&times;</button>
            </div>
            
            <input type="checkbox" name="remove_image" id="removeImageCheckbox" value="1" style="display: none;">
        </div>
    @endif

    <label for="file" id="fileLabel" style="display: {{ $blog->path ? 'none' : 'block' }};">Upload Image</label>
    <input type="file" name="file" class="file-input" id="fileInput" style="display: {{ $blog->path ? 'none' : 'block' }};">
    
    <button type="submit" class="submit-button">Update Blog</button>
    <a href="{{ url('list') }}" class="cancel-link">Cancel</a>
</form>

<script>
    document.getElementById('removeImageBtn').addEventListener('click', function() {
        document.getElementById('currentImage').style.display = 'none';
        this.style.display = 'none';

        document.getElementById('removeImageCheckbox').checked = true;
        document.getElementById('fileInput').style.display = 'block';
        document.getElementById('fileLabel').style.display = 'block';
    });

    document.getElementById('fileInput').addEventListener('change', function() {
        if (this.files.length === 0) {
            document.getElementById('fileInput').style.display = 'none';
            document.getElementById('fileLabel').style.display = 'block';
        }
    });

    function validateForm() {
        const removeImageCheckbox = document.getElementById('removeImageCheckbox');
        const fileInput = document.getElementById('fileInput');

        if (removeImageCheckbox.checked && fileInput.files.length === 0) {
            alert("Please upload a new image or cancel the removal of the current image.");
            return false;
        }
        return true;
    }
</script>
