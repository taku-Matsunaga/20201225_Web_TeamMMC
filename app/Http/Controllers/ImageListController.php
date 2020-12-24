<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UploadImage;
use App\Models\ImageComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

    public function del(Request $request)
    {
        // $param = ['id' => $request->id];
        // $user = Auth::user();
        // $image = DB::select('select * from upload_image where id = :id', $param);
        // return view('image_detail_del', ['images' => $image, 'users' => $user]);

        $param = ['id' => $request->id];
        $data = $request;
        $user = Auth::user();
        $image = DB::select('select * from upload_image where id = :id', $param);
        return view('image_detail_del', ['images' => $image, 'users' => $user, 'data' => $data]);
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->get('detail_id')];
        // var_dump($param);
        // exit();
        DB::delete('delete from upload_image where id = :id', $param);
        return redirect('/list');
    }

}
