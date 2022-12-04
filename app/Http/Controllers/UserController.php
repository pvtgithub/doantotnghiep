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
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function getUsers(){
        $users = User::all();
        return view('admin.user.listUsers',compact('users'));
    }  

    public function deleteUser(Request $request){
        $user = User::find($request->id);
        $user->delete();

        $users = User::all();
        return view('admin.ajax.listUsers_ajax',compact('users'));
    }

    public function getAddUser(){
        return view('admin.user.addUser');
    }
    public function getAddUserAjax(){
        return view('admin.ajax.addUser_ajax');
    }

    public function postAddUser(Request $request){
        $this->validate($request,[
            'email'=>'required|min:3|max:100|unique:users,email',
            'name'=>'required|min:3|max:100',
            'phone'=>'required|min:10|numeric',
            'city'=>'required','district'=>'required','ward'=>'required','addressDetail'=>'required',
            'password'=>'required|min:6|max:50',
            'passwordAgain'=>'required|same:password',
            'age'=> 'required',
            'permission'=>'required'
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
            'permission.required'=>'Bạn chưa nhập quyền truy cập',
        ]);
        $address = $request->addressDetail."-".$request->get('ward')."-".$request->get('district')."-".$request->get('city');//get adddress user
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $address;
        $user->age = $request->age;
        $user->password = bcrypt($request->password);
        $user->permission = $request->permission;
        $user->save();
        return redirect('admin/getAddUserAjax');
    }

    public function getEditUser($id){
        $user = User::find($id);
        $address = explode('-', $user->address );
        return view('admin.user.editUser',compact(['user','address']));
    }

    public function getEditUserAjax($id){
        $user = User::find($id);
        $address = explode('-', $user->address );
        return view('admin.ajax.editUser_ajax',compact(['user','address']));
    }

    public function postEditUser($id,Request $request){
        $user = User::find($id);
        $this->validate($request,[
            'email'=>['required','min:3','max:100',Rule::unique('users')->ignore($user->id)],
            'name'=>'required|min:3|max:100',
            'phone'=>'required|min:10|numeric',
            'city'=>'required','district'=>'required','ward'=>'required','addressDetail'=>'required',
            'age'=> 'required',
            'permission'=>'required'
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
            'permission.required'=>'Bạn chưa nhập quyền truy cập',
        ]);
        $address = $request->addressDetail."-".$request->get('ward')."-".$request->get('district')."-".$request->get('city');

        $user->email = $request->email;
        $user->name = $request->name;
        $user->address = $address;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->permission = $request->permission;
        if($request->changePassword == 'on')
        {
            $this->validate($request,[
                'password'=>'required|min:3|max:100',
                'passwordAgain'=>'required|same:password',
            ],[
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải từ 3 đến 100 ký tự',
                'password.max'=>'Mật khẩu phải từ 3 đến 100 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu nhập lại chưa trùng khớp',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('admin/getEditUserAjax/'.$user->id);
    }
}
