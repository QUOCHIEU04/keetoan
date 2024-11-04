@extends('adminlte::page')

@section('title', 'Edit Post')

@section('content')
<div class="card">
    <div class="card-header">Edit Post</div>
    <div class="card-body">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" class="form-control" id="seo_title" name="seo_title" maxlength="60" value="{{ old('seo_title', $post->seo_title) }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required>{{ old('content', $post->content ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="seo_description">SEO Description</label>
                <textarea class="form-control" id="seo_description" name="seo_description" maxlength="160">{{ old('seo_description', $post->seo_description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage(event)">
                
                <!-- Hiển thị ảnh hiện tại nếu có -->
                @if($post->image)
                    <p>Current Image:</p>
                    <img id="current-image" src="{{ asset('storage/' . $post->image) }}" width="100" alt="Current Image">
                @endif
                
                <!-- Khu vực xem trước ảnh mới -->
                <img id="preview" src="#" alt="Image Preview" style="display:none; width: 100px; margin-top: 10px;">
            </div>

            <div class="form-group">
                <label for="is_published">Published</label>
                <div>
                    <label>
                        <input type="radio" name="is_published" value="1" {{ old('is_published', $post->is_published) == '1' ? 'checked' : '' }}> Yes
                    </label>
                    <label>
                        <input type="radio" name="is_published" value="0" {{ old('is_published', $post->is_published) == '0' ? 'checked' : '' }}> No
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var preview = document.getElementById('preview');
        var currentImage = document.getElementById('current-image');
        var file = event.target.files[0];
        
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                
                // Ẩn ảnh hiện tại khi chọn ảnh mới
                if (currentImage) {
                    currentImage.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
            if (currentImage) {
                currentImage.style.display = 'block';
            }
        }
    }
</script>

<!-- CKEditor Integration -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection
