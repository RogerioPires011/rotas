<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return "<h1>Laravel</h1>";
});
Route::get('/ola', function () {
    return "<h1>Seja Bem vindo</h1>";
});
Route::get('/ola/sejabemvindo', function () {
    return view('Welcome');
});
Route::get('/nome/{nome}/{sobrenome}', function ($nome, $sn) {
    return "<h1>ola, $nome $sn!</h1>";
});
Route::get('/repetir/{nome}/{n}', function ($nome, $n) {
    for ($i = 0; $i < $n; $i++) {
        echo "<h1>ola, $nome!</h1>";
    }
});
Route::get('/seunomecomregra/{nome}/{n}', function ($nome, $n) {
    for ($i = 0; $i < $n; $i++) {
        echo "<h1>Ola, $nome!($i)</h1>";
    }
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');


Route::prefix('app')->group(function () {
    Route::get("/", function () {
        return "Pagina principal do APP";
    });
    Route::get("profile", function () {
        return "Pagina profile";
    });
    Route::get("about", function () {
        return "Meu about";
    });
});

Route::redirect('/aqui', 'ola', 301);

Route::view('/hello', 'hello');


Route::view('/viewnome', 'hellonome',
    ['nome' => 'rogerio', 'sobrenome' => 'pires']);

Route::get('/hellonome/{nome}/{sobrenome}', function ($nome, $sn) {
    return view('hellonome',
        ['nome' => $nome,
            'sobrenome' => $sn]);
});

Route::get('/rest/hello', function () {
    return "Hello (GET)";
});
Route::post('/rest/hello', function () {
    return "Hello (POST)";
});
Route::delete('/rest/hello', function () {
    return "Hello (DELETE)";
});
Route::put('/rest/hello', function () {
    return "Hello (PUT)";
});
Route::patch('/rest/hello', function () {
    return "Hello (PATCH)";
});
Route::options('/rest/hello', function () {
    return "Hello (OPTIONS)";
});
Route::post('/rest/ola', function (Request $nam) {
    $nome = $nam->input('nome');
    return "Hello $nome(POST)";
});
Route::get('/produto',function(){
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo"<li>Notebook</li>";
    echo"<li>Impressora</li>";
    echo"<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');

Route::get('/linkprodutos', function(){
    $url= route('meusprodutos');
    echo"<a href=\"".$url."\">Meus produtos</a>";
});
Route::get('/redirecionarproduto',function(){
    return redirect()->route('meusprodutos');
});