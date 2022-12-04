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

class BillController extends Controller
{
    public function getBills(){
        $bills = Bill::all();
        return view('admin.bill.listBills',compact('bills'));
    }

    public function getBill_Detail($id)
    {
        $bill = Bill::find($id);
        return view('admin.bill.getBill_Detail',compact('bill'));
    }

    public function getCancelBill(Request $request){
        $status_after = $request->status;
        $bill = Bill::find($request->id);
        $bill->status = 'Đã hủy đơn';
        $bill->save();
        return view('admin.ajax.bill_detail_ajax',compact(['bill','status_after']));
    }

    public function deleteBill(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill_details = BillDetail::where('id_bill',$request->id)->get();
        foreach($bill_details as $row){
            $row->delete();
        }
        $bill->delete();
        $bills = Bill::all();
        return view('admin.ajax.listBills_ajax',compact('bills'))->with('thongbao','Xóa thành công!!!');
    }

    public function orderConfirm(Request $request){
        $bill = Bill::find($request->id);
        $bill->status = 'Đã xác nhận';
        $bill->save();
        return view('admin.ajax.bill_detail_ajax',compact('bill'));
    }
    public function deliveryBill(Request $request){
        $bill = Bill::find($request->id);
        $bill->status = 'Đang giao hàng';
        $bill->save();
        return view('admin.ajax.bill_detail_ajax',compact('bill'));
    }
    public function completedBill(Request $request){
        $bill = Bill::find($request->id);
        $bill->status = 'Giao hàng thành công';
        $bill->save();
        $bills = Bill::where('id',$request->id)->get();
        return view('pages.detail-bill-ajax',compact('bills'));
    }
}
