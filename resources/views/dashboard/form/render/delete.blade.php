<form class="ajax_form" action="{{ route('dashboard.form.destroy', $form->id) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-primary btn-sm">
        Hapus
    </button>

</form>
