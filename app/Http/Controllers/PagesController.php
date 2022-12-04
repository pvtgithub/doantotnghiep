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
use App\Models\Favourite;
use Auth;
use Session;

class PagesController extends Controller
{
    // public function __construct()
    // {

    // }
    public  function home(){
        $blogs = News::orderBy('id','desc')->take(7)->get();
        $products1 = Product::where('id_category',1)->get();
        $products2 = Product::where('id_category',2)->get();
        $product_deal = Product::where('deal',1)->get();
        $product_main_slide = Product::where('main_slide',1)->get();
        $product_banner = Product::where('banner',1)->get();
        
        $product_rate = Product::where('rate','>=',4)->get();
        
        $categories = Category::orderBy('id')->take(7)->get();

        return view('pages.home',compact(['products1','products2','categories','product_main_slide','product_banner','product_deal','product_rate','blogs']));
    }

    public function getLogin(){
        $categories = category::orderBy('id')->take(7)->get();
        if(Auth::check()){
            return redirect('home');
        }else{
            return view('pages.login',['categories'=>$categories]);

        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('home');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|min:3|max:100',
            'password'=>'required|min:6|max:50',
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'email.min'=>'Username phải từ 3 ký tự trở lên',
            'email.max'=>'Username tối đa 100 ký tự',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
            'password.max'=>'Mật khẩu tốn đa 50 ký tự',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::user()->permission == 1){
                return redirect('admin')->with('thongbao','Đăng nhập với quyền Admin thành công!!! xin chào '.Auth::user()->name);
            }else{
               return redirect('Checkout')->with('thongbao','Đăng nhập thành công!!! xin chào '.Auth::user()->name); 
           }
       }
       else{
        return redirect('login')->with('thongbao','Tài khoản hoặc mật khẩu không chính xác');
    }
}

public function getRegister(){
    $categories = Category::orderBy('id')->take(7)->get();
    return view('pages.register',['categories'=>$categories]);
}
public function postRegister(Request $request){
    $this->validate($request,[
        'email'=>'required|min:3|max:100|unique:users,email',
        'name'=>'required|min:3|max:100',
        'phone'=>'required|min:10|numeric',
        'city'=>'required','district'=>'required','ward'=>'required','addressDetail'=>'required',
        'password'=>'required|min:6|max:50',
        'passwordAgain'=>'required|same:password',
        'age'=> 'required'
    ],
    [   
        'email.required'=>'Bạn chưa nhập email',
        'email.min'=>'email phải từ 3 ký tự trở lên',
        'email.max'=>'email tối đa 100 ký tự',
        'email.unique'=>'email đã tồn tại',
        'name.required'=>'Bạn chưa nhập họ tên',
        'name.min'=>'Họ tên phải từ 3 ký tự trở lên',
        'name.max'=>'Họ tên tối đa 100 ký tự',
        'phone.required'=>'Bạn chưa nhập số điện thoại',
        'phone.min'=>'Số điện thoại phải từ 10 ký tự trở lên',
        'phone.numeric'=>'Chưa nhập đúng định dạng số điện thoại',
        'city.required'=>'Bạn chưa nhập tỉnh/thành phố',
        'district.required'=>'Bạn chưa nhập quận/huyện',
        'ward.required'=>'Bạn chưa nhập xã/phường',
        'addressDetail.required'=>'Bạn chưa nhập địa chỉ chi tiết',
        'password.required'=>'Bạn chưa nhập mật khẩu',
        'password.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
        'password.max'=>'Mật khẩu tốn đa 50 ký tự',
        'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
        'passwordAgain.same'=>'Mật khẩu không trùng khớp',
        'age.required'=>'Bạn chưa nhập tuổi',
    ]);
        $address = $request->addressDetail."-".$request->get('ward')."-".$request->get('district')."-".$request->get('city');//get adddress user
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $address;
        $user->age = $request->age;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        return redirect('home')->with('thongbao');
    }

    public function getCheckout(){
        $categories = Category::orderBy('id')->take(7)->get();
        if(!Auth::check()){
            $thongbao = session()->get('thongbao');
            $thongbao = 'Đăng nhập để tiến hành đặt hàng';
            session()->put('thongbao',$thongbao);
            return view('pages.login',compact('categories'));
        }
        else{
            if(!session('cart')){
                return redirect('/');
            }
            else{
                $totalPrice = 0;
                $codePromotion = 0;
                $shipping_price = 0;
                $pricePromotion = 0;
                $totalPriceAll = 0;
                foreach ((array) session('cart') as $id => $details){
                    $totalPrice += $details['promotion_price'] * $details['quantity'];
                }
                if(strlen(strstr(Auth::user()->address, "Đà Nẵng")) > 0 || strlen(strstr(Auth::user()->address, "Hà Nội")) > 0 || strlen(strstr(Auth::user()->address, "Hồ Chí Minh")) > 0 || $totalPrice > 5000000){
                    $shipping_price = 0;
                }
                else{
                    if ($totalPrice > 1000000) {
                        $shipping_price = 25000;
                    }else{
                        $shipping_price = 50000;
                    }
                }
               //lấy giá khuyến mãi
                $customerAgain = Customer::where('email','like','%'.Auth::user()->email.'%')->get();
                if ($totalPrice > 10000000 || count($customerAgain) >= 3) {
                   $codePromotion = 9;
               }else{
                if($totalPrice > 5000000 || count($customerAgain) >= 2){
                    $codePromotion = 6;
                }
                else{
                    if($totalPrice > 3000000 || count($customerAgain) >= 1){
                        $codePromotion = 3;
                    }
                }
            }

            $pricePromotion = -($totalPrice * $codePromotion / 100);
            $totalPriceAll = $totalPrice + $shipping_price + $pricePromotion;
            return view('pages.checkout',compact(['categories','shipping_price','pricePromotion','totalPriceAll']));
        }
    }
}

