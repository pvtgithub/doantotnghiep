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
class AdminsController extends Controller
{
    public function getAdmin()
    {   
        $turnover = 0;
        $quantityProductCategory = array(0,1,2,3,4,5,6);

        $users = User::all();
        $customers = Customer::all();
        $bills = Bill::all();
        $bill_details = BillDetail::all();
        $products = Product::all();

        //lấy số lượng sản phẩm tồn kho
        $arr_product_ctg1 = array();
        $arr_product_ctg2 = array();
        $arr_product_ctg3 = array();
        $arr_product_ctg4 = array();
        $arr_product_ctg5 = array();
        $arr_product_ctg6 = array();
        $arr_product_ctg7 = array();
        $products_ctg_1 = Product::where('id_category',1)->get();
        foreach($products_ctg_1 as $product){
            $quantityProductCategory[0] += $product->quantity;
            $arr_product_ctg1[] = $product->id;
        }
        $products_ctg_2 = Product::where('id_category',2)->get();
        foreach($products_ctg_2 as $product){
            $quantityProductCategory[1] += $product->quantity;
            $arr_product_ctg2[] = $product->id;
        }
        $products_ctg_3 = Product::where('id_category',3)->get();
        foreach($products_ctg_3 as $product){
            $quantityProductCategory[2] += $product->quantity;
            $arr_product_ctg3[] = $product->id;
        }
        $products_ctg_4 = Product::where('id_category',4)->get();
        foreach($products_ctg_4 as $product){
            $quantityProductCategory[3] += $product->quantity;
            $arr_product_ctg4[] = $product->id;
        }
        $products_ctg_5 = Product::where('id_category',5)->get();
        foreach($products_ctg_5 as $product){
            $quantityProductCategory[4] += $product->quantity;
            $arr_product_ctg5[] = $product->id;
        }
        $products_ctg_6 = Product::where('id_category',6)->get();
        foreach($products_ctg_6 as $product){
            $quantityProductCategory[5] += $product->quantity;
            $arr_product_ctg6[] = $product->id;
        }
        $products_ctg_7 = Product::where('id_category',7)->get();
        foreach($products_ctg_7 as $product){
            $quantityProductCategory[6] += $product->quantity;
            $arr_product_ctg7[] = $product->id;
        }

        //lấy số lượng sản phẩm đã bán
        $quantityProductedCategory = array(0,0,0,0,0,0,0);

        $bill_ctg_1 = BillDetail::whereIn('id_product',$arr_product_ctg1)->get();
        foreach($bill_ctg_1 as $bill){
            $quantityProductedCategory[0] += $bill->quantity;
        }
        $bill_ctg_2 = BillDetail::whereIn('id_product',$arr_product_ctg2)->get();
        foreach($bill_ctg_2 as $bill){
            $quantityProductedCategory[1] += $bill->quantity;
        }
        $bill_ctg_3 = BillDetail::whereIn('id_product',$arr_product_ctg3)->get();
        foreach($bill_ctg_3 as $bill){
            $quantityProductedCategory[2] += $bill->quantity;
        }
        $bill_ctg_4 = BillDetail::whereIn('id_product',$arr_product_ctg4)->get();
        foreach($bill_ctg_4 as $bill){
            $quantityProductedCategory[3] += $bill->quantity;
        }
        $bill_ctg_5 = BillDetail::whereIn('id_product',$arr_product_ctg5)->get();
        foreach($bill_ctg_5 as $bill){
            $quantityProductedCategory[4] += $bill->quantity;
        }
        $bill_ctg_6 = BillDetail::whereIn('id_product',$arr_product_ctg6)->get();
        foreach($bill_ctg_6 as $bill){
            $quantityProductedCategory[5] += $bill->quantity;
        }
        $bill_ctg_7 = BillDetail::whereIn('id_product',$arr_product_ctg7)->get();
        foreach($bill_ctg_7 as $bill){
            $quantityProductedCategory[6] += $bill->quantity;
        }


        $billsTunrover = Bill::where('status',"Giao hàng thành công")->get();
        foreach($billsTunrover as $bill){
            $turnover += $bill->totalPrice;
        }
        $quantityCustomers = count($customers);
        $quantityBills = count($bills);
        $quantityProducts = count($products);
        
        $billsSecond = Bill::whereNotIn('status',['Giao hàng thành công'])->orderBy('id','desc')->take(7)->get();
        if(Auth::user()->permission == true){
            return view('admin.dashboard.dashboard',compact(['users','quantityCustomers','quantityBills','turnover','quantityProducts','quantityProductCategory','quantityProductedCategory','billsSecond']));
        }else{
          return redirect('home');
      }
  }
}
