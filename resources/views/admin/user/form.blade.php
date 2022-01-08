<div class="form-group">
    <label for="name" class="label-control">Nama <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="name" value="{{ old('name',@$data->name) }}" autocomplete="off" required>
    @error('name')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
</div>

<div class="form-group">
    <label for="email" class="label-control">Email <span class="text-danger">*</span></label>
    <input type="email" class="form-control" name="email" value="{{ old('email',@$data->email) }}" autocomplete="off" required>
    @error('email')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
</div>

<div class="form-group">
    <label for="password" class="label-control">Password <span class="text-danger">*</span></label>
    <input type="password" class="form-control" name="password" value="{{ old('password') }}" autocomplete="off">
    @error('password')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
</div>

<div class="form-group">
    <label for="nama_vaksin" class="label-control"></label>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>