<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
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

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function () {
    return 'Login';
});

Route::get('/rota1', function () {
    echo 'rota1';
})->name('site.rota1');

Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

// Route::redirect('/rota2', '/rota1');


Route::prefix('/app')->group(function () {

    Route::get('/clientes', function () {
        return 'Clientes';
    });

    Route::get('/fornecedores', function () {
        return 'Fornecedores';
    });

    Route::get('/produtos', function () {
        return 'Produtos';
    });
});



Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        string $nome = '100',
        int $categoria_id = 1 // 1 - 'Informação'

    ) {
        echo "Estamos aqui: $nome - $categoria_id ";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');

/** Parametros opcionais */
// Route::get(
//     '/contato/{nome}/{categoria?}/{assunto?}/{mensagem?}',
//     function (
//         string $nome,
//         string $categoria = 'sem categoria',
//         string $assunto = 'sem assunto',
//         $mensagem = 'mensagem não informada'
//     ) {
//         echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem ";
//     }
// );

/**
 * Rota de contigencia
 */
Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a> para ir para o link';
});
