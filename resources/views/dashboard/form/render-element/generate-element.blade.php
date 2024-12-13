{{-- <div class="d-none" id="base_elements">
    <div class="card mb-3" id="copy_input_text">
        <div class="card-body">
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="" class="form-label"></label>
                    <a href="javascript:void(0)" class="btn btn-sm delete_element_btn btn-danger">Hapus</a>
                </div>
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                    placeholder="" />
            </div>

        </div>
    </div>
    <div class="card mb-3" id="copy_textarea">
        <div class="card-body">
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="" class="form-label"></label>
                    <a href="javascript:void(0)" class="btn btn-sm delete_element_btn btn-danger">Hapus</a>
                </div>
                <textarea class="form-control" name="" id="" rows="3"></textarea>
            </div>
        </div>
    </div>
</div> --}}

@foreach ($config as $item)
    <div class="card mb-3 card_element" data-id="{{ $item['id'] }}">
        <div class="card-body">
            {{-- nested if --}}
            @if ($item['element'] === 'input_text')
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        @if ($item['label'])
                            <label for="" class="form-label">{{ $item['label'] }}</label>
                        @else
                            <label for=""></label>
                        @endif
                        @if (!isset($mode) || $mode != 'save')
                        <a href="javascript:void(0)" class="btn btn-sm delete_element_btn btn-danger">Hapus</a>
                        @endif
                    </div>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                        placeholder="" {{ $item['required'] === 'yes' ? 'required' : '' }} />
                </div>
            @elseif($item['element'] === 'textarea')
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        @if ($item['label'])
                            <label for="" class="form-label">{{ $item['label'] }}</label>
                        @else
                            <label for=""></label>
                        @endif
                        @if (!isset($mode) || $mode != 'save')
                        <a href="javascript:void(0)" class="btn btn-sm delete_element_btn btn-danger">Hapus</a>
                        @endif
                    </div>
                    <textarea class="form-control" name="" id="" rows="3"
                        {{ $item['required'] === 'yes' ? 'required' : '' }}></textarea>
                </div>
            @elseif($item['element'] === 'radio')
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        @if ($item['label'])
                            <label for="" class="form-label">{{ $item['label'] }}</label>
                        @else
                            <label for=""></label>
                        @endif
                        @if (!isset($mode) || $mode != 'save')
                        <a href="javascript:void(0)" class="btn btn-sm delete_element_btn btn-danger">Hapus</a>
                        @endif
                    </div>
                    @foreach ($item['radio_option[]'] as $r)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio_option_{{ $item['id'] }}"
                                id="" />
                            <label class="form-check-label" for="">{{ $r }}</label>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endforeach
