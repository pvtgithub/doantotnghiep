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

class CustomerController extends Controller
{
    public function getCustomers(){
        $customers = Customer::all();
        return view('admin.customer.listCustomers',compact('customers'));
    }
    public function deleteCustomer(Request $request){
        $customer = Customer::find($request->id);
        $customer->delete();

        $customers = Customer::all();
        return view('admin.ajax.listCustomers_ajax',compact('customers'));
    }

    public function getEditCustomer($id){
        $customer = Customer::find($id);
        $address = explode('-', $customer->address );
        return view('admin.customer.editCustomer',compact(['customer','address']));
    }
    public function getEditCustomerAjax($id){
        $customer = Customer::find($id);
        $address = explode('-', $customer->address );
        return view('admin.ajax.editCustomer_ajax',compact(['customer','address']));
    }

    public function postEditCustomer($id, Request $request){
        $customer = Customer::find($id);
        $this->validate($request,[
            'email'=>['required','min:3','max:100'],
            'name'=>'required|min:3|max:100',
            'phone'=>'required|min:10|numeric',
            'city'=>'required','district'=>'required','ward'=>'required','addressDetail'=>'required',
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
        $address = $request->addressDetail."-".$request->get('ward')."-".$request->get('district')."-".$request->get('city');

        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->address = $address;
        $customer->phone = $request->phone;
        $customer->age = $request->age;
        $customer->save();
        return redirect('admin/getEditCustomerAjax/'.$customer->id);
    }
}
