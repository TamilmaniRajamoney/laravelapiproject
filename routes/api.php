<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public Routes 

//This route will be used frod crud method 
// Route::resource('products',ProductController::class);

Route::get('/products/search/{name}','App\Http\Controllers\ProductController@search');

Route::get('/products','App\Http\Controllers\ProductController@index');

Route::get('/products/{id}',[ProductController::class,'show']);

Route::post('/register',[AuthController::class,'register']);


//protected routes
Route::group(['middleware'=>['auth:sanctum']],function(){

Route::post('/products',[ProductController::class,'store']);

Route::put('/products/{id}',[ProductController::class,'update']);

Route::delete('/products/{id}',[ProductController::class,'destroy']);

Route::post('/logout',[ProductController::class,'logout']);

});




// Route::post('/products',function(){
//  return Product::create([
//    'name'=> 'Product One',
//    'slug'=> 'Product-one',
//    'description'=> 'This is product one',
//    'price'=> '1.99'
    
//  ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
