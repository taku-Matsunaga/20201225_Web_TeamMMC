<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UploadImage;
use App\Models\ImageComment;
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
        $user = Auth::user();
        $items = ImageComment::all();

		return view("image_detail",[
            "images" => $uploads,
            'items' => $items,
            'users' => $user
		]);
    }

    // function uploadComment(Request $request){
    //     // $request->validate([
	// 	// 	'image' => 'required|file|image|mimes:png,jpeg'
	// 	// ]);
    //     // $upload_image = $request->file('image');

    //     $user_id = $request->input('user_id');
    //     $detail_id = $request->input('detail_id');
    //     $user_name = $request->input('user_name');
    //     $comment = $request->input('comment');
    //     // $created = $request->timestamp();

	// 	if($comment) {
	// 		//アップロードされた画像を保存する
	// 		// $path = $upload_image->store('uploads',"public");
	// 		//画像の保存に成功したらDBに記録する
	// 			ImageComment::create([
	// 				"user_id" => $user_id,
	// 				"detail_id" => $detail_id,
	// 				"user_name" => $user_name,
	// 				"comment" => $comment,
	// 				// "created_at" => $created,
	// 			]);
	// 	}
	// 	return redirect("/list");
	// }

}
