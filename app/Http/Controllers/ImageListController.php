<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UploadImage;
use Illuminate\Support\Facades\Auth;


class ImageListController extends Controller
{
   function show(Request $request){

        $user = Auth::user();

		//アップロードした画像を取得
        $uploads = UploadImage::orderBy("id", "desc")->get();

        $param = ['images' => $uploads, 'user' => $user];

		return view("image_list",
            // "images" => $uploads
            $param
		);
    }

   function choice(Request $request){
		//アップロードしたRequestを取得
		// $uploads = UploadImage::where("id", 8)->get();
		$uploads = UploadImage::where("id", $request->id)->get();

		return view("image_detail",[
			"images" => $uploads
		]);
    }

    // public function showDetail($id) {
    //     $images = UploadImage::findOrFail($id);
    //     return view('image_detail')->with('images', $images);
    // }
}
