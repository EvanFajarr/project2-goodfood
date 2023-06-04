<?php

use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware([ 'role:admin'])->group(function () {

Route::get('/category',[CategoryController::class,'index'])->name('category.index');//category
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/create',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{code}/edit',[CategoryController::class,'edit']);
Route::put('/category/{code}/edit',[CategoryController::class,'update']);
Route::get('/category/slug',[CategoryController::class,'slug']);
Route::delete('/category/{code}',[CategoryController::class,'destroy'])->name('category.destroy');



Route::get('/Subcategory',[SubCategoryController::class,'index']);//subbcategory
Route::get('/Subcategory/create',[SubCategoryController::class,'create']);
Route::post('/Subcategory/create',[SubCategoryController::class,'store']);

Route::get('/Subcategory/{code}/edit',[SubCategoryController::class,'edit']);
Route::put('/Subcategory/{code}/edit',[SubCategoryController::class,'update']);
Route::delete('/Subcategory/{code}',[SubCategoryController::class,'destroy']);

Route::get('/product',[ProductController::class,'index']);//product
Route::get('/product/create',[ProductController::class,'create']);
Route::post('/product/create',[ProductController::class,'store']);

Route::get('/product/{id}/edit',[ProductController::class,'edit']);
Route::put('/product/{id}/edit',[ProductController::class,'update']);
Route::delete('/product/{code}',[ProductController::class,'destroy']);

Route::get('/product-images/{id}',[ProductController::class,'images'])->name('product.images');//add image

Route::delete('/product-images/remove/{id}',[ProductController::class,'deleteimage']);
Route::post('/product/add-image/{id}',[ProductController::class,'addimage']);

Route::get('export', [CsvController::class, 'export'])->name('export');//catgeory
Route::post('category', [CsvController::class, 'import'])->name('import');

Route::get('/subCategoryExport', [CsvController::class, 'subCategoryexport'])->name('subCategoryExport');//subcategory
Route::post('/Subcategory', [CsvController::class, 'subCategoryimport'])->name('subCategoryimport');

Route::get('/productExport', [CsvController::class, 'productexport'])->name('productExport');//product
Route::post('/product', [CsvController::class, 'productimport'])->name('productimport');

Route::get('/edit/{id}', [OrderController::class, 'edit']);
Route::put('/edit/{id}', [OrderController::class, 'update']);
Route::get('/orderList', [OrderController::class, 'admin']);

Route::get('/orderexport', [CsvController::class, 'orderexport'])->name('orderexport');//product



Route::get('/user', [UserController::class, 'index'])->middleware(['session']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'store']);
Route::delete('/delete/{id}', [UserController::class, 'destroy']);

Route::get('/user/{id}/show', [UserController::class, 'show'])->name('users.show');

Route::put('/user/{id}/show', [UserController::class, 'update'])->name('users.update');

Route::post('/user/{id}/ya', [UserController::class, 'assignRole'])->name('users.roles'); //asignrole in user
Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');

Route::post('/user/{id}/show', [UserController::class, 'givePermission'])->name('users.permissions'); //give permision in rolle
Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
 });



Route::get('/loginAdmin', [LoginController::class, 'index'])->name('loginAdmin')->middleware(['user']);
Route::post('/login/login', [LoginController::class, 'login']);



//register
// Route::get('/login/register', [LoginController::class, 'register'])->middleware(['user']);
// Route::post('/login/create', [LoginController::class, 'create']);



//logout
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware([ 'role:user'])->group(function () {



//cart
Route::post('/addtocart', [CartController::class, 'cart'])->name('addtocart')->middleware(['session']);

Route::get('cartlist', [CartController::class, 'cartpage'])->name('cartlist')->middleware(['session']);
Route::get('/hapuscart/{id}', [CartController::class, 'hapuscart']);

Route::get('/checkout', [OrderController::class, 'index'])->middleware(['session']);
Route::post('/checkout', [OrderController::class, 'store']);


Route::get('/orderUser', [OrderController::class, 'user'])->middleware(['session']);

Route::delete('/hapus/{id}', [OrderController::class, 'destroy']);


Route::delete('/destroy/{id}', [OrderController::class, 'delete']);


//project 3

Route::get('/detailUser', [UserController::class, 'detail']);


Route::get('/editUser', 'App\Http\Controllers\UserController@edit');
Route::put('/editUser', 'App\Http\Controllers\UserController@edit');

Route::get('/product/{slug}',[HomeController::class,'detail'])->name('images');

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
