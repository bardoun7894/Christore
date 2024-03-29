<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\SectionController ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Auth::routes();
Route::get('/a',function(){
return "Did";
});
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function () {
//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
   Route::prefix('admin')->namespace('Admin')->group(function(){
        // all the admin routes will be defined here
                Route::match(['post','get'],'/', [App\Http\Controllers\Admin\AdminController::class, 'login']);
                Route::group(['middleware' => ['admin']], function () {
                Route::get('dashboard', [AdminController::class, 'dashboard']);
                Route::get('settings', [AdminController::class, 'settings']);
                Route::get('logout', [AdminController::class, 'logout']);
                Route::post('check_current_password', [AdminController::class, 'check_current_password']);
                Route::post('update_current_password', [AdminController::class, 'update_current_password']);
                Route::match(['get', 'post'], 'update_admin_details', [AdminController::class, 'update_admin_details']);
                Route::get('section', [SectionController::class, 'sections']);
                //brands
                Route::get('brand', [BrandController::class, 'brands']);
                Route::post('update-brand-status', [BrandController::class, 'updateBrandStatus']);
                Route::match(['get','post'], 'add-brand/{id?}',[BrandController::class, 'addEditBrand']);
                Route::get('delete-brand/{id?}', [BrandController::class, 'deleteBrand']);

                Route::post('update-section-status', [SectionController::class, 'updateSectionStatus']);
                Route::get('categories', [CategoryController::class, 'categories']);
                Route::get('products', [ProductController::class, 'products']);
                Route::get('navlinks', [\App\Http\Controllers\NavLinkController::class, 'navlinks']);
                Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);
                Route::post('update-product-status', [ProductController::class, 'updateProductStatus']);
                Route::post('append-category-level', [CategoryController::class, 'appendCategoryLevel']);
                Route::match(['get', 'post'], 'add-edit-category/{id?}', [CategoryController::class, 'addEditCategory']);
                Route::match(['get', 'post'], 'add-edit-product/{id?}',[ProductController::class, 'addEditProduct']);
                Route::match(['get', 'post'], 'move-add-attributes/{id}',[ProductAttributeController::class, 'moveaddAttributes']);
                Route::get('delete-category-image/{id?}', [CategoryController::class, 'deleteCategoryImage']);
                Route::get('delete-product-image/{id?}', [ProductController::class, 'deleteProductImage']);
                Route::get('delete-category/{id?}', [CategoryController::class, 'deleteCategory']);
                Route::get('delete-product/{id?}', [ProductController::class, 'deleteProduct' ]);

            //add end update attribute to product
            Route::match(['get', 'post'], 'add-attributes/{id}',[ProductAttributeController::class, 'addAttributes']);
            Route::post('edit-attribute/{id}',[ProductAttributeController::class, 'EditProductAttributes']);
            Route::get('delete-attribute/{id?}', [ProductAttributeController::class, 'deleteProductAttribute' ]);
            Route::post('update-attribute-status', [ProductAttributeController::class, 'updateAttributeStatus']);

            //add images
            Route::match(['get', 'post'], 'add-images/{id}',[ProductController::class, 'addImages']);
            //delete product image from product_images
            Route::get('delete-product-image/{id?}', [ProductController::class, 'deleteProductImages' ]);
            //update product image status
            Route::post('update-product-image-status', [ProductController::class, 'updateProductImageStatus']);


            Route::match(['get','post','put'],'banner',[\App\Http\Controllers\BannerController::class,'banners']);
            Route::match(['get', 'post'], 'postData/{id}',function ($id){
                $request = new Request();
                if($request->isMethod('post')){
                    return response()->json($id);
                }
                return response()->json($id);

//                return response()->json($id);
            });

        });

        });
   Route::prefix('/front')->namespace('Front')->group(function (){
       Route::get('/', [\App\Http\Controllers\Front\FrontController::class, 'front']);
       Route::match(['get','post'],'/products', [\App\Http\Controllers\Front\FrontController::class, 'get_all_products']);
//       Route::match(['get','post'],'/get_category_id', [\App\Http\Controllers\Front\FrontController::class, 'countd']);
       Route::match(['get','post'],'/{url?}', [\App\Http\Controllers\Front\CategoryController::class, 'categoryDetail']);

       //    Route::post('/sort_products', [\App\Http\Controllers\Front\FrontController::class, 'get_sorting']);

    });
});

Auth::routes();


 Route::get('/getbannersData',function (){
    $banners = \App\Models\banner::get();
    return response()->json($banners);
});
