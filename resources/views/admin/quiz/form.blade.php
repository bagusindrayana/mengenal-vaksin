@push('styles')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        var container = document.getElementById('editor');
        var editor = new Quill(container,{
        debug: 'info',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                [{ 'direction': 'rtl' }],                         // text direction
                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],
                ['image'],
                ['clean'],
                                                      
            ]
        },
            placeholder: 'Soal...',
            theme: 'snow'
        });

   

        $(document).on("submit","#form",function(){
            var myEditor = document.querySelector('#editor')
            var html = myEditor.children[0].innerHTML
            $("#soal").val(html);
        });

        function previewImage(input,target = 'imagePreview') {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+target)
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $(document).on('click','.add-row',function(){
            var clone = $('#item-row').clone();
            var list = $('#list-row');
            clone.removeAttr('id');
            clone.find('.form-check-input').attr('id','pilihan_benar'+list.find('tr').length+1);
            clone.find('.form-check-input').val(list.find('tr').length);
            clone.find('.form-check-label').attr('for','pilihan_benar'+list.find('tr').length+1);
            list.append(clone);
        });

        $(document).on('click','.remove-row',function(){
            $(this).parent().parent().remove();
            var list = $('#list-row');
            list.find('tr').each(function(i,v){
                $(this).find('.form-check-input').attr('id','pilihan_benar'+(i+1));
                $(this).find('.form-check-input').val(i);
                $(this).find('.form-check-label').attr('for','pilihan_benar'+(i+1));
            });
        });

    </script>

    <table class="d-none">
        <tr id="item-row">
            <td>
                <input type="text" name="pilihan[]" class="form-control" placeholder="Pilihan...">
            </td>
            <td class="d-flex">
                <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" name="pilihan_benar" id="pilihan_benar1">
                    <label class="form-check-label" for="pilihan_benar1">
                      Jawaban Benar
                    </label>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-row">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    </table>
@endpush

@csrf

<div class="form-group">
    <label for="vaksin_id">Vaksin</label>
    <select name="vaksin_id" id="vaksin_id" class="form-control">
        <option value="">Semua Vaksin</option>    
        @foreach ($vaksins as $vaksin)
            <option value="{{ $vaksin->id }}" @if (@$data->vaksin_id == $vaksin->id) selected @endif>{{ $vaksin->nama_vaksin }}</option>
        @endforeach
    </select>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="soal">Soal </label>
            <div id="toolbar"></div>
            <div id="editor" style="min-height: 300px;">{!! old('soal',@$data->soal) !!}</div>
            <input type="hidden" name="soal" id="soal" value="{{ old('soal',@$data->soal) }}">
            @error('soal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Pilihan</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody id="list-row">
                @forelse (@$data->QuizPilihan ?? [] as $index => $item)
                    <tr>
                        <td>
                            <input type="text" name="pilihan[]" class="form-control" placeholder="Pilihan..." value="{{ $item->pilihan }}">
                        </td>
                        <td class="d-flex">
                            <div class="form-check mx-3">
                                <input class="form-check-input" type="radio" @if ($data->pilihan_benar == $item->id) checked @endif name="pilihan_benar" id="pilihan_benar{{ $index+1 }}" value="{{ $index }}">
                                <label class="form-check-label" for="pilihan_benar{{ $index+1 }}">
                                Jawaban Benar
                                </label>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm remove-row">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            <input type="text" name="pilihan[]" class="form-control" placeholder="Pilihan...">
                        </td>
                        <td class="d-flex">
                            <div class="form-check mx-3">
                                <input class="form-check-input" type="radio" name="pilihan_benar" id="pilihan_benar1" value="0">
                                <label class="form-check-label" for="pilihan_benar1">
                                Jawaban Benar
                                </label>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm remove-row">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <button type="button" class="btn btn-primary btn-sm add-row">
                            <i class="fa fa-plus"></i>
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="form-group">
    <label for="nama_vaksin" class="label-control"></label>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>