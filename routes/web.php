<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Candidato;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cadastrar-candidato', function (Request $informacoes) {
    Candidato::create([

        'nome' => $informacoes->nome_candidato,
        'telefone' => $informacoes->telefone_candidato
    ]);
    echo "Candidato Cadastrado com sucesso!!";
});

Route::get('/mostrar-candidato/{id_do_candidato}', function ($id_do_candidato) {
$candidato= Candidato::findOrFail($id_do_candidato);
echo $candidato->nome;
echo "<br />";
echo$candidato->telefone;


});

Route::get('/editar-candidato/{id_do_candidato}', function ($id_do_candidato) {
    $candidato= Candidato::findOrFail($id_do_candidato);
    return view('editar_candidato', ['candidato' => $candidato]);
    
    });

Route::put('/atualizar-candidato/{id_do_candidato}' , function (Request $informacoes,$id_do_candidato) {
    $candidato= Candidato::findOrFail( $id_do_candidato);
    $candidato->nome = $informacoes->nome_candidato;
    $candidato->telefone = $informacoes->telefone_candidato;
    $candidato->save();
    
    echo "Candidato Atualizado com Sucesso!!";
    });

Route::get('/excluir-candidato/{id_do_candidato}', function ($id_do_candidato) {
    $candidato= Candidato::findOrFail( $id_do_candidato);
    $candidato->delete();
    echo "Candidato excluido com Sucesso";
});