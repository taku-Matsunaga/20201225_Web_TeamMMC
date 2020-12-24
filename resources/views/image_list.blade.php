<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="rogo.ico">

    <title>Omoide</title>

    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
    <title>Document</title>


</head>

<body>
    <div class=header-wrapper>
<table>
    <tr>
        <th class="left"><p class="logo">OMOIDE</p></th>
        <th class="right">
            @if (Auth::check())
           <p id="username">USER: {{$user->name . '(' . $user->email . ')'}}</p>
            @else
            <p>ログインしていません( <a href="http://localhost/20201225_Web_TeamMMC/public/login">ログイン</a>|<a href="http://localhost/20201225_Web_TeamMMC/public/register">登録</a>)</p>
            @endif
        </th>
        <th class="bt-box"><button><a href="{{ route('upload_form') }}">写真をUPする</a></button></th>
        <th class="bt-box"><button><a href='http://localhost/20201225_Web_TeamMMC/public/home'>ユーザー管理</a></button></th>
    </tr>
    <tr>

    </tr>
</table>




<div>

</div>

</div>


<div class="all-box">

@foreach($images as $image)
{{-- ポラロイド風の枠 --}}
<a href="{{ asset('/detail?id=' . $image->id) }}" class="polaroid">
    <div class="polaroid_img">
        <img src="{{ asset('/storage/' . $image->file_path) }}" style="width:100%;"/>
    </div>
    <div class="polaroid_p">
        {{-- <p>{{ $image->file_name }}</p> --}}
        <p>{{ $image->file_title}}</p>
        <p>{{ $image->post_by}}</p>
    </div>
</a>
@endforeach

</div>

</body>
</html>
