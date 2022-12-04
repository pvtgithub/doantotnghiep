<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function getCategories(){
        $categories = Category::all();
        return view('admin.category.listCategories',compact('categories'));
    }

    public function deleteCategory(Request $request){
        $category = Category::find($request->id);
        
        $images = Image::where('id_category',$request->id)->get();
        foreach($images as $image){
            $image->delete();
        }

        $products = Product::where('id_category',$request->id)->get();
        foreach($products as $product){
            $imagesProduct = Image::where('id_product',$product->id)->get();
            foreach($imagesProduct as $image){
                $image->delete();
            }
            $product->delete();
        }
        $category->delete();

        $categories = Category::all();
        return view('admin.ajax.listCategories_ajax',compact('categories'));
    }
    public function getAddCategory(){
        return view('admin.category.addCategory');
    }
    public function getAddCategoryAjax(){
        return view('admin.ajax.addCategory_ajax');
    }
    public function postAddCategory(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:3|max:255',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên loại rượu',
            'name.min'=>'Tên phải từ 3 ký tự trở lên',
            'name.max'=>'Tên tối đa 100 ký tự',
            'description.required'=>'Bạn chưa nhập mô tả',
            'description.min'=>'Mô tả phải từ 3 ký tự trở lên',
            'description.max'=>'Mô tả tối đa 255 ký tự',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->tab = $request->tab;
        $category->save();

        $imageName = $request->image_file->getClientOriginalName();
        $request->image_file->move(public_path('assets/images/categories'), $imageName);
        $imageCr = new Image;
        $imageCr->id_category = $category->id;
        $imageCr->image = $imageName;
        $imageCr->save();

        return redirect('admin/getAddCategoryAjax');
    }

    public function getEditCategory($id){
        $category = Category::find($id);
        return view('admin/category/editCategory',compact('category'));
    }
    public function getEditCategoryAjax($id){
        $category = Category::find($id);
        return view('admin/ajax/editCategory_ajax',compact('category'));
    }

    public function postEditCategory($id,$id_img,Request $request){
        $category = Category::find($id);
        $imageCr = Image::find($id_img);
        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:3|max:255',
        ],
        [   
            'name.required'=>'Bạn chưa nhập tên loại rượu',
            'name.min'=>'Tên phải từ 3 ký tự trở lên',
            'name.max'=>'Tên tối đa 100 ký tự',
            'description.required'=>'Bạn chưa nhập mô tả',
            'description.min'=>'Mô tả phải từ 3 ký tự trở lên',
            'description.max'=>'Mô tả tối đa 255 ký tự',
        ]);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->tab = $request->tab;
        $category->save();

        if($request->image_file){
            $imageName = $request->image_file->getClientOriginalName();  
            $request->image_file->move(public_path('assets/images/categories'), $imageName);
            $imageCr->image = $imageName;
            $imageCr->save();
        }
        return redirect('admin/getEditCategoryAjax/'.$category->id);
    }
}
