<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TaxonomyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/shop', function () {
//     return view('shop');
// });

Route::view('shop', 'shop');

//

// Route::prefix('product',)
Route::get('/product/{name}', function (string $name) {
    return view('single', ['data' => $name]);
})->name('product.show');

Route::group(['middleware' => 'guest'] , function() {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
} );
Route::get('logout', [DashboardController::class, 'logout'])->name('logout')->middleware('auth');
Route::prefix('admin')->group(function () {
    
    

    Route::group(['middleware' => 'auth'] , function() {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        Route::get('products/{id}', [ProductController::class, 'show'])->name('admin.products.show');
        Route::get('products/{action}', [ProductController::class, 'indexss'])->name('admin.products.ss');
        Route::get('products', [ProductController::class, 'index'])->name('admin.products');
        
        Route::get('orders', [OrderController::class, 'index'])->name('admin.orders');
        Route::get('invoices', [InvoiceController::class, 'index'])->name('admin.invoices');
        Route::get('profile', [DashboardController::class, 'profile'])->name('admin.profile');
        Route::get('users', [DashboardController::class, 'profile'])->name('admin.users');
        
        
        // Route::prefix('taxonomies')->group(function () {
            
        Route::get('taxonomies/{type}', [TaxonomyController::class, 'show'])->name('admin.taxonomies.show');
        Route::get('taxonomies', [TaxonomyController::class, 'index'])->name('admin.taxonomies');
            // Route::get('categories', [DashboardController::class, 'index'])->name('admin.taxonomies.categories');

        // });
    } );
});

// 

// Route::post('login', [''])