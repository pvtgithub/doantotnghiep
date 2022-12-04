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

class ContactController extends Controller
{
    //
    public function getContacts(){
        $contacts = Contact::all();
        return view('admin.contact.listContacts',compact('contacts'));
    }
    public function getDetailContact($id){
        $contact = Contact::find($id);
        return view('admin.contact.contactDetail',compact('contact'));
    }
    public function deleteContact(Request $request){
        $contact = Contact::find($request->id);
        $contact->delete();

        $contacts = Contact::all();
        return view('admin.ajax.listContacts_ajax',compact('contacts'));
    }
    public function deleteContactInDetail($id){
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('admin/contacts');
    }
}
