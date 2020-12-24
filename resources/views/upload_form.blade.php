<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="icon" href="rogo.ico">
    <title>omoide</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
</head>
<body>

</body>
</html>


@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<p>投稿者名: {{$user->name}}</p>

<img src="" id="preview" width="300px">

<form
method="post"
action="{{ route('upload_image') }}"
enctype="multipart/form-data"
>
@csrf
    <input type="hidden" name="post_by" value="{{$user->name}}">
    <input type="file" name="image" accept="image/png, image/jpeg" id="file1">
    <div>
        <p>タイトルを入力</p>
        <input type="text" name="title">
    </div>
    <div>
        <p>説明を入力</p>
        <input type="text" name="text">
    </div>
    <input type="submit" value="Upload">
    <button><a href="">Cancel</a></button>
</form>

<script>
    // プレビュー
    const file1 = document.getElementById('file1');
    const preview = document.getElementById('preview');

    file1.onchange = function(e) {
      var file = e.target.files[0];
      var blobUrl = window.URL.createObjectURL(file);
      preview.src = blobUrl;
    }
  </script>
