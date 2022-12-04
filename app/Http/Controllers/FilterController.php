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


class FilterController extends Controller
{
    public function getFilterPrice($value){
        $products = Product::where('sale',1)->orderBy('promotion_price',$value)->get();
        return view('pages.kho-thanh-ly-ajax',compact('products'));
    }

    public function getFilterPriceDefault(){
        $products = Product::where('sale',1)->get();
        return view('pages.kho-thanh-ly-ajax',compact('products'));
    }

    public function getFilterRadioPrice($valuePrice,$valueCategory){
        if ($valueCategory == "undefined") {
            $posDot = strpos($valuePrice,',');
            if ($posDot == false) {
                $products = Product::where('sale',1)->whereBetween('promotion_price', [3000000,1000000000])->get();
                return view('pages.kho-thanh-ly-ajax',compact('products'));
            }else{
                $priceMin =(float) substr($valuePrice,0,$posDot);
                $priceMax = (float) substr($valuePrice,$posDot+1,strlen($valuePrice));
                $products = Product::where('sale',1)->whereBetween('promotion_price', [$priceMin,$priceMax])->get();
                return view('pages.kho-thanh-ly-ajax',compact('products'));
            }
        }else{
            if ($valuePrice == "undefined") {
                $category = Category::where('name','like','%'.$valueCategory.'%')->first();
                $products = Product::where('sale',1)->where('id_category',$category->id)->get();

                return view('pages.kho-thanh-ly-ajax',compact('products'));
            }
            else{
                $category = Category::where('name','like','%'.$valueCategory.'%')->first();
                $posDot = strpos($valuePrice,',');
                if ($posDot == false) {
                    $products = Product::where('sale',1)->whereBetween('promotion_price', [3000000,1000000000])->where('id_category',$category->id)->get();
                    return view('pages.kho-thanh-ly-ajax',compact('products'));
                }else{
                    $priceMin =(float) substr($valuePrice,0,$posDot);
                    $priceMax = (float) substr($valuePrice,$posDot+1,strlen($valuePrice));
                    $products = Product::where('sale',1)->whereBetween('promotion_price', [$priceMin,$priceMax])->where('id_category',$category->id)->get();
                    return view('pages.kho-thanh-ly-ajax',compact('products'));
                }
            }
        }
    }

    /*hotdeal*/
    public function getFilterPriceHotDeal($value){
        $products = Product::where('deal',1)->orderBy('promotion_price',$value)->get();
        return view('pages.hot-deal-ajax',compact('products'));
    }

    public function getFilterPriceDefaultHotDeal(){
        $products = Product::where('deal',1)->get();
        return view('pages.hot-deal-ajax',compact('products'));
    }

    public function getFilterRadioPriceHotDeal($valuePrice,$valueCategory){
        if ($valueCategory == "undefined") {
            $posDot = strpos($valuePrice,',');
            if ($posDot == false) {
                $products = Product::where('deal',1)->whereBetween('promotion_price', [3000000,1000000000])->get();
                return view('pages.hot-deal-ajax',compact('products'));
            }else{
                $priceMin =(float) substr($valuePrice,0,$posDot);
                $priceMax = (float) substr($valuePrice,$posDot+1,strlen($valuePrice));
                $products = Product::where('deal',1)->whereBetween('promotion_price', [$priceMin,$priceMax])->get();
                return view('pages.hot-deal-ajax',compact('products'));
            }
        }else{
            if ($valuePrice == "undefined") {
                $category = Category::where('name','like','%'.$valueCategory.'%')->first();
                $products = Product::where('deal',1)->where('id_category',$category->id)->get();

                return view('pages.hot-deal-ajax',compact('products'));
            }
            else{
                $category = Category::where('name','like','%'.$valueCategory.'%')->first();
                $posDot = strpos($valuePrice,',');
                if ($posDot == false) {
                    $products = Product::where('deal',1)->whereBetween('promotion_price', [3000000,1000000000])->where('id_category',$category->id)->get();
                    return view('pages.hot-deal-ajax',compact('products'));
                }else{
                    $priceMin =(float) substr($valuePrice,0,$posDot);
                    $priceMax = (float) substr($valuePrice,$posDot+1,strlen($valuePrice));
                    $products = Product::where('deal',1)->whereBetween('promotion_price', [$priceMin,$priceMax])->where('id_category',$category->id)->get();
                    return view('pages.hot-deal-ajax',compact('products'));
                }
            }
        }
    }

    /*search*/

    public function getFilterPriceSearch($value){
        $products = Product::where('deal',1)->orderBy('promotion_price',$value)->get();
        return view('pages.search-ajax',compact('products'));
    }

    public function getFilterPriceDefaultSearch(){
        $products = Product::where('deal',1)->get();
        return view('pages.search-ajax',compact('products'));
    }

    public function getFilterRadioPriceSearch($valuePrice,$valueCategory){
        if ($valueCategory == "undefined") {
            $posDot = strpos($valuePrice,',');
            if ($posDot == false) {
                $products = Product::where('deal',1)->whereBetween('promotion_price', [3000000,1000000000])->get();
                return view('pages.search-ajax',compact('products'));
            }else{
                $priceMin =(float) substr($valuePrice,0,$posDot);
                $priceMax = (float) substr($valuePrice,$posDot+1,strlen($valuePrice));
                $products = Product::where('deal',1)->whereBetween('promotion_price', [$priceMin,$priceMax])->get();
                return view('pages.search-ajax',compact('products'));
            }
        }else{
            if ($valuePrice == "undefined") {
                $category = Category::where('name','like','%'.$valueCategory.'%')->first();
                $products = Product::where('deal',1)->where('id_category',$category->id)->get();

                return view('pages.search-ajax',compact('products'));
            }
            else{
                $category = Category::where('name','like','%'.$valueCategory.'%')->first();
                $posDot = strpos($valuePrice,',');
                if ($posDot == false) {
                    $products = Product::where('deal',1)->whereBetween('promotion_price', [3000000,1000000000])->where('id_category',$category->id)->get();
                    return view('pages.search-ajax',compact('products'));
                }else{
                    $priceMin =(float) substr($valuePrice,0,$posDot);
                    $priceMax = (float) substr($valuePrice,$posDot+1,strlen($valuePrice));
                    $products = Product::where('deal',1)->whereBetween('promotion_price', [$priceMin,$priceMax])->where('id_category',$category->id)->get();
                    return view('pages.search-ajax',compact('products'));
                }
            }
        }
    }
}
