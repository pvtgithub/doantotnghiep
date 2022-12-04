<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;


Route::get('/',[PagesController::class,'home'])->name('home');
Auth::routes();

Route::get('home',[PagesController::class,'home'])->name('home');
Route::get('login',[PagesController::class,'getLogin'])->name('getLogin');
Route::post('login',[PagesController::class,'postLogin'])->name('postLogin');
Route::get('register',[PagesController::class,'getRegister'])->name('getRegister');
Route::post('register',[PagesController::class,'postRegister'])->name('postRegister');
Route::get('logout',[PagesController::class,'getLogout'])->name('getLogout');
Route::get('AddCart/{id}/{quantity}',[CartController::class,'getAddcart'])->name('getAddcart');
Route::patch('UpdateCart',[CartController::class,'Update'])->name('Update');
Route::delete('RemoveCart',[CartController::class,'Remove'])->name('Remove');
Route::get('GetCheckout',[CartController::class,'getCheckout'])->name('getCheckout');
Route::get('Checkout',[PagesController::class,'getCheckout'])->name('getCheckout');
Route::post('postBill',[PagesController::class,'postBill'])->name('postBill');
Route::get('completeCheckout',[PagesController::class,'getCompleteCheckout'])->name('getCompleteCheckout');
Route::get('detailBill/{id}',[PagesController::class,'getDetailBill'])->name('getDetailBill');
Route::get('orderLookup',[PagesController::class,'getOrderLookup'])->name('getOrderLookup');
Route::get('getSearchBill/{email}',[PagesController::class,'getSearchBill'])->name('getSearchBill');
Route::get('kho-thanh-ly',[PagesController::class,'getKhoThanhLy'])->name('getKhoThanhLy');
Route::get('filter-price/{value}',[FilterController::class,'getFilterPrice'])->name('getFilterPrice');
Route::get('filter-price',[FilterController::class,'getFilterPriceDefault'])->name('getFilterPriceDefault');
Route::get('filter-radio/{valuePrice}/{valueCategory}',[FilterController::class,'getFilterRadioPrice'])->name('getFilterRadioPrice');
Route::get('hot-deal',[PagesController::class,'getHotDeal'])->name('getHotDeal');
Route::get('filter-price-hot-deal/{value}',[FilterController::class,'getFilterPriceHotDeal'])->name('getFilterPriceHotDeal');
Route::get('filter-price-hot-deal',[FilterController::class,'getFilterPriceDefaultHotDeal'])->name('getFilterPriceHotDeal');
Route::get('filter-radio-hot-deal/{valuePrice}/{valueCategory}',[FilterController::class,'getFilterRadioPriceHotDeal'])->name('getFilterRadioPriceHotDeal');
Route::get('getLiveSearch/{keySearch}',[PagesController::class,'getLiveSearch'])->name('getLiveSearch');
Route::get('getLiveSearch/',[PagesController::class,'getLiveSearchNotfound'])->name('getLiveSearch');
Route::get('getProduct/{id}',[PagesController::class,'getProduct'])->name('getProduct');
Route::get('postCommentProduct',[PagesController::class,'postCommentProduct'])->name('postCommentProduct');
Route::get('postCommentBlog',[PagesController::class,'postCommentBlog'])->name('postCommentBlog');
Route::get('contact',[PagesController::class,'getContact'])->name('getContact');
Route::post('contact',[PagesController::class,'postContact'])->name('postContact');
Route::get('search',[PagesController::class,'getSearch'])->name('getSearch');
Route::post('search',[PagesController::class,'postSearch'])->name('postSearch');
Route::get('filter-price-search/{value}',[FilterController::class,'getFilterPriceSearch'])->name('getFilterPriceSearch');
Route::get('filter-price-search',[FilterController::class,'getFilterPriceDefaultSearch'])->name('getFilterPriceDefaultSearch');
Route::get('filter-radio-search/{valuePrice}/{valueCategory}',[FilterController::class,'getFilterRadioPriceSearch'])->name('getFilterRadioPriceSearch');
Route::get('getBlog/{id}',[PagesController::class,'getBlog'])->name('getBlog');
Route::get('getAllBlogs',[PagesController::class,'getAllBlogs'])->name('getAllBlogs');
Route::get('completedBill',[BillController::class,'completedBill'])->name('completedBill');
Route::get('addToFavourite/{id_product}',[PagesController::class,'addToFavourite'])->name('addToFavourite');
Route::get('removeFavourite/{id_favourite}',[PagesController::class,'removeFavourite'])->name('removeFavourite');