public function postBill(Request $request){
    $categories = Category::orderBy('id')->take(7)->get();
    $this->validate($request,[
        'email'=>'required|min:3|max:100|',
        'name'=>'required|min:3|max:100',
        'phone'=>'required|min:10|numeric',
        'address'=>'required',
        'age'=> 'required',
    ],
    [   
        'email.required'=>'Bạn chưa nhập email',
        'email.min'=>'email phải từ 3 ký tự trở lên',
        'email.max'=>'email tối đa 100 ký tự',
        'name.required'=>'Bạn chưa nhập họ tên',
        'name.min'=>'Họ tên phải từ 3 ký tự trở lên',
        'name.max'=>'Họ tên tối đa 100 ký tự',
        'phone.required'=>'Bạn chưa nhập số điện thoại',
        'phone.min'=>'Số điện thoại phải từ 10 ký tự trở lên',
        'phone.numeric'=>'Chưa nhập đúng định dạng số điện thoại',
        'city.required'=>'Bạn chưa nhập tỉnh/thành phố',
        'district.required'=>'Bạn chưa nhập quận/huyện',
        'ward.required'=>'Bạn chưa nhập xã/phường',
        'addressDetail.required'=>'Bạn chưa nhập địa chỉ chi tiết',
        'age.required'=>'Bạn chưa nhập tuổi',

    ]);

    $customer = new Customer;
    $customer->email = $request->email;
    $customer->name = $request->name;
    $customer->address = $request->address;
    $customer->phone = $request->phone;
    $customer->age = $request->age;
    $customer->save();

    $totalPrice = 0;
    $codePromotion = 0;
    $shipping_price = 0;
    $pricePromotion = 0;
    $totalPriceAll = 0;
    foreach ((array) session('cart') as $id => $item) {
        $totalPrice += $item['promotion_price'] * $item['quantity'];
    }
    if(strlen(strstr(Auth::user()->address, "Đà Nẵng")) > 0 || strlen(strstr(Auth::user()->address, "Hà Nội")) > 0 || strlen(strstr(Auth::user()->address, "Hồ Chí Minh")) > 0 || $totalPrice > 5000000){
        $shipping_price = 0;
    }
    else{
        if ($totalPrice > 1000000) {
            $shipping_price = 25000;
        }else{
            $shipping_price = 50000;
        }
    }
                   //lấy giá khuyến mãi
    $customerAgain = Customer::where('email','like','%'.Auth::user()->email.'%')->get();
    if ($totalPrice > 10000000 || count($customerAgain) >= 3) {
       $codePromotion = 9;
   }else{
    if($totalPrice > 5000000 || count($customerAgain) >= 2 ){
        $codePromotion = 6;
    }
    else{
        if($totalPrice > 3000000 || count($customerAgain) >= 1){
            $codePromotion = 3;
        }
    }
}

$pricePromotion = -($totalPrice * $codePromotion / 100);
$totalPriceAll = $totalPrice + $shipping_price + $pricePromotion;
$getID_customer = Customer::orderBy('created_at','desc')->first();
$bill = new Bill;
$bill->totalPriceProduct = $totalPrice;
$bill->codePromotion = $pricePromotion;
$bill->totalPrice = $totalPriceAll;
$bill->shippingPrice = $shipping_price;
$bill->id_customer = $getID_customer->id;
$bill->note = $request->note; 
$bill->payment = $request->payment;
$bill->status = "Đã đặt hàng";
$bill->save();

$getID_bill = Bill::orderBy('date_oder','desc')->first();
foreach ((array) session('cart') as $id => $item) {
    $bill_detail = new BillDetail;
    $bill_detail->id_bill = $getID_bill->id;
    $bill_detail->id_product = $id;
    $bill_detail->quantity = $item['quantity'];
    $bill_detail->price = $item['promotion_price'];
    $bill_detail->save();
}
return redirect('completeCheckout');

}

