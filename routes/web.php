<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CmsController;




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
// 	     return view('user.index');
// 	 });
Route::get('/',[CmsController::class,'products']);
Route::get('/category/{slug}', [CmsController::class, 'category_details']);
Route::get('/product/{pslug}',[CmsController::class,'products_list']);



//Admin Route

Route::get('/login', [AuthController::class, 'login']);
Route::post('/save-admin-login', [AuthController::class, 'save_admin_login']);
Route::get('/admin-logout', [AuthController::class, 'admin_destroy']);


Route::group(['middleware' => 'MyAuth'], function(){
Route::get('/home', function () {
	     return view('admin.home');
	 });

Route::get('/all-products',[ProductController::class,'all_products']);
Route::get('/show-products',[ProductController::class,'show_products'])->name("show.products");
Route::get('/add-products', [ProductController::class, 'add_products']);

	   Route::post('/save-add-products', [ProductController::class, 'save_add_products'])->name("save.add.products");

	   Route::get('/delete-products/{pid}',[ProductController::class,'delete_products']);

	   Route::get('/edit-products/{pid}',[ProductController::class,'edit_products']);

	   Route::post('/update-products/{pid}',[ProductController::class,'update_products']);
	   Route::get('/all-categories',[CategoriesController::class,'all_Categories']);

	   Route::get('/add-categories', [CategoriesController::class, 'add_categories']);

	   Route::post('/save-add-categories', [CategoriesController::class, 'save_add_categories'])->name("save.add.categories");

	   Route::get('/delete-categories/{c_id}',[CategoriesController::class,'delete_categories']);

	   Route::get('/delete-image/{c_id}',[CategoriesController::class,'delete_image'])->name("delete.image");


	   Route::get('/edit-categories/{c_id}',[CategoriesController::class,'edit_categories']);

	   Route::post('/update-categories/{c_id}',[CategoriesController::class,'update_categories']);

	    Route::get('/show-categories',[CategoriesController::class,'show_categories'])->name("show.categories");
});

