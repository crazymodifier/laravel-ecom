<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TaxonomyController;
use App\Http\Controllers\Admin\TempImagesController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Public\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('/');
// Route::get('/shop', function () {
//     return view('shop');
// });

Route::view('checkout', 'public.checkout')->name('checkout');

Route::get('shop', [ShopController::class , 'index'])->name('shop');
Route::get('cart', [ShopController::class , 'cart'])->name('cart');

//

// Route::prefix('product',)
Route::get('/product/{name}', [ ShopController::class , 'show'])->name('product.show');

Route::group(['middleware' => 'guest'] , function() {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
} );
Route::get('logout', [DashboardController::class, 'logout'])->name('logout')->middleware('auth');
Route::prefix('admin')->group(function () {
    
    

    Route::group(['middleware' => 'auth'] , function() {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::get('products', [ProductController::class, 'index'])->name('admin.products');
        Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::post('products/{id}/edit', [ProductController::class, 'update'])->name('admin.products.update');
        // Route::post('products/{id}', [ProductController::class, 'update'])->name('admin.products.');
        
        Route::get('orders', [OrderController::class, 'index'])->name('admin.orders');
        Route::get('invoices', [InvoiceController::class, 'index'])->name('admin.invoices');
        Route::get('profile', [DashboardController::class, 'profile'])->name('admin.profile');
        Route::get('users', [DashboardController::class, 'profile'])->name('admin.users');
        
        
        // Route::prefix('taxonomies')->group(function () {
            
        Route::get('taxonomies/{type}', [TaxonomyController::class, 'show'])->name('admin.taxonomies.show');
        Route::get('taxonomies', [TaxonomyController::class, 'index'])->name('admin.taxonomies');

        Route::get('terms/{id}/edit', [TermController::class, 'edit'])->name('admin.terms.edit');
            // Route::get('categories', [DashboardController::class, 'index'])->name('admin.taxonomies.categories');
       
        
        Route::post('image/create', [TempImagesController::class, 'create'])->name('admin.image.create');

        // });
    } );
});

// 

// Route::post('login', [''])