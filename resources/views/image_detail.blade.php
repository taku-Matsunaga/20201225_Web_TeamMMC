<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach($images as $image)
<div style="width: 18rem; float:left; margin: 16px;">
    <img src="{{ asset('/storage/' . $image->file_path) }}" style="width:100%;"/>

    {{-- 確認var_dump --}}
    {{-- <?php var_dump('/storage/' . $image->file_path);
    exit(); ?> --}}

    {{-- <p>{{ $image->file_name }}</p> --}}
    <p>{{ $image->post_by }}</p>
    <p>{{ $image->file_title }}</p>
    <p>{{ $image->file_text }}</p>

    <div>
        <a href='http://localhost/20201225_Web_TeamMMC/public/list'>リストに戻る</a>
    </div>
</div>
@endforeach

</body>
</html>
