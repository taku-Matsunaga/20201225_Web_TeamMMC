
@foreach($images as $image)
<div style="width: 18rem; float:left; margin: 16px; cursor: pointer;">
    <img src="{{ asset('/storage/' . $image->file_path) }}" style="width:100%;"/>

    {{-- 確認var_dump --}}
    {{-- <?php var_dump('/storage/' . $image->file_path);
    exit(); ?> --}}

    {{-- <p>{{ $image->file_name }}</p> --}}
    <p>{{ $image->file_title }}</p>
    <p>{{ $image->file_text }}</p>
</div>
@endforeach
