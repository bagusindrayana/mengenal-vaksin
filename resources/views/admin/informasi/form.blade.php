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
            $("#isi_informasi").val(html);
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
    <label for="gambar_informasi">Gambar Informasi</label>
    <input type="file" name="gambar_informasi" onchange="previewImage(this)" class="form-control" id="gambar_informasi" placeholder="Gambar Informasi" >
    @error('gambar_informasi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <img src="{{ asset(old('gambar_informasi',@$data->gambar_informasi)) }}" alt="" style="max-width: 300px;" id="imagePreview">
</div>

<div class="form-group">
    <label for="jenis_informasi" class="label-control">Jenis Informasi <span class="text-danger">*</span></label>
    <select name="jenis_informasi" id="jenis_informasi" class="form-control">
        <option value="Hoax" @if(old('jenis_informasi',@$data->jenis_informasi) == "Hoax") selected @endif>Hoax</option>
        <option value="Berita" @if(old('jenis_informasi',@$data->jenis_informasi) == "Berita") selected @endif>Berita</option>
    </select>
    @error('nama_informasi')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
</div>

<div class="form-group">
    <label for="nama_informasi" class="label-control">Nama Informasi <span class="text-danger">*</span></label>
    <input type="text" maxlength="200" class="form-control" name="nama_informasi" id="nama_informasi" placeholder="Nama Informasi" required value="{{ old('nama_informasi',@$data->nama_informasi) }}">
    @error('nama_informasi')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="isi_informasi">Deskripsi Informasi </label>
            <div id="toolbar"></div>
            <div id="editor" style="min-height: 300px;">{!! old('isi_informasi',@$data->isi_informasi) !!}</div>
            <input type="hidden" name="isi_informasi" id="isi_informasi" value="{{ old('isi_informasi',@$data->isi_informasi) }}">
            @error('isi_informasi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="nama_informasi" class="label-control"></label>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>