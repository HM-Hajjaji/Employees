<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[AuthenticatedSessionController::class,'create']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::controller(EmployeeController::class)->prefix('employee')->group(function (){
    Route::get('/employees',"index")->name("employee.all");
    Route::get('/create',"create")->name("employee.create");
    Route::post('/store',"store")->name("employee.store");
    Route::get('/show/{id}',"show")->name("employee.show");
    Route::get('/edit/{slug}',"edit")->name("employee.edit");
    Route::put('/update/{slug}',"update")->name("employee.update");
    Route::delete('/destroy/{slug}',"destroy")->name("employee.destroy");
    Route::get('/trashed',"trashed")->name("employee.trashed");
    Route::delete('/trashed/force/{slug}',"force_trashed")->name("employee.force_trashed");
    Route::get('/trashed/restore/{slug}',"restore")->name("employee.restore");
});
