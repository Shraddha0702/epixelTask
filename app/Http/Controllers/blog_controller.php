<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogpost;
use Illuminate\Support\Facades\DB;

class blog_controller extends Controller
{
    function add(Request $request)
    {
        $blogpost = new blogpost();
        $blogpost->post_name = $request->post_name;
        $blogpost->post_body = $request->post_data;


        if ($request->has("post_image")) {

            $file = $request->file('post_image');
            $extension = $file->getClientOriginalExtension();
            $filename = random_int(10, 99999) . '.' . $extension;
            $file->move('img/', $filename);
            //$inspectionPhotosModel->photo_name=$filename;  

            //   $a=34;
            //   $att=DB::update("update inspection_response set answer='$filename' where attribute_id='$a' and order_id='$order' and subcategory_id=$subcategory_id");


        }
        $blogpost->img = $filename;
        $blogpost->save();
        return redirect()->route('display')->with('result','Post added successfully');
    }

    function display()
    {
        $data=DB::select("select * from blogpost order by id desc");
        return view('/dummy',['data'=>$data]);
    }

    function detail($id)
    {
        $data=DB::table('blogpost')->select('post_name','post_body','img')->where('id',$id)->get();
        return view('detail',['data'=>$data]);
    }
}
