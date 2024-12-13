<form class="ajax_form" method="POST" action="{{ route('dashboard.form.update',$form->id) }}">
    @csrf <!-- Laravel CSRF protection token -->
    @method('put')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $form->title }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description">{{ $form->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
