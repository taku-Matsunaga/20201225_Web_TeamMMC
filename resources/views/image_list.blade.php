
<a href="{{ route('upload_form') }}">Upload</a>

@if (Auth::check())
<p>USER: {{$user->name . '(' . $user->email . ')'}}</p>
@else
<p>ログインしていません( <a href="http://localhost/20201225_Web_TeamMMC/public/login">ログイン</a>|<a href="http://localhost/20201225_Web_TeamMMC/public/register">登録</a>)</p>
@endif

<hr />

@foreach($images as $image)
<a href="{{ asset('/detail?id=' . $image->id) }}" style="width: 18rem; float:left; margin: 16px; cursor: pointer;">
    <img src="{{ asset('/storage/' . $image->file_path) }}" style="width:100%;"/>

    {{-- 確認var_dump --}}
    {{-- <?php var_dump('/storage/' . $image->file_path);
    exit(); ?> --}}
    {{-- 確認var_dump --}}
    {{-- <?php var_dump($image->id);
    exit(); ?> --}}

    {{-- <p>{{ $image->file_name }}</p> --}}
    <p>{{ $image->file_title }}</p>
    <p>{{ $image->file_text }}</p>
</a>
@endforeach
