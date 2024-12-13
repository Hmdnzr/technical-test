@extends('layouts.adminkit')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>
            Kelola Form
        </h3>
        <button class="btn btn-primary btn-sm ajax_modal_btn" 
        data-modal-title="Buat Form" 
        data-render-route="{{ route('dashboard.form.create') }}"
        data-render-method="get"
        >Buat form</button>

    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($forms as $form)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $form->title }}</td>
                        <td>{{ $form->description }}</td>
                        <td>
                            
                            <a href="{{ route('dashboard.form.show',$form->id) }}" class="btn btn-primary btn-sm">
                                Kelola
                             </a>
                            <!-- Edit Button -->
                            <button class="btn btn-primary btn-sm ajax_modal_btn" data-modal-title="Edit form"
                            data-render-route="{{ route('dashboard.form.edit',$form->id) }}"
                            data-render-method="get">
                                Edit
                            </button>

                            {{-- lihat button --}}
                            <a href="{{ route('view-form',$form->id) }}" class="btn btn-primary btn-sm " target="_blank">
                                lihat
                            </a>
                            
                            <!-- Delete Button -->
                            <button class="btn btn-danger btn-sm ajax_modal_btn" data-modal-title="hapus form"
                            data-render-route="{{ route('dashboard.form.delete',$form->id) }}"
                            data-render-method="get">
                                Delete
                            </button>

                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection