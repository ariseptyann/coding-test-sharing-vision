<div class="row">
    <div class="form-group col-md-6">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Title" autocomplete="off"
            value="{{ old('title', isset($isEdit) ? $data->title : '') }}" required>
    </div>
    <div class="form-group col-md-6">
        <label>Category</label>
        <input type="text" name="category" class="form-control" placeholder="Category" autocomplete="off"
            value="{{ old('category', isset($isEdit) ? $data->category : '') }}" required>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label>Content</label>
        <textarea name="content" class="form-control" placeholder="Content" rows="3">{{ old('content', (isset($isEdit) ? $data->content : '')) }}</textarea>
    </div>
</div>