Route::get('admin',[AdminsController::class,'getAdmin'])->name('getAdmin');
Route::group(['prefix'=>'admin'],function (){
	Route::get('admin',[AdminsController::class,'getAdmin'])->name('getAdmin');
	Route::get('bills',[BillController::class,'getBills'])->name('getBills');
	Route::get('blogs',[BlogController::class,'getBlogs'])->name('getBlogs');
	Route::get('comments',[CommentController::class,'getComments'])->name('getComments');
	Route::get('contacts',[ContactController::class,'getContacts'])->name('getContacts');
	Route::get('detailContact/{id}',[ContactController::class,'getDetailContact'])->name('getDetailContact');

	Route::get('bill_detail/{id}',[BillController::class,'getBill_Detail'])->name('getBill_Detail');
	Route::get('cancelBill',[BillController::class,'getCancelBill'])->name('getCancelBill');
	Route::get('deleteBill',[BillController::class,'deleteBill'])->name('deleteBill');
	Route::get('orderConfirm',[BillController::class,'orderConfirm'])->name('orderConfirm');
	Route::get('deliveryBill',[BillController::class,'deliveryBill'])->name('deliveryBill');

	Route::get('deleteComment',[CommentController::class,'deleteComment'])->name('deleteComment');
	Route::get('deleteContact',[ContactController::class,'deleteContact'])->name('deleteContact');
	Route::get('deleteContactInDetail/{id}',[ContactController::class,'deleteContactInDetail'])->name('deleteContactInDetail');

	Route::get('users',[UserController::class,'getUsers'])->name('getUsers');
	Route::get('deleteUser',[UserController::class,'deleteUser'])->name('deleteUser');
	Route::get('getAddUser',[UserController::class,'getAddUser'])->name('getAddUser');
	Route::get('getAddUserAjax',[UserController::class,'getAddUserAjax'])->name('getAddUserAjax');
	Route::POST('addUser',[UserController::class,'postAddUser'])->name('postAddUser');
	Route::get('getEditUser/{id}',[UserController::class,'getEditUser'])->name('getEditUser');
	Route::get('getEditUserAjax/{id}',[UserController::class,'getEditUserAjax'])->name('getEditUserAjax');
	Route::POST('postEditUser/{id}',[UserController::class,'postEditUser'])->name('postEditUser');

	Route::get('customers',[CustomerController::class,'getCustomers'])->name('getCustomers');
	Route::get('deleteCustomer',[CustomerController::class,'deleteCustomer'])->name('deleteCustomer');
	Route::get('getEditCustomer/{id}',[CustomerController::class,'getEditCustomer'])->name('getEditCustomer');
	Route::get('getEditCustomerAjax/{id}',[CustomerController::class,'getEditCustomerAjax'])->name('getEditCustomerAjax');
	Route::POST('postEditCustomer/{id}',[CustomerController::class,'postEditCustomer'])->name('postEditCustomer');

	Route::get('categories',[CategoryController::class,'getCategories'])->name('getCategories');
	Route::get('deleteCategory',[CategoryController::class,'deleteCategory'])->name('deleteCategory');
	Route::get('getAddCategory',[CategoryController::class,'getAddCategory'])->name('getAddCategory');
	Route::get('getAddCategoryAjax',[CategoryController::class,'getAddCategoryAjax'])->name('getAddCategoryAjax');
	Route::POST('postAddCategory',[CategoryController::class,'postAddCategory'])->name('postAddCategory');
	Route::get('getEditCategory/{id}',[CategoryController::class,'getEditCategory'])->name('getEditCategory');
	Route::get('getEditCategoryAjax/{id}',[CategoryController::class,'getEditCategoryAjax'])->name('getEditCategoryAjax');
	Route::POST('postEditCategory/{id}/{id_img}',[CategoryController::class,'postEditCategory'])->name('postEditCategory');

	Route::get('products',[ProductController::class,'getProducts'])->name('getProducts');
	Route::get('deleteProduct',[ProductController::class,'deleteProduct'])->name('deleteProduct');
	Route::get('getAddProduct',[ProductController::class,'getAddProduct'])->name('getAddProduct');
	Route::get('getAddProductAjax',[ProductController::class,'getAddProductAjax'])->name('getAddProductAjax');
	Route::POST('postAddProduct',[ProductController::class,'postAddProduct'])->name('postAddProduct');
	Route::get('getEditProduct/{id}',[ProductController::class,'getEditProduct'])->name('getEditProduct');
	Route::get('getEditProductAjax/{id}',[ProductController::class,'getEditProductAjax'])->name('getEditProductAjax');
	Route::POST('postEditProduct/{id}/{id_img}',[ProductController::class,'postEditProduct'])->name('postEditProduct');


	Route::get('blogs',[BlogController::class,'getBlogs'])->name('getBlogs');
	Route::get('deleteBlog',[BlogController::class,'deleteBlog'])->name('deleteBlog');
	Route::get('getAddBlog',[BlogController::class,'getAddBlog'])->name('getAddBlog');
	Route::get('getAddBlogAjax',[BlogController::class,'getAddBlogAjax'])->name('getAddBlogAjax');
	Route::POST('postAddBlog',[BlogController::class,'postAddBlog'])->name('postAddBlog');
	Route::get('getEditBlog/{id}',[BlogController::class,'getEditBlog'])->name('getEditBlog');
	Route::get('getEditBlogAjax/{id}',[BlogController::class,'getEditBlogAjax'])->name('getEditBlogAjax');
	Route::POST('postEditBlog/{id}/{id_img1}/{id_img2}',[BlogController::class,'postEditBlog'])->name('postEditBlog');

	Route::get('images',[ImageController::class,'getImages'])->name('getImages');
	Route::get('deleteImage',[ImageController::class,'deleteImage'])->name('deleteImage');
	Route::get('getAddImage',[ImageController::class,'getAddImage'])->name('getAddImage');
	Route::get('getAddImageAjax',[ImageController::class,'getAddImageAjax'])->name('getAddImageAjax');
	Route::POST('postAddImage',[ImageController::class,'postAddImage'])->name('postAddImage');
	Route::get('getEditImage/{id}',[ImageController::class,'getEditImage'])->name('getEditImage');
	Route::get('getEditImageAjax/{id}',[ImageController::class,'getEditImageAjax'])->name('getEditImageAjax');
	Route::POST('postEditImage/{id}',[ImageController::class,'postEditImage'])->name('postEditImage');
});