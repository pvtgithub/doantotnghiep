<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Image;
use App\Models\News;
use App\Models\Comment;
use App\Models\RepComment;
use App\Models\Contact;
use Auth;
use Session;


class ImageController extends Controller
{
    public function getImages(){
        $images = Image::all();
        return view('admin.image.listImages',compact('images'));
    }
    public function deleteImage(Request $request){
        $image = Image::find($request->id);
        $image->delete();

        $images = Image::all();
        return view('admin.ajax.listImages_ajax',compact('images'));
    }
    public function getAddImage(){
        $categories = Category::all();
        $products = Product::all();
        $blogs = News::all();

        return view('admin.image.addImage',compact(['categories','products','blogs']));
    }

    public function getAddImageAjax(){
        $categories = Category::all();
        $products = Product::all();
        $blogs = News::all();

        return view('admin.ajax.addImage_ajax',compact(['categories','products','blogs']));
    }

    public function postAddImage(Request $request){
        $this->validate($request,[
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $typeSelected = $request->id_categoryImage;
        $id_category = explode('-',$request->id_category);
        $id_product = explode('-',$request->id_product);
        $id_blog = explode('-',$request->id_blog);
        $imageCr = new Image;

        switch ($typeSelected) {
            case 'Hình ảnh cho loại rượu':
            $imageCr->id_category = $id_category[0];
            $imageName = $request->image_file->getClientOriginalName();  
            $request->image_file->move(public_path('assets/images/categories'), $imageName);
            $imageCr->image = $imageName;
            $imageCr->save();
            return redirect('admin/getAddImageAjax');
            break;
            case 'Hình ảnh cho sản phẩm rượu':
            $imageCr->id_product = $id_product[0];
            $imageName = $request->image_file->getClientOriginalName();  
            $request->image_file->move(public_path('assets/images/products'), $imageName);
            $imageCr->image = $imageName;
            $imageCr->save();
            return redirect('admin/getAddImageAjax');
            break;
            case 'Hình ảnh cho bài viết':
            $imageCr->id_news = $id_blog[0];
            $imageName = $request->image_file->getClientOriginalName();  
            $request->image_file->move(public_path('assets/images/blogpost'), $imageName);
            $imageCr->image = $imageName;
            $imageCr->save();
            return redirect('admin/getAddImageAjax');
            break;
            
            default:
                // code...
            break;
        }
        
    }

    public function getEditImage($id){
        $image = Image::find($id);

        $categories = Category::all();
        $products = Product::all();
        $blogs = News::all();
        return view('admin.image.editImage',compact(['categories','products','blogs','image']));
    }
    public function getEditImageAjax($id){
        $image = Image::find($id);

        $categories = Category::all();
        $products = Product::all();
        $blogs = News::all();
        return view('admin.ajax.editImage_ajax',compact(['categories','products','blogs','image']));
    }

    public function postEditImage($id,Request $request){
        $this->validate($request,[
            'image_file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageCr = Image::find($id);
        $id_category = explode('-',$request->id_category);
        $id_product = explode('-',$request->id_product);
        $id_blog = explode('-',$request->id_blog);

        if (isset($request->id_product)) {
            $imageCr->id_product = $id_product[0];
            if(isset($request->image_file)){
                $imageName = $request->image_file->getClientOriginalName();  
                $request->image_file->move(public_path('assets/images/products'), $imageName);
                $imageCr->image = $imageName;
            }
            $imageCr->save();
            return redirect('admin/getEditImageAjax/'.$id);
        }
        if (isset($request->id_category)) {
            $imageCr->id_category = $id_category[0];
            if($request->image_file){
                $imageName = $request->image_file->getClientOriginalName();  
                $request->image_file->move(public_path('assets/images/categories'), $imageName);
                $imageCr->image = $imageName;
            }
            $imageCr->save();
            return redirect('admin/getEditImageAjax/'.$id);
        }
        if (isset($request->id_blog)) {
            $imageCr->id_news = $id_blog[0];
            if(isset($request->image_file)){
                $imageName = $request->image_file->getClientOriginalName();  
                $request->image_file->move(public_path('assets/images/blogpost'), $imageName);
                $imageCr->image = $imageName;
            }
            $imageCr->save();
            return redirect('admin/getEditImageAjax/'.$id);
        }
        
    }
}
