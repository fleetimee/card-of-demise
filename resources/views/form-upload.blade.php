<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>File Upload</title>
</head>
<body>
    <div class="container mt-3">
        <h2>Form Gallery</h2>
        <hr>

        <form action="{{ url('/upload-gambar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="berkas">Gambar Profile</label>
                <input type="file" class="form-control-file" id="berkas" name="berkas">
                @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="caption">Caption</label>
                <input type="text" class="form-control-file" id="caption" name="caption">
                @error('caption')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary my-2">
                Upload
            </button>
        </form>
    </div>
</body>
</html>