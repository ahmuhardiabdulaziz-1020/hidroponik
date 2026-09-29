<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MonitoringTanamanController;
use App\Http\Controllers\MonitoringHarianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SayurController;
use App\Http\Controllers\VarietasController;
use App\Http\Controllers\TalangController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\JenisPelangganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BatchTanamController;
use App\Http\Controllers\RiwayatTanamController;
use App\Http\Controllers\Admin\UserManagementController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    
    $role = auth()->user()->userRole->kode_role;

    return match ($role) {

        'admin' => redirect('/admin/dashboard'),

        'operator' => redirect('/produksi/dashboard'),

        'owner' => redirect('/owner/dashboard'),

        'kasir' => redirect('/kasir/dashboard'),

        default => abort(403),

    };

})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('sayur', SayurController::class)
    ->middleware('auth');
Route::resource('varietas', VarietasController::class)
    ->parameters([
        'varietas' => 'varietas'
    ])
    ->middleware('auth');
Route::resource('talang', TalangController::class)
    ->middleware('auth');
Route::resource('bahan', BahanController::class)
    ->middleware('auth');
Route::resource('jenis-pelanggan', JenisPelangganController::class)
    ->middleware('auth');
Route::resource('pelanggan', PelangganController::class)
    ->middleware('auth');
Route::resource('batch-tanam', BatchTanamController::class)
    ->except(['show'])
    ->middleware('auth');
Route::resource(
    'riwayat-tanam',
    RiwayatTanamController::class
)
->except(['show'])
->middleware('auth');

Route::get(
    '/riwayat-tanam/batch/{batch}',
    [
        RiwayatTanamController::class,
        'show'
    ]
)
->name('riwayat-tanam.show')
->middleware('auth');


/*
|--------------------------------------------------------------------------
| Role Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })
        ->name('dashboard');

    });

Route::middleware([
    'auth',
    'verified',
    'role:admin'
])
->prefix('admin')
->name('admin.')
->group(function () {

    Route::resource(
        'users',
        UserManagementController::class
    );
    Route::patch(
        'users/{user}/activate',
        [UserManagementController::class, 'activate']
    )
    ->name('users.activate');

});

Route::middleware(['auth', 'verified', 'role:operator'])
->prefix('produksi')
->group(function () {


    Route::get('/dashboard', function () {
        return view('produksi.dashboard');
    })->name('produksi.dashboard');



    /*
    |--------------------------------------------------------------------------
    | Monitoring Tanaman
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/monitoring/tanaman',
        [MonitoringTanamanController::class,'index']
    )->name('monitoring.tanaman.index');
    
    Route::get(
        '/monitoring/tanaman/{talang}',
        [MonitoringTanamanController::class,'show']
    )->name('monitoring.tanaman.show');

    Route::get(
        '/monitoring/tanaman/{talang}/create',
        [MonitoringHarianController::class,'create']
    )->name('monitoring.harian.create');

    Route::post(
        '/monitoring/tanaman',
        [MonitoringHarianController::class,'store']
    )->name('monitoring.harian.store');

    });



/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});



/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