public function getCompleteCheckout()
{
    return view('pages.complete-checkout');
}

public function getDetailBill($id)
{
    $bill = Bill::find($id);
    $bill_details = BillDetail::where('id_bill',$id);
    return view('pages.detail-bill',compact(['bill','bill_details']));
}

public function getOrderLookup(){
    return view('pages.order-lookup');
}

public function getSearchBill($email){
    if(count(Customer::all()) != 0){
        $customers = Customer::where('email',$email)->get();
        if(count($customers) != 0){
            foreach ($customers as $customer) {
                $bills = Bill::where('id_customer',$customer->id)->get();
            }
            if(count($bills) != 0){
               return view('pages.detail-bill-ajax',compact('bills')); 
           }else{
            return view('pages.order-lookup-ajax');
        }
        
    }
    else{
        return view('pages.order-lookup-ajax');
    }
}
return view('pages.order-lookup-ajax');
}

public function getKhoThanhLy(){
    $products = Product::where('sale',1)->get();
    return view('pages.kho-thanh-ly',compact('products'));
}



public function getHotDeal(){
    $products = Product::where('deal',1)->get();
    return view('pages.hot-deal',compact('products'));
}



public function getLiveSearch($keySearch){
    $products = Product::where('name','like','%'.$keySearch.'%')->get();
    if(count($products) > 0){
        return view('pages.live-search',compact('products'));
    }
    else{
        return view('pages.live-search-not-found');
    }
}
public function getLiveSearchNotfound(){
    return view('pages.live-search-not-found');
}

public function getProduct($id){
    $rate = 0;
    $product = Product::find($id);
    $products_related = Product::where('id_category',$product->id_category)->get();
    $images = Image::where('id_product',$id)->get();
    $comments = Comment::where('id_product',$id)->get();
    if(count($comments) != 0){
        foreach($comments as $comment){
            $rate += $comment->rate;
        }
        $rateTB = (int)$rate / count($comments);
        $rate_product = $rate / count($comments);
        $percent_star = round($rateTB * 20,-1);

        $cm5stars = Comment::where('rate',5)->where('id_product',$id)->get();
        $cm4stars = Comment::where('rate',4)->where('id_product',$id)->get();
        $cm3stars = Comment::where('rate',3)->where('id_product',$id)->get();
        $cm2stars = Comment::where('rate',2)->where('id_product',$id)->get();
        $cm1stars = Comment::where('rate',1)->where('id_product',$id)->get();
    }
    else{
        $cm5stars = 0;
        $cm4stars = 0;
        $cm3stars = 0;
        $cm2stars = 0;
        $cm1stars = 0;
        $rate_product = 0;
        $percent_star = 0;
    }
    
    return view('pages.single-product',compact(['product','images','products_related','comments','percent_star','rate_product','cm5stars','cm4stars','cm3stars','cm2stars','cm1stars']));
}

