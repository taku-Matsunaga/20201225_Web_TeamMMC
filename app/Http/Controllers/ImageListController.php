<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UploadImage;
class ImageListController extends Controller
{
   function show(){
		//アップロードした画像を取得
		$uploads = UploadImage::orderBy("id", "desc")->get();

		return view("image_list",[
			"images" => $uploads
		]);
    }

   function choice(){
		//アップロードした画像を取得
		$uploads = UploadImage::where("id", 8)->get();

		return view("image_detail",[
			"images" => $uploads
		]);
    }

    // public function showDetail($id) {
    //     $images = UploadImage::findOrFail($id);
    //     return view('image_detail')->with('images', $images);
    // }
}
