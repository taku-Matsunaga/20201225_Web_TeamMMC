@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form
	method="post"
	action="{{ route('upload_image') }}"
	enctype="multipart/form-data"
>
	@csrf
    <input type="file" name="image" accept="image/png, image/jpeg">
    <div>
        <p>タイトルを入力</p>
        <input type="text" name="title">
    </div>
    <div>
        <p>説明を入力</p>
        <input type="text" name="text">
    </div>
	<input type="submit" value="Upload">
</form>
