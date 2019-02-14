<?php

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
    return "<h1>Laravel</h1>";
});
Route::get('/ola', function () {
    return "<h1>Seja Bem vindo</h1>";
});
Route::get('/ola/sejabemvindo', function () {
    return view('Welcome');
});
Route::get('/nome/{nome}/{sobrenome}', function($nome,$sn){
    return "<h1>ola, $nome $sn!</h1>";
});
Route::get('/repetir/{nome}/{n}', function($nome,$n){
    for ($i=0;$i<$n;$i++){
        echo "<h1>ola, $nome!</h1>";
    }
});
Route::get('/seunomecomregra/{nome}/{n}', function($nome,$n){
    for ($i=0;$i<$n;$i++){
        echo "<h1>Ola, $nome!($i)</h1>";
    }
})->where('n','[0-9]+')->where('nome','[A-Za-z]+');


Route::prefix('app')->group(function(){
    Route::get("/",function(){
       return"Pagina principal do APP";
    });
    Route::get("profile",function(){
        return"Pagina profile";
    });
    Route::get("about",function(){
        return"Meu about";
    });
});

    Route::redirect('/aqui','ola',301);

    Route::view('/hello','hello');



    Route::view('/viewnome','hellonome',
        ['nome'=>'rogerio','sobrenome'=>'pires']);

    Route::get('/hellonome/{nome}/{sobrenome}',function($nome,$sn){
        return view('hellonome',
        ['nome'=>$nome,
        'sobrenome'=>$sn]);
});