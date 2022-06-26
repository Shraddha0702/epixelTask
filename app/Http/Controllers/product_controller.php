<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class product_controller extends Controller
{
    function productList()
    {
        $data = DB::select("select * from product where status='Active' order by id desc");
        $data2=DB::select("select * from product where status='archived'");
        return view('product-list',['products'=>$data,'data2'=>$data2]);
    }

    function addCategoryView()
    {
        return view('inspadd-category');
    }

    function addProduct(Request $req)
    {
      
        if ($req->has("product_image")) {

            $file = $req->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = random_int(10, 99999) . '.' . $extension;
            $file->move('img/', $filename);
            //$inspectionPhotosModel->photo_name=$filename;  

            //   $a=34;
            //   $att=DB::update("update inspection_response set answer='$filename' where attribute_id='$a' and order_id='$order' and subcategory_id=$subcategory_id");


        }
       
        product::insert([
            'name' => $req->product_name,
            'product_image' => $filename,
           'status'=>'Active'
        ]);
        $data = DB::select("select * from product where status='Active'");
        $data2=DB::select("select * from product where status='archived'");
        return view('product-list',['products'=>$data,'data2'=>$data2])->with('result','Product Added Successfully');
       
    }

    function editProduct($id)
    {
        $product = DB::select('select * from product where id = ?', [$id]);
        return view('product-edit', compact('product'));
    }

    function updateProduct(Request $req , $id)
    {
        $product = DB::select('select * from product where id = ?', [$id]);
        $name = $req->input('name');
        if($req->hasfile('product_image'))
        {
            $dest = 'img/'.$product[0]->product_image;
            if(File::exists($dest))
            {
                File::delete($dest);
            }
            $file = $req->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = random_int(10, 99999) . '.' . $extension;
            $file->move('img/', $filename);
            //$package[0]->package_img = $filenm;
        }
        
        DB::update('update product set name= ?,product_image=? where id = ?',[$name,$filename,$id]);
        
        return redirect()->back()->with('result','Product Updated Successfully');
    }


    function deleteProduct1(Request $req)
    {
        $data_id = $req->input('data_id');
        DB::update("update product set status='archived' where id ='$data_id'");
        
        $data = DB::select("select * from product where status='Active'");
        $data2=DB::select("select * from product where status='archived'");
        return view('product-list',['products'=>$data,'data2'=>$data2])->with('result','Product Added Successfully');
       
    }
    function recycleProduct(Request $req)
    {
        $recycle_id=$req->recycle_id;
        DB::update("update product set status='Active' where id ='$recycle_id'");
        $data = DB::select("select * from product where status='Active'");
        $data2=DB::select("select * from product where status='archived'");
        return view('product-list',['products'=>$data,'data2'=>$data2])->with('result','Product Added Successfully');
       
    }
}
