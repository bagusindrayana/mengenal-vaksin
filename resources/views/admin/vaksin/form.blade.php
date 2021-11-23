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
            placeholder: 'Deskripsi...',
            theme: 'snow'
        });

   

        $(document).on("submit","#form",function(){
            var myEditor = document.querySelector('#editor')
            var html = myEditor.children[0].innerHTML
            $("#deskripsi_vaksin").val(html);
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
    </script>
@endpush

@csrf

<div class="form-group">
    <label for="gambar_vaksin">Gambar Vaksin</label>
    <input type="file" name="gambar_vaksin" onchange="previewImage(this)" class="form-control" id="gambar_vaksin" placeholder="Gambar Vaksin" >
    @error('gambar_vaksin')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <img src="{{ asset(old('gambar_vaksin',@$data->gambar_vaksin)) }}" alt="" style="max-width: 300px;" id="imagePreview">
</div>

<div class="form-group">
    <label for="nama_vaksin" class="label-control">Nama Vaksin <span class="text-danger">*</span></label>
    <input type="text" maxlength="200" class="form-control" name="nama_vaksin" id="nama_vaksin" placeholder="Nama Vaksin" required value="{{ old('nama_vaksin',@$data->nama_vaksin) }}">
    @error('nama_vaksin')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="deskripsi_vaksin">Deskripsi Vaksin </label>
            <div id="toolbar"></div>
            <div id="editor" style="min-height: 300px;">{!! old('deskripsi_vaksin',@$data->deskripsi_vaksin) !!}</div>
            <input type="hidden" name="deskripsi_vaksin" id="deskripsi_vaksin" value="{{ old('deskripsi_vaksin',@$data->deskripsi_vaksin) }}">
            @error('deskripsi_vaksin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="nama_vaksin" class="label-control"></label>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>