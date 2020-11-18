
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>IMAGE RESIZE</title>
</head>
<body>
<h1>IMAGE RESIZE</h1>
<div style="text-align:center;">
                @if (session()->has('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif
            </div><br>
<form action="/imgCompress" method="post" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" name="profile_image" id="exampleInputFile">
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-default">Submit</button>
</form>

</body>
</html>