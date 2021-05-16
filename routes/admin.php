<?php

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

/*Route::get('/', ['as' => 'raiz', 'uses' => 'Admin\HomeController@raiz']);*/

Route::get('/home', ['as' => 'home', 'uses' => 'Admin\HomeController@raiz']);
Route::get('users/cadastrar', ['as' => 'encarregado', 'uses' => 'Site\UserController@create']);
Route::post('users/salvar', ['as' => 'encarregado.salvar', 'uses' => 'Site\UserController@salvar']);
// Route::get('admin/users/cadastrar', ['as' => 'admin.users.cadastrar', 'uses' => 'Admin\UserController@create']);


Route::middleware('auth:sanctum')->group(function () {
    //User-Start
    Route::get('admin/users/cadastrar', ['as' => 'admin.users.encarregado', 'uses' => 'Site\UserController@create']);
    Route::get('admin/users/cadastrar', ['as' => 'admin.users.cadastrar', 'uses' => 'Admin\UserController@create']);
    Route::get('admin/users/listar', ['as' => 'admin.users', 'uses' => 'Admin\UserController@index']);
    Route::get('admin/users/listar/imprimir', ['as' => 'admin.users.listar.imprimir', 'uses' => 'Admin\UserController@imprimir_lista']);
    Route::post('admin/users/salvar', ['as' => 'admin.users.salvar', 'uses' => 'Admin\UserController@salvar']);
    Route::get('admin/users/excluir/{id}', ['as' => 'admin.users.excluir', 'uses' => 'Admin\UserController@excluir']);
    Route::put('admin/users/atualizar/{id}', ['as' => 'admin.users.atualizar', 'uses' => 'Admin\UserController@atualizar']);
    Route::get('admin/users/ver/{id}', ['as' => 'users', 'uses' => 'Admin\UserController@ver']);
    Route::get('admin/users/editar/{id}', ['as' => 'admin.users.editar', 'uses' => 'Admin\UserController@editar']);
    //User-End

    //Garabrito
    Route::group(['prefix' => 'gabarito/'], function () {
        Route::get('', ['as' => 'gabarito', 'uses' => 'Admin\GabaritoController@show']);
        Route::get('/cadastrar',['as' => 'gabarito.criar' , 'uses'=>'Admin\GabaritoController@criar']);
        Route::post('/store',['as'=>'gabarito.store','uses'=>'Admin\GabaritoController@store']);
    });

    //Início Escola
    Route::group(['prefix' => 'escolas/'], function () {
        Route::get('', ['as' => 'escolas', 'uses' => 'Admin\EscolaController@listar']);
        Route::get('criar', ['as' => 'escolas.criar', 'uses' => 'Admin\EscolaController@criar']);
        Route::post('{id_user}/cadastrar', ['as' => 'escolas.cadastrar', 'uses' => 'Admin\EscolaController@cadastrar']);
        Route::get('{id}/eliminar', ['as' => 'escolas.eliminar', 'uses' => 'Admin\EscolaController@eliminar']);
        Route::get('{id}/editar', ['as' => 'escolas.editar', 'uses' => 'Admin\EscolaController@editar']);
        Route::put('{id}/{id_user}/actualizar', ['as' => 'escolas.actualizar', 'uses' => 'Admin\EscolaController@actualizar']);
    });
    //Fim escola


    Route::get('/users/escrever', ['as' => 'user.escrever',  'uses' => 'Admin\UserController@escrever']);
    Route::post('{id_user}/users/escreverFilho', ['as' => 'users.escreverFilho', 'uses' => 'Admin\UserController@escreverFilho']);
    Route::get('admin/users/ver/{id}', ['as' => 'users', 'uses' => 'Admin\UserController@ver']);
    Route::get('{id}/filhos/', ['as' => 'user.filhos', 'uses' => 'Admin\UserController@filhos']);

    Route::group(['prefix' => 'classes'], function () {
        Route::get('', ['as' => 'classes', 'uses' => 'Admin\ClasseController@listar']);
        Route::get('criar', ['as' => 'classes.criar', 'uses' => 'Admin\ClasseController@criar']);
        Route::post('cadastrar', ['as' => 'classes.cadastrar', 'uses' => 'Admin\ClasseController@cadastrar']);
        Route::get('{id}/eliminar', ['as' => 'classes.eliminar', 'uses' => 'Admin\ClasseController@eliminar']);
        Route::get('{id}/editar', ['as' => 'classes.editar', 'uses' => 'Admin\ClasseController@editar']);
        Route::put('{id}/actualizar', ['as' => 'classes.actualizar', 'uses' => 'Admin\ClasseController@actualizar']);
    });


    Route::group(['prefix' => 'Relatórios','namespace'=>'Admin\relatorios'], function () {
        Route::post('ListaAlunosPorClasse', ['as' => 'listar_alunos_classe', 'uses' => 'RelatorioAlunoController@listarAlunoClasse']);
        Route::get('ImpreençãoAlunosPorClasse/{it_id_ano}/{it_id_escola}/{texto_ano}/{texto_escola}', ['as' => 'imprimir_alunos_classe', 'uses' => 'RelatorioAlunoController@imprimirAlunoClasse']);
        Route::get('VerAlunoPorClasse', ['as' => 'ver_quantidade_alunos_classe', 'uses' => 'RelatorioAlunoController@verAlunosClasse']);

        Route::post('ListaTarefasSumbmetidas', ['as' => 'listar_tarefas_submetidas', 'uses' => 'TarefasSubmetidasController@listarTarefasSubmetidas']);
        Route::get('ImpreençãoTarefasSumbmetidas/{it_id_ano}/{it_id_classeDisciplina}/{texto_ano}', ['as' => 'imprimir_tarefas_submetidas', 'uses' => 'TarefasSubmetidasController@imprimirTarefasSubmetidas']);
        Route::get('TarefasSumbmetidas', ['as' => 'ver_quantidade_tarefas_submetidas', 'uses' => 'TarefasSubmetidasController@quantidadeTarefasSubmetidas']);
    });


    Route::group(['prefix' => 'classes'], function () {
        Route::get('', ['as' => 'classes', 'uses' => 'Admin\ClasseController@listar']);
        Route::get('criar', ['as' => 'classes.criar', 'uses' => 'Admin\ClasseController@criar']);
        Route::post('cadastrar', ['as' => 'classes.cadastrar', 'uses' => 'Admin\ClasseController@cadastrar']);
        Route::get('{id}/eliminar', ['as' => 'classes.eliminar', 'uses' => 'Admin\ClasseController@eliminar']);
        Route::get('{id}/editar', ['as' => 'classes.editar', 'uses' => 'Admin\ClasseController@editar']);
        Route::put('{id}/actualizar', ['as' => 'classes.actualizar', 'uses' => 'Admin\ClasseController@actualizar']);
    });


    Route::group(['prefix' => 'tarefas'], function () {
        Route::get('', ['as' => 'tarefas', 'uses' => 'Admin\TarefaController@listar']);
        Route::post('pesquisar', ['as' => 'tarefas.pesquisar', 'uses' => 'Admin\TarefaController@pesquisar']);
        Route::get('criar', ['as' => 'tarefas.criar', 'uses' => 'Admin\TarefaController@criar']);
        Route::post('cadastrar', ['as' => 'tarefas.cadastrar', 'uses' => 'Admin\TarefaController@cadastrar']);
        Route::get('{id}/eliminar', ['as' => 'tarefas.eliminar', 'uses' => 'Admin\TarefaController@eliminar']);
        Route::get('{id}/editar', ['as' => 'tarefas.editar', 'uses' => 'Admin\TarefaController@editar']);
        Route::put('{id}/actualizar', ['as' => 'tarefas.actualizar', 'uses' => 'Admin\TarefaController@actualizar']);
        Route::get('{id}/respostas', ['as' => 'tarefas.respostas', 'uses' => 'Admin\TarefaController@respostas']);
    });


    Route::group(['prefix' => 'alunos'], function () {
        Route::get('{id_classe_disciplina}/minhaTarefa', ['as' => 'alunos.minhaTarefa', 'uses' => 'Admin\TarefaController@minhaTarefa']);
        Route::get('criar', ['as' => 'tarefas.criar', 'uses' => 'Admin\TarefaController@criar']);
        Route::post('cadastrar', ['as' => 'tarefas.cadastrar', 'uses' => 'Admin\TarefaController@cadastrar']);
        Route::get('{id}/eliminar', ['as' => 'tarefas.eliminar', 'uses' => 'Admin\TarefaController@eliminar']);
        Route::get('{id}/editar', ['as' => 'tarefas.editar', 'uses' => 'Admin\TarefaController@editar']);
        Route::put('{id}/actualizar', ['as' => 'tarefas.actualizar', 'uses' => 'Admin\TarefaController@actualizar']);
        Route::get('{id}/respostas', ['as' => 'tarefas.respostas', 'uses' => 'Admin\TarefaController@respostas']);
    });


    Route::group(['prefix' => 'classesDisciplinas'], function () {
        Route::get('', ['as' => 'classesDisciplinas', 'uses' => 'Admin\ClasseDisciplinaController@listar']);
        Route::get('{id}/criar', ['as' => 'classesDisciplinas.criar', 'uses' => 'Admin\ClasseDisciplinaController@criar']);
        Route::post('cadastrar', ['as' => 'classesDisciplinas.cadastrar', 'uses' => 'Admin\ClasseDisciplinaController@cadastrar']);
        Route::get('{id}/eliminar', ['as' => 'classesDisciplinas.eliminar', 'uses' => 'Admin\ClasseDisciplinaController@eliminar']);
        Route::get('{id}/editar', ['as' => 'classesDisciplinas.editar', 'uses' => 'Admin\ClasseDisciplinaController@editar']);
        Route::get('{id}/classeDisciplinas', ['as' => 'classesDisciplinas.classeDisciplinas', 'uses' => 'Admin\ClasseDisciplinaController@classeDisciplinas']);
        Route::put('{id}/actualizar', ['as' => 'classesDisciplinas.actualizar', 'uses' => 'Admin\ClasseDisciplinaController@actualizar']);
    });
    Route::group(['prefix' => 'disciplinas'], function () {
        Route::get('', ['as' => 'disciplinas', 'uses' => 'Admin\DisciplinaController@listar']);
        Route::get('criar', ['as' => 'disciplinas.criar', 'uses' => 'Admin\DisciplinaController@criar']);
        Route::post('cadastrar', ['as' => 'disciplinas.cadastrar', 'uses' => 'Admin\DisciplinaController@cadastrar']);
        Route::get('{id}/eliminar', ['as' => 'disciplinas.eliminar', 'uses' => 'Admin\DisciplinaController@eliminar']);
        Route::get('{id}/editar', ['as' => 'disciplinas.editar', 'uses' => 'Admin\DisciplinaController@editar']);
        Route::put('{id}/actualizar', ['as' => 'disciplinas.actualizar', 'uses' => 'Admin\DisciplinaController@actualizar']);
    });

    // Start Ano Lectivo
    Route::get('/admin/anolectivo', ['as' => 'admin/anolectivo', 'uses' => 'Admin\AnoLectivoController@index']);
    Route::get('/admin/anolectivo/cadastrar', ['as' => 'admin/anolectivo/cadastrar', 'uses' => 'Admin\AnoLectivoController@create']);
    Route::post('/admin/anolectivo/cadastrar', ['as' => 'admin/anolectivo/cadastrar', 'uses' => 'Admin\AnoLectivoController@store']);
    Route::get('/admin/anolectivo/visualizar/{id}', ['as' => 'admin/anolectivo/visualizar', 'uses' => 'Admin\AnoLectivoController@show']);
    Route::get('/admin/anolectivo/aditar/{id}', ['as' => 'admin/anolectivo/editar', 'uses' => 'Admin\AnoLectivoController@edit']);
    Route::put('/admin/anolectivo/editar/{id}', ['as' => 'admin/anolectivo/atualizar', 'uses' => 'Admin\AnoLectivoController@update']);
    Route::get('/admin/anolectivo/eliminar/{id}', ['as' => 'admin/anolectivo/eliminar', 'uses' => 'Admin\AnoLectivoController@destroy']);
    // End Ano Lectivo

    //Matrícula start
    route::get('matricula', ['as' => 'matricula.index', 'uses' => 'Admin\MatriculaController@index']);
    route::get('{id_user}/matricula/criar', ['as' => 'matricula.create', 'uses' => 'Admin\MatriculaController@create']);
    route::post('/matricula/cadastrar', ['as' => 'matricula.store', 'uses' => 'Admin\MatriculaController@store']);
    route::post('/matricula/listar', ['as' => 'matricula.listar', 'uses' => 'Admin\MatriculaController@listar']);
    route::get('/matricula/editar/{id}', ['as' => 'matricula.edit', 'uses' => 'Admin\MatriculaController@Edit']);
    route::put('/matricula/actualizar/{id}', ['as' => 'matricula.update', 'uses' => 'Admin\MatriculaController@update']);
    route::get('/matricula/eliminar/{id}', ['as' => 'matricula.delete', 'uses' => 'Admin\MatriculaController@delete']);
    //Matrícula end


    //Tarefas Submetidas start
    route::get('/Tarefas_Submetidas/{id_user}', ['as' => 'Tarefas_Submetidas.index', 'uses' => 'Admin\TarefasSubmetidasController@index']);
    route::get('{id}/Tarefas_Submetidas/submeter', ['as' => 'Tarefas_Submetidas.submeter', 'uses' => 'Admin\TarefasSubmetidasController@submeter']);
    route::post('{id}/{id_user}/Tarefas_Submetidas/cadastrar', ['as' => 'Tarefas_Submetidas.cadastrar', 'uses' => 'Admin\TarefasSubmetidasController@cadastrar']);
    route::get('/Tarefas_Submetidas/editar/{id}', ['as' => 'Tarefas_Submetidas.edit', 'uses' => 'Admin\TarefasSubmetidasController@Edit']);
    route::put('/Tarefas_Submetidas/actualizar/{id}', ['as' => 'Tarefas_Submetidas.update', 'uses' => 'Admin\TarefasSubmetidasController@update']);
    route::get('/Tarefas_Submetidas/eliminar/{id}', ['as' => 'Tarefas_Submetidas.delete', 'uses' => 'Admin\TarefasSubmetidasController@delete']);
    //Tarefas Submetidas end
    //logs
    Route::get('admin/logs/pesquisar', ['as' => 'admin.logs.pesquisar.index', 'uses' => 'Admin\LogUserController@pesquisar']);
    Route::post('admin/logs/recebelogs', ['as' => 'admin.logs.recebelogs', 'uses' => 'Admin\LogUserController@recebelogs']);
    Route::get('admin/logs/visualizar/index/{anoLectivo}/{utilizador}', ['as' => 'admin.logs.listar', 'uses' => 'Admin\LogUserController@index']);
    //

    //materia
    Route::get('/materia', ['a+7,s' => 'materia', 'uses' => 'Admin\MateriaController@create']);
    Route::post('/materia/cadastrar', ['as' => 'materia.cadastrar', 'uses' => 'Admin\MateriaController@store'])->name('cadastrar_Materia');
    Route::get('/materia/ver', ['as' => 'materia.ver', 'uses' => 'Admin\MateriaController@show']);
    Route::get('/materia/editar/{id}', ['as' => 'materia.editar', 'uses' => 'Admin\MateriaController@edit']);
    Route::put('/materia/editar/{id}', ['as' => 'materia.actualizar', 'uses' => 'Admin\MateriaController@update']);
    Route::get('/materia/excluir/{id}', ['as' => 'materia.excluir', 'uses' => 'Admin\MateriaController@delete']);
    Route::get('/materia/addvideo/{id}', ['as' => 'materia.addvideo', 'uses' => 'Admin\MateriaController@addvideo']);
    Route::get('/materia/addPDF/{id}', ['as' => 'materia.addPDF', 'uses' => 'Admin\MateriaController@addPDF']);
    Route::get('/materia/supervisionar/{id}', ['as' => 'materia.supervisionar', 'uses' => 'Admin\MateriaController@supervisionar']);
    Route::post('/materia/uploadvideo/{id}', ['as' => 'materia.uploadvideo', 'uses' => 'Admin\MateriaController@uploadvideo']);
    Route::post('/materia/uploadPDF/{id}', ['as' => 'materia.uploadPDF', 'uses' => 'Admin\MateriaController@uploadPDF']);
    Route::get('/materia/minhasMateria/{id}', ['as' => 'materia.minhasMateria', 'uses' => 'Admin\MateriaController@minhasMateria']);

    Route::get('/materia/buscasDiscicplina/', ['as' => 'materia.buscasDiscicplina', 'uses' => 'Admin\MateriaController@buscasDiscicplina']);
    Route::post('/materia/listarMateria/', ['as' => 'materia.listarMateria', 'uses' => 'Admin\MateriaController@listarMateria']);

    Route::get('/materia/editarVideo/{id_materia}/{id_video}', ['as' => 'materia.editarVideo', 'uses' => 'Admin\MateriaController@editarVideo']);
    Route::put('/materia/uploadvideoEditar/{id}', ['as' => 'materia.uploadvideoEditar', 'uses' => 'Admin\MateriaController@uploadvideoEditar']);
    Route::get('/materia/excluirVideo/{id}', ['as' => 'materia.excluirVideo', 'uses' => 'Admin\MateriaController@excluirVideo']);
    Route::put('/materia/uploadPDFEditar/{id}', ['as' => 'materia.uploadPDFEditar', 'uses' => 'Admin\MateriaController@uploadPDFEditar']);
    Route::get('/materia/editarPDF/{id_materia}/{id_PDF}', ['as' => 'materia.editarPDF', 'uses' => 'Admin\MateriaController@editarPDF']);
    Route::get('/materia/excluirPDF/{id}', ['as' => 'materia.excluirPDF', 'uses' => 'Admin\MateriaController@excluirPDF']);
    Route::get('/materia/aluno/ver/{id}', ['as' => 'materia.aluno', 'uses' => 'Admin\MateriaController@materiaAluno']);
    //end Materia


    Route::get('/video', ['as' => 'video', 'uses' => 'Admin\VideoController@create']);
    Route::post('/video/cadastrar', ['as' => 'video', 'uses' => 'Admin\VideoController@uploadVideo']);

    //Tarefas Submetidas start
    route::get('/horas', ['as' => 'horas.index', 'uses' => 'Admin\HorasController@index']);
    route::get('/horas/criar', ['as' => 'horas.create', 'uses' => 'Admin\HorasController@create']);
    route::post('/horas/cadastrar', ['as' => 'horas.store', 'uses' => 'Admin\HorasController@store']);
    route::get('/horas/editar/{id}', ['as' => 'horas.edit', 'uses' => 'Admin\HorasController@Edit']);
    route::put('/horas/actualizar/{id}', ['as' => 'horas.update', 'uses' => 'Admin\HorasController@update']);
    route::get('/horas/eliminar/{id}', ['as' => 'horas.delete', 'uses' => 'Admin\HorasController@delete']);
    //Tarefas Submetidas end

    //dias_semanas start
    route::get('/dias_semanas', ['as' => 'dias_semanas.index', 'uses' => 'Admin\DiasSemanasController@index']);
    route::get('/dias_semanas/criar', ['as' => 'dias_semanas.create', 'uses' => 'Admin\DiasSemanasController@create']);
    route::post('/dias_semanas/cadastrar', ['as' => 'dias_semanas.store', 'uses' => 'Admin\DiasSemanasController@store']);
    route::get('/dias_semanas/editar/{id}', ['as' => 'dias_semanas.edit', 'uses' => 'Admin\DiasSemanasController@Edit']);
    route::put('/dias_semanas/actualizar/{id}', ['as' => 'dias_semanas.update', 'uses' => 'Admin\DiasSemanasController@update']);
    route::get('/dias_semanas/eliminar/{id}', ['as' => 'dias_semanas.delete', 'uses' => 'Admin\DiasSemanasController@delete']);
    //dias_semanas end

    //horarios start
    route::get('/horarios', ['as' => 'horarios.index', 'uses' => 'Admin\HorarioController@index']);
    route::get('/horarios/criar', ['as' => 'horarios.create', 'uses' => 'Admin\HorarioController@create']);
    route::post('/horarios/cadastrar', ['as' => 'horarios.store', 'uses' => 'Admin\HorarioController@store']);
    route::get('/horarios/editar/{id}', ['as' => 'horarios.edit', 'uses' => 'Admin\HorarioController@Edit']);
    route::put('/horarios/actualizar/{id}', ['as' => 'horarios.update', 'uses' => 'Admin\HorarioController@update']);
    route::get('/horarios/eliminar/{id}', ['as' => 'horarios.delete', 'uses' => 'Admin\HorarioController@delete']);
    //horarios end

    Route::group(['prefix' => 'professores'], function () {
        Route::get('', ['as' => 'professores', 'uses' => 'Admin\FuncionarioEscolaController@listar']);
        Route::get('{id}/vincularEscola', ['as' => 'professores.vincularEscola', 'uses' => 'Admin\FuncionarioEscolaController@vincularEscola']);
        Route::post('{id}/vincular', ['as' => 'professores.vincular', 'uses' => 'Admin\FuncionarioEscolaController@vincular']);
        Route::get('professorEscola', ['as' => 'professores.professorEscola', 'uses' => 'Admin\FuncionarioEscolaController@professorEscola']);
        Route::get('{id}/excluir', ['as' => 'professores.excluir', 'uses' => 'Admin\FuncionarioEscolaController@excluir']);
        Route::get('{id}/editar', ['as' => 'professores.editar', 'uses' => 'Admin\FuncionarioEscolaController@editar']);
        Route::put('{id}/atualizar', ['as' => 'professor.atualizar', 'uses' => 'Admin\FuncionarioEscolaController@atualizar']);
    });

    Route::post('/materia/uploadvideo/{id}', ['as' => 'materia.uploadvideo', 'uses' => 'Admin\MateriaController@uploadvideo']);
    Route::post('/materia/uploadPDF/{id}', ['as' => 'materia.uploadPDF', 'uses' => 'Admin\MateriaController@uploadPDF']);
    //end Materia

    Route::get('/video', ['as' => 'video', 'uses' => 'Admin\VideoController@create']);
    Route::post('/video/cadastrar', ['as' => 'video', 'uses' => 'Admin\VideoController@uploadVideo']);

    //Tarefas Submetidas start
    route::get('/horas', ['as' => 'horas.index', 'uses' => 'Admin\HorasController@index']);
    route::get('/horas/criar', ['as' => 'horas.create', 'uses' => 'Admin\HorasController@create']);
    route::post('/horas/cadastrar', ['as' => 'horas.store', 'uses' => 'Admin\HorasController@store']);
    route::get('/horas/editar/{id}', ['as' => 'horas.edit', 'uses' => 'Admin\HorasController@Edit']);
    route::put('/horas/actualizar/{id}', ['as' => 'horas.update', 'uses' => 'Admin\HorasController@update']);
    route::get('/horas/eliminar/{id}', ['as' => 'horas.delete', 'uses' => 'Admin\HorasController@delete']);
    //Tarefas Submetidas end

    //dias_semanas start
    route::get('/dias_semanas', ['as' => 'dias_semanas.index', 'uses' => 'Admin\DiasSemanasController@index']);
    route::get('/dias_semanas/criar', ['as' => 'dias_semanas.create', 'uses' => 'Admin\DiasSemanasController@create']);
    route::post('/dias_semanas/cadastrar', ['as' => 'dias_semanas.store', 'uses' => 'Admin\DiasSemanasController@store']);
    route::get('/dias_semanas/editar/{id}', ['as' => 'dias_semanas.edit', 'uses' => 'Admin\DiasSemanasController@Edit']);
    route::put('/dias_semanas/actualizar/{id}', ['as' => 'dias_semanas.update', 'uses' => 'Admin\DiasSemanasController@update']);
    route::get('/dias_semanas/eliminar/{id}', ['as' => 'dias_semanas.delete', 'uses' => 'Admin\DiasSemanasController@delete']);
    //dias_semanas end

    //horarios start
    route::get('/horarios', ['as' => 'horarios.index', 'uses' => 'Admin\HorarioController@index']);
    route::get('/horarios/criar', ['as' => 'horarios.create', 'uses' => 'Admin\HorarioController@create']);
    route::post('/horarios/cadastrar', ['as' => 'horarios.store', 'uses' => 'Admin\HorarioController@store']);
    route::get('/horarios/editar/{id}', ['as' => 'horarios.edit', 'uses' => 'Admin\HorarioController@Edit']);
    route::put('/horarios/actualizar/{id}', ['as' => 'horarios.update', 'uses' => 'Admin\HorarioController@update']);
    route::get('/horarios/eliminar/{id}', ['as' => 'horarios.delete', 'uses' => 'Admin\HorarioController@delete']);
    //horarios end

    //aluno por municipio

    Route::get('admin/alunos/pesquisar', ['as' => 'admin.alunos.pesquisar.index', 'uses' => 'Admin\relatorios\Aluno_municipioController@pesquisar']);
    Route::post('admin/alunos/receberecebeMunicipio', ['as' => 'admin.alunos.receberecebeMunicipio', 'uses' => 'Admin\relatorios\Aluno_municipioController@recebeMunicipio']);
    Route::get('admin/alunos/visualizar/index/{anoLectivo}/{municipio}', ['as' => 'admin.visualizar', 'uses' => 'Admin\relatorios\Aluno_municipioController@visualizar']);
    Route::get('admin/alunos/pdf/index/{anoLectivo}/{municipio}', ['as' => 'admin.visualizar.pdf', 'uses' => 'Admin\relatorios\Aluno_municipioController@pdfAlunos']);



    Route::group(['prefix' => 'pais'], function () {
        Route::get('', ['as' => 'pais', 'uses' => 'Admin\PaisController@listar']);
        Route::get('{id}/excluir', ['as' => 'pais.excluir', 'uses' => 'Admin\PaisController@excluir']);
    });
});
