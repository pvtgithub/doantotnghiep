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

class CommentController extends Controller
{
    public function getComments(){
        $comments = Comment::all();
        return view('admin.comment.listComments',compact('comments'));
    }
    public function deleteComment(Request $request){
        $comment = Comment::find($request->id);
        $comment->delete();
        
        if(isset($comment->id_product)){
            $commentsOfProduct = Comment::where('id_product',$comment->id_product)->get();
            $product = Product::find($comment->id_product);
            $rate = 0;

            if(count($commentsOfProduct) != 0){
                foreach($commentsOfProduct as $comment){
                    $rate += $comment->rate;
                }
                $rateTB = (int)$rate / count($commentsOfProduct);
                $product->rate = $rateTB;
                $product->save();
            }
            else{
                $rateTB = 5;
                $product->rate = $rateTB;
                $product->save();
            }
        }

        $comments = Comment::all();
        return view('admin.ajax.listComments_ajax',compact('comments'));
    }
}
