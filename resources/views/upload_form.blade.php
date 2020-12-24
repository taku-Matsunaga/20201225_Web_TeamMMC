<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="icon" href="rogo.ico">
    <title>omoide</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
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

  <div class=header-wrapper>
<table>
    <tr>
        <th class="left"><a href="http://localhost/20201225_Web_TeamMMC/public/list"><img src="css/rogo.png" alt="" class="rogo"></a></th>
        <th class="right">
            @if (Auth::check())
           <p id="username">ログインユーザー : {{$user->name}}</p>
            @else
            <p>ログインしていません( <a href="http://localhost/20201225_Web_TeamMMC/public/login">ログイン</a>|<a href="http://localhost/20201225_Web_TeamMMC/public/register">登録</a>)</p>
            @endif
        </th>
        <th class="bt-box"><button><a href="http://localhost/20201225_Web_TeamMMC/public/list">リスト</a></button></th>
        <th class="bt-box"><button><a href="http://localhost/20201225_Web_TeamMMC/LINEpay/sample/store.php">STORE</a></button></th>
        <th class="bt-box"><button><a href='http://localhost/20201225_Web_TeamMMC/public/home'>ユーザー管理</a></button></th>
    </tr>
    <tr>

    </tr>
</table>
</div>
<div class="polaroid_detail">
<img src="" id="preview"  class="preview_img" >
<form
method="post"
action="{{ route('upload_image') }}"
enctype="multipart/form-data"
>
@csrf
    <input type="hidden" name="post_by" value="{{$user->name}}">
    <input type="hidden" name="user_id" value="{{$user->id}}">
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
    <a href='{{ asset('/list') }}' class="cancel">Cancel</a>
</form>
</div>


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
