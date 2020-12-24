<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadImage;
use Illuminate\Support\Facades\Auth;



class UploadImageController extends Controller
{
    function show(){
        $user = Auth::user();

		return view("upload_form", ['user' => $user]);
	}

	function upload(Request $request){
        $request->validate([
			'image' => 'required|file|image|mimes:png,jpeg'
		]);
        $upload_image = $request->file('image');
        $title = $request->input('title');
        $text = $request->input('text');
        $postBy = $request->input('post_by');
        $userId = $request->input('user_id');
        // $created = $request->timestamp();

		if($upload_image) {
			//アップロードされた画像を保存する
			$path = $upload_image->store('uploads',"public");
			//画像の保存に成功したらDBに記録する
			if($path){
				UploadImage::create([
					"file_name" => $upload_image->getClientOriginalName(),
					"file_path" => $path,
					"file_title" => $title,
					"file_text" => $text,
					"post_by" => $postBy,
					"user_id" => $userId,
					// "created_at" => $created,
				]);
			}
        }

        // var_dump('test');
        // exit();
		return redirect("/list");
	}
}
