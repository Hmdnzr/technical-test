@extends('layouts.adminkit')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3>
            {{ $form->title }}
        </h3>
        <span>{{ $form->description ?? '-' }}</span>
    </div>
    <button class="btn btn-primary btn-sm ajax_modal_btn" data-modal-title="Pilih Elemen"
        data-render-route="{{ route('dashboard.form-element.render.option') }}" data-render-method="get">Tambah
        Element</button>

</div>

<div class="mb-3">
    <form action="" id="target_form">
    </form>
</div>

<button type="button" class="btn btn-primary" id="save_btn">
    simpan
</button>


@endsection
@push('js')
<script>
    var element_id = 0;
    var form_config = []
    $(document).on('click', '.create_option_btn', function () {
        element_id++;
        let form = $(document).find('#elemen_options')
        let formData = new FormData(form[0]);
        let jsonData = {};

        formData.forEach((value, key) => {
            if (jsonData[key]) {
                if (Array.isArray(jsonData[key])) {
                    jsonData[key].push(value);
                } else {
                    jsonData[key] = [jsonData[key], value];
                }
            } else {
                jsonData[key] = value;
            }
        });
        jsonData['id'] = element_id;

        form_config.push(jsonData);

        $.ajax({
            type: "get",
            url: "{{ route('dashboard.form-element.render.generate-element') }}",
            data: {
                config: JSON.stringify(form_config)
            },
            success: function (response) {
                $('#target_form').html(response.html)
                $('#common-modal').modal('hide')
            }
        });
    })

    $(document).on('click', '.delete_element_btn', function () {
        let base = $(this).closest('.card_element')
        let id = base.data('id')
        let index = form_config.findIndex(item => item.id === id);
        if (index !== -1) {
            form_config.splice(index, 1);
        }
        base.remove()
    })

    $(document).on('change', '#element', function () {
        let val = $(this).val()
        let radio_option = $(document).find('#select_option_config')
        if (val == 'radio') {
            radio_option.removeClass('d-none')
        } else {
            radio_option.addClass('d-none')
        }
    })

    $(document).on('click', '#select_option_config #add_radio_option', function () {
        let html = `<tr class="tr_radio_option">
                        <td><input type="text" class="form-control" name="radio_option[]" placeholder="ketik pilihan"></td>
                        <td><a href="javascript:void(0)" id="remove_radio_option">Hapus</a></td>
                    </tr>`
        $(document).find('#select_option_config tbody').append(html)
    })
    $(document).on('click', '#select_option_config #remove_radio_option', function () {
        $(this).closest('.tr_radio_option').remove()
    })

    $('#save_btn').click( function(){
        $.ajax({
            type: "post",
            url: "{{ route('dashboard.form-element.save',$form->id) }}",
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                config: JSON.stringify(form_config)
            },
            success: function (response) {
                window.location.href="{{ route('dashboard.form.index') }}"
            }
        });
    })
</script>
@endpush
