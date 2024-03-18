<form action="{{ route('post-upload-file') }}" method="post" enctype="multipart/form-data">
    @csrf
        <p>{{ Session::get('file_upload_feedback') }}</p>
        <p><input type="file" name="myfile" id="myfile" /></p>
    @error('myfile')
        <p>{{ $message }}</p>
    @enderror
    <p><button type="submit">Upload</button></p>
</form>