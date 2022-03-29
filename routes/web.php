<?php

use App\Http\Controllers\PaysController;
use App\Models\Pays;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
//on peut definir de la sorte une route mais ici imaginons si les routes 
//sont nombreuses on va devoir faire la meme chose sur toutes les routes;
// Route::resource('pays', PaysController::class);
//par contre si nous voulons apliquer des restruction sur des routes nous devons pas opter pour les routes avec resource
// Route::get('pays/test1', [PaysController::class, 'test1'])->name('test1')->middleware('auth'); //Une maniere aussi de proteger les roues
// Route::get('pays/test2', [PaysController::class, 'test2'])->name('test2')->middleware(['auth']); //Si on a aussi beaucoup de auth on peu les mettre dans un tableau comme indiquer dans test2
//on peu le faire ainsi en cas aussi si on a beaucoup de route et mettre toutes nos routes dedans
Route::middleware(['auth'])->group(function () {
    Route::get('pays/test1', [PaysController::class, 'test1']);
    Route::get('pays/test2', [PaysController::class, 'test2']);
});
