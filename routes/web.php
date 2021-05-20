<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Prestiti;
use App\Http\Livewire\AdminDashboard;
use App\Models\Libro;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');
Route::get('/prestiti', Prestiti::class)->middleware(['auth'])->name('prestiti');
Route::get('/admin', function(){
    return view('admin');
})->middleware(['admin'])->name('admin');
Route::get('/admin/copie/{id}', function($id){
    return view('adminCopie', ['libroId' => $id]);
})->middleware(['admin'])->name('adminCopie');

Route::get('/admin/copie/{id}/prestiti/{copiaId}', function($id, $copiaId){
    return view('adminCopiePrestiti', ['prestiti' => Libro::find($id)->copie->find($copiaId)->prestiti()->orderBy('created_at', 'DESC')->get()]);
})->middleware(['admin'])->name('adminCopiePrestiti');



require __DIR__.'/auth.php';
