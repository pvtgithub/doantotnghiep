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

class BlogController extends Controller
{
    public function getBlogs(){
        $blogs = News::all();
        return view('admin.blog.listBlogs',compact('blogs'));
    }

    public function deleteBlog(Request $request){
        $blog = News::find($request->id);

        $comments = Comment::where('id_news',$request->id)->get();
        foreach($comments as $comment){
            $comment->delete();
        }

        $images = Image::where('id_news',$request->id)->get();
        foreach($images as $image){
            $image->delete();
        }
        $blog->delete();

        $blogs = News::all();
        return view('admin.ajax.listBlogs_ajax',compact('blogs'));
    }

    public function getAddBlog(){
        return view('admin.blog.addBlog');
    }

    public function getAddBlogAjax(){
        return view('admin.ajax.addBlog_ajax');
    }
    public function postAddBlog(Request $request){
        $this->validate($request,[
            'category_news'=>'required',
            'title'=>'required|min:3|max:100',
            'description'=>'required|min:3|max:255',
            'content1'=>'required|min:3',
            'content2'=>'required|min:3',
            'content3'=>'required|min:3',
            'image_file1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_file2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [   
            'category_news.required'=>'Bạn chưa loại bài viết',
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.min'=>'Tên phải từ 3 ký tự trở lên',
            'title.max'=>'Tên tối đa 100 ký tự',
            'description.required'=>'Bạn chưa nhập mô tả',
            'description.min'=>'Mô tả phải từ 3 ký tự trở lên',
            'description.max'=>'Mô tả tối đa 255 ký tự',
            'content1.required'=>'Bạn chưa nhập nội dung 1',
            'content1.min'=>'nội dung phải từ 3 ký tự trở lên',
            'content2.required'=>'Bạn chưa nhập nội dung 2',
            'content2.min'=>'nội dung phải từ 3 ký tự trở lên',
            'content3.required'=>'Bạn chưa nhập nội dung 3',
            'content3.min'=>'nội dung phải từ 3 ký tự trở lên',
        ]);

        $blog = new News;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content1 = $request->content1;
        $blog->content2 = $request->content2;
        $blog->content3 = $request->content3;
        $blog->category_news = $request->category_news;
        $blog->save();

        if(isset($request->image_file1)){
            $imageName1 = $request->image_file1->getClientOriginalName();  
            $request->image_file1->move(public_path('assets/images/blogpost'), $imageName1);
            $image1 = new Image;
            $image1->id_news = $blog->id;
            $image1->image = $imageName1;
            $image1->save();
        }

        if(isset($request->image_file2)){
            $imageName2 = $request->image_file2->getClientOriginalName();  
            $request->image_file2->move(public_path('assets/images/blogpost'), $imageName2);
            $image2 = new Image;
            $image2->id_news = $blog->id;
            $image2->image = $imageName2;
            $image2->save();
        }
        return redirect('admin/getAddBlogAjax');
    }

    public function getEditBlog($id){
        $blog = News::find($id);
        return view('admin.blog.editBlog',compact('blog'));
    }
    public function getEditBlogAjax($id){
        $blog = News::find($id);
        return view('admin.ajax.editBlog_ajax',compact('blog'));
    }
    public function postEditBlog($id,$id_img1,$id_img2,Request $request){
        $this->validate($request,[
            'category_news'=>'required',
            'title'=>'required|min:3|max:100',
            'description'=>'required|min:3|max:255',
            'content1'=>'required|min:3',
            'content2'=>'required|min:3',
            'content3'=>'required|min:3',
            'image_file1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_file2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [   
            'category_news.required'=>'Bạn chưa loại bài viết',
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.min'=>'Tên phải từ 3 ký tự trở lên',
            'title.max'=>'Tên tối đa 100 ký tự',
            'description.required'=>'Bạn chưa nhập mô tả',
            'description.min'=>'Mô tả phải từ 3 ký tự trở lên',
            'description.max'=>'Mô tả tối đa 255 ký tự',
            'content1.required'=>'Bạn chưa nhập nội dung 1',
            'content1.min'=>'nội dung phải từ 3 ký tự trở lên',
            'content2.required'=>'Bạn chưa nhập nội dung 2',
            'content2.min'=>'nội dung phải từ 3 ký tự trở lên',
            'content3.required'=>'Bạn chưa nhập nội dung 3',
            'content3.min'=>'nội dung phải từ 3 ký tự trở lên',
        ]);

        $blog = News::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content1 = $request->content1;
        $blog->content2 = $request->content2;
        $blog->content3 = $request->content3;
        $blog->category_news = $request->category_news;
        $blog->save();

        if(isset($request->image_file1)){
            $imageName1 = $request->image_file1->getClientOriginalName();  
            $request->image_file1->move(public_path('assets/images/blogpost'), $imageName1);
            $image1 = Image::find($id_img1);
            $image1->id_news = $blog->id;
            $image1->image = $imageName1;
            $image1->save();
        }

        if(isset($request->image_file2)){
            $imageName2 = $request->image_file2->getClientOriginalName();  
            $request->image_file2->move(public_path('assets/images/blogpost'), $imageName2);
            $image2 = Image::find($id_img2);
            $image2->id_news = $blog->id;
            $image2->image = $imageName2;
            $image2->save();
        }
        return redirect('admin/getEditBlogAjax/'.$blog->id);
    }
}
