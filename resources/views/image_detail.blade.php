<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>詳細ページ</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
@foreach($images as $image)
    <div class="container_box">
        <img src="{{ asset('/storage/' . $image->file_path) }}" style="width:100%;"/>

        {{-- 確認var_dump --}}
        {{-- <?php var_dump($image->user_id);
        exit();
        ?> --}}

        {{-- <p>{{ $image->file_name }}</p> --}}
        <p>{{ $image->post_by }}</p>
        <p>{{ $image->file_title }}</p>
        <p>{{ $image->file_text }}</p>

        <div>
            {{-- <a href='http://localhost/20201225_Web_TeamMMC/public/list'>リストに戻る</a> --}}
            <a href='{{ asset('/list') }}'>リストに戻る</a>
        </div>
        <div>
            @if ($image->user_id == $users->id)
                <p>表示されてます</p>
                <a href="{{ asset('/detail/del?id=' . $image->id) }}">投稿を削除する</a>
            @endif
        </div>
        
    </div>
@endforeach

<div class="container_chat">
    <div>
        <ul>
            @foreach ($items as $item)
            <li>

                @foreach ($images as $image)
                    @if ($image->id == $item->detail_id)
                    <p>{{$item->user_name}}</p>
                    <p>{{$item->comment}}</p>

                    @endif

                @endforeach
                {{-- <p>{{$item->comment}}</p> --}}
            </li>
            @endforeach
        </ul>
    </div>
    <form action="{{ route('upload_comment') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="inputBox">
            <p>ユーザー名 : {{$users->name}}</p>

            {{-- usersテーブルのuser_nameを取得 --}}
            <input type="hidden" name="user_name" value="{{$users->name}}">

            {{-- usersテーブルのuser_idを取得 --}}
            <input type="hidden" name="user_id" value="{{$users->id}}">

            <input type="text" name="comment">

            {{-- 記事のIDを取得する --}}
            @foreach ($images as $image)
            <input type="hidden" name="detail_id" value="{{$image->id}}">
            @endforeach
            <input type="submit" value="コメントする">
        </div>
    </form>
</div>
</div>

</body>
</html>
