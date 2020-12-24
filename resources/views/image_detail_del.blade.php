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

        {{-- 確認var_dump --}}
        {{-- <?php var_dump($image);
        exit();
        ?> --}}

        <img src="{{ asset('/storage/' . $image->file_path) }}" style="width:100%;"/>

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
                <form action="{{ asset('/doneDelete') }}" method="post">
                    @csrf
                    <p>本当に削除しますか？</p>
                    <input type="submit" value="投稿を削除する">
                    <input type="hidden" name="detail_id" value="{{$image->id}}">
                </form>
            @endif
        </div>
    </div>
@endforeach
</div>

</body>
</html>