public function postCommentProduct(Request $request){
    if(strlen($request->content) == null || $request->rate == 0){
        $comments = Comment::where('id_product',$request->id_product)->get();
        return view('pages.comment-product-ajax',compact('comments'))->with('thongbao','nhập đầy đủ nội dung phản hồi và sao đánh giá');
    }else{
        $comment = new Comment;
        $comment->id_user = Auth::user()->id;
        $comment->id_product = $request->id_product;
        $comment->content = $request->content;
        $comment->rate = $request->rate;
        $comment->save();

        $comments = Comment::where('id_product',$request->id_product)->get();
        $product = Product::find($request->id_product);
        $rate = 0;

        if(count($comments) != 0){
            foreach($comments as $comment){
                $rate += $comment->rate;
            }
            $rateTB = (int)$rate / count($comments);
            $product->rate = $rateTB;
            $product->save();
        }
        else{
            $rateTB = 0;
            $product->rate = $rateTB;
            $product->save();
        }
        return view('pages.comment-product-ajax',compact('comments'));
    }

}

public function postCommentBlog(Request $request){
    if(strlen($request->content) == null ){
        $comments = Comment::where('id_news',$request->id_blog)->get();
        return view('pages.comment-blog-ajax',compact('comments'))->with('thongbao','nhập đầy đủ nội dung phản hồi và sao đánh giá');
    }else{
        $comment = new Comment;
        $comment->id_user = Auth::user()->id;
        $comment->id_news = $request->id_blog;
        $comment->content = $request->content;
        $comment->save();

        $comments = Comment::where('id_news',$request->id_blog)->get();
        return view('pages.comment-blog-ajax',compact('comments'));
    }
}

public function getContact(){
    return view('pages.contact');
}

public function postContact(Request $request){
    $this->validate($request,[
        'email'=>'required|min:3|max:100|',
        'name'=>'required|min:3|max:100',
        'phone'=>'required|min:10|numeric',
    ],
    [   
        'email.required'=>'Bạn chưa nhập email',
        'email.min'=>'email phải từ 3 ký tự trở lên',
        'email.max'=>'email tối đa 100 ký tự',
        'name.required'=>'Bạn chưa nhập họ tên',
        'name.min'=>'Họ tên phải từ 3 ký tự trở lên',
        'name.max'=>'Họ tên tối đa 100 ký tự',
        'phone.required'=>'Bạn chưa nhập số điện thoại',
        'phone.min'=>'Số điện thoại phải từ 10 ký tự trở lên',
        'phone.numeric'=>'Chưa nhập đúng định dạng số điện thoại',
    ]);

    $contact = new Contact;
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->content = $request->mes;
    $contact->save();

    return redirect('contact')->with('thongbao','Cảm ơn bạn đã liên hệ!! Chúng tôi sẽ phản hồi trong thời gian sớm nhất');
}

public function getSearch(){
    return view('pages.search');
}
public function postSearch(Request $request){
    $this->validate($request, [
        's' => 'required',
    ], [
        's.required' => 'Bạn chưa nhập nội dung tìm kiếm',
    ]);

    $products = Product::where('name', 'like', '%' . $request->s . '%')->get();
    return view('pages.search', ['products' => $products, 's' => $request->s]);
}
public function getBlog($id){
    $blog = News::find($id);
    $resent_blogs = News::where('category_news',$blog->category_news)->take(3)->get();
    $comments = Comment::where('id_news',$id)->get();
    return view('pages.blog',compact('blog','resent_blogs','comments'));
}

public function getAllBlogs(){
    $blogs = News::orderBy('id')->get();
    $new_blogs = News::orderBy('id','desc')->take(3)->get();
    return view('pages.all-blogs',compact('blogs','new_blogs'));
}
public function addToFavourite($id_product){
    $id_user = Auth::user()->id;
    $allFavoriteCurrent = Favourite::where('id_user',$id_user)->where('id_product',$id_product)->get(); 
    if (count($allFavoriteCurrent) == 0) {
        $favourite = new Favourite;
        $favourite->id_product = $id_product;
        $favourite->id_user = $id_user;
        $favourite->save();

        $allFavorite = Favourite::where('id_user',$id_user)->get();
        $quantityFavourite = count($allFavorite);
        return view("pages.favourite_ajax",compact(['quantityFavourite','allFavorite']));
    }else{
        return view("pages.favourite_ajax",compact(['quantityFavourite','allFavorite']));
    }
}

public function removeFavourite($id_favourite){
    $favourite = Favourite::find($id_favourite);
    $favourite->delete();
    $id_user = Auth::user()->id;
    $allFavorite = Favourite::where('id_user',$id_user)->get();
    $quantityFavourite = count($allFavorite);
    return view("pages.favourite_ajax",compact(['quantityFavourite','allFavorite']));
}
}


