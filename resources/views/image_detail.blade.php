<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="rogo.ico">
    <title>omoide</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet" id="cssid">
    {{-- <link href="{{ asset('css/template.css') }}" rel="stylesheet"> --}}
</head>
<body>

    <div class="container">
        <div class="left">
            <button id="stylechange">テンプレート適用</button>
            <button><a href='{{ asset('/list') }}'>リストに戻る</a></button>

            @foreach($images as $image)
                <div  class="container_box">
                    <img src="{{ asset('/storage/' . $image->file_path) }}" class="mainimg">


                    {{-- 確認var_dump --}}
                    {{-- <?php var_dump('/storage/' . $image->file_path);
                    exit(); ?> --}}

                    {{-- <p>{{ $image->file_name }}</p> --}}
                    <p>{{ $image->post_by }}</p>
                    <p>{{ $image->file_title }}</p>
                    <p>{{ $image->file_text }}</p>


                </div>
            @endforeach 
            
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

        <div>
            @if ($image->user_id == $users->id)
                <p>表示されてます</p>
                <a href="{{ asset('/detail/del?id=' . $image->id) }}">投稿を削除する</a>
            @endif
        </div>

    </div>

<div class="container_chat">
    <div>
        <ul>
            @foreach ($items as $item)
            @foreach ($images as $image)
                @if ($image->id == $item->detail_id)
                     <li class="comment">
                     <p>{{$item->user_name}}</p>
                        <p>{{$item->comment}}</p>

                {{-- <p>{{$item->comment}}</p> --}}
                      </li>
            @endif
          @endforeach
          @endforeach
        </ul>
    </div>


        </div>
</div>

<script>
const stylechange = document.getElementById('stylechange');
stylechange.onclick = function(){
   document.getElementById('cssid').href = 'css/template.css';
   stylechange.style.display = 'none';
}

</script>

</body>
</html>
