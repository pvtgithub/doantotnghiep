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

class ProductController extends Controller
{
    public function getProducts(){
        $products = Product::all();
        return view('admin.product.listProducts',compact('products'));
    }

    public function deleteProduct(Request $request){
        $product = Product::find($request->id);

        $comments = Comment::where('id_product',$request->id)->get();
        foreach($comments as $comment){
            $comment->delete();
        }

        $images = Image::where('id_product',$request->id)->get();
        foreach($images as $image){
            $image->delete();
        }
        
        $product->delete();

        $products = Product::all();
        return view('admin.ajax.listProducts_ajax',compact('products'));
    }

    public function getAddProduct(){
        $categories = Category::all();
        return view('admin.product.addProduct',compact('categories'));
    }

    public function getAddProductAjax(){
        $categories = Category::all();
        return view('admin.ajax.addProduct_ajax',compact('categories'));
    }

    public function postAddProduct(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:3|max:255',
            'content'=>'required|min:3|max:255',
            'unit_price'=>'required|numeric',
            'promotion_price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [   
            'name.required'=>'Bạn chưa nhập tên loại rượu',
            'name.min'=>'Tên phải từ 3 ký tự trở lên',
            'name.max'=>'Tên tối đa 100 ký tự',
            'description.required'=>'Bạn chưa nhập mô tả',
            'description.min'=>'Mô tả phải từ 3 ký tự trở lên',
            'description.max'=>'Mô tả tối đa 255 ký tự',
            'content.required'=>'Bạn chưa nhập nội dung',
            'content.min'=>'nội dung phải từ 3 ký tự trở lên',
            'content.max'=>'nội dung tối đa 255 ký tự',
            'unit_price.numeric'=>'Giá tiền chưa đúng định dạng',
            'unit_price.required'=>'Bạn chưa nhập giá tiền',
            'promotion_price.required'=>'Bạn chưa nhập giá tiền',
            'promotion_price.numeric'=>'Giá tiền chưa đúng định dạng',
            'quantity.required'=>'Bạn chưa nhập số lượng',
            'quantity.min'=>'Số lượng phải từ 1 ký tự trở lên',
            'quantity.max'=>'Số lượng tối đa 255 ký tự',
            'quantity.numeric'=>'Số lượng chưa đúng định dạng',
        ]);

        $arrayIdCategory = explode("-",$request->id_category);

        $product = new Product;
        $product->id_category = $arrayIdCategory[0];
        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->main_slide = $request->main_slide;
        $product->banner = $request->banner;
        $product->deal = $request->deal;
        $product->sale = $request->sale;
        $product->rate = $request->rate;
        $product->quantity = $request->quantity;
        $product->save();


        $imageName = $request->image_file->getClientOriginalName();  
        $request->image_file->move(public_path('assets/images/products'), $imageName);
        $imageCr = new Image;
        $imageCr->id_product = $product->id;
        $imageCr->image = $imageName;
        $imageCr->save();
        return redirect('admin/getAddProductAjax');
    }

    public function getEditProduct($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin/product/editProduct',compact(['product','categories']));
    }

    public function getEditProductAjax($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin/ajax/editProduct_ajax',compact(['product','categories']));
    }

    public function postEditProduct($id,$id_img,Request $request){
        $product = Product::find($id);
        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:3|max:255',
            'content'=>'required|min:3|max:255',
            'unit_price'=>'required|numeric',
            'promotion_price'=>'required|numeric',
            'quantity'=>'required|numeric',
        ],
        [   
            'name.required'=>'Bạn chưa nhập tên loại rượu',
            'name.min'=>'Tên phải từ 3 ký tự trở lên',
            'name.max'=>'Tên tối đa 100 ký tự',
            'description.required'=>'Bạn chưa nhập mô tả',
            'description.min'=>'Mô tả phải từ 3 ký tự trở lên',
            'description.max'=>'Mô tả tối đa 255 ký tự',
            'content.required'=>'Bạn chưa nhập nội dung',
            'content.min'=>'nội dung phải từ 3 ký tự trở lên',
            'content.max'=>'nội dung tối đa 255 ký tự',
            'unit_price.numeric'=>'Giá tiền chưa đúng định dạng',
            'unit_price.required'=>'Bạn chưa nhập giá tiền',
            'promotion_price.required'=>'Bạn chưa nhập giá tiền',
            'promotion_price.numeric'=>'Giá tiền chưa đúng định dạng',
            'quantity.required'=>'Bạn chưa nhập số lượng',
            'quantity.min'=>'Số lượng phải từ 1 ký tự trở lên',
            'quantity.max'=>'Số lượng tối đa 255 ký tự',
            'quantity.numeric'=>'Số lượng chưa đúng định dạng',
        ]);
        $arrayIdCategory = explode("-",$request->id_category);

        $product->id_category = $arrayIdCategory[0];
        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->main_slide = $request->main_slide;
        $product->banner = $request->banner;
        $product->deal = $request->deal;
        $product->sale = $request->sale;
        $product->rate = $request->rate;
        $product->quantity = $request->quantity;
        $product->save();

        if($request->image_file){
            $imageName = $request->image_file->getClientOriginalName();  
            $request->image_file->move(public_path('assets/images/products'), $imageName);
            $imageCr = Image::find($id_img);
            $imageCr->id_product = $product->id;
            $imageCr->image = $imageName;
            $imageCr->save();
        }
        return redirect('admin/getEditProductAjax/'.$product->id);
    }
}
