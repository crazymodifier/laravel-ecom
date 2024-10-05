<?php
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::prefix('admin')->group(function () {
    
    Route::group(['middleware' => 'guest'] , function() {
        Route::get('login', [AdminAuthController::class, 'index'])->name('admin.login');
        Route::post('login', [AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
    } );

    Route::group(['middleware' => 'auth'] , function() {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        // Route::get('products', [Product::class, 'index'])->name('admin.products');
        Route::get('orders', [DashboardController::class, 'index'])->name('admin.orders');
        Route::get('invoices', [DashboardController::class, 'index'])->name('admin.invoices');
        Route::get('profile', [DashboardController::class, 'profile'])->name('admin.profile');
        Route::get('logout', [DashboardController::class, 'logout'])->name('admin.logout');
        
        // Route::prefix('taxonomies')->group(function () {
            
        Route::get('taxonomies/{type}', [TaxonomyController::class, 'index'])->name('admin.taxonomies.show');
        Route::get('taxonomies', [TaxonomyController::class, 'index'])->name('admin.taxonomies');
            // Route::get('categories', [DashboardController::class, 'index'])->name('admin.taxonomies.categories');

        // });
    } );
});

// 

// Route::post('login', [''])