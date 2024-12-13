<form id="elemen_options">
    @php
        $options = [
            [
                'code' => 'input_text',
                'title' => 'Jawaban Singkat',
            ],
            [
                'code' => 'textarea',
                'title' => 'Text Panjang',
            ],
            [
                'code' => 'radio',
                'title' => 'Pilihan Ganda',
            ],
        ];
    @endphp
    <div class="mb-3">
        <label for="" class="form-label">Label</label>
        <input type="text" class="form-control" name="label" aria-describedby="helpId" placeholder="" />
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Pilih Elemen</label>
        <select class="form-select form-select-lg" name="element" id="element">
            <option selected disabled>Pilih Elemen</option>
            @foreach ($options as $item)
                <option value="{{ $item['code'] }}">{{ $item['title'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="d-none" id="select_option_config">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="javascript:void(0)" id="add_radio_option">+ Tambah</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
    <div class="mb-3">
        <label for="" class="form-label">Wajib Diisi ?</label>
        <select class="form-select form-select-lg" name="required" id="">
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary create_option_btn">
        Buat
    </button>

</form>