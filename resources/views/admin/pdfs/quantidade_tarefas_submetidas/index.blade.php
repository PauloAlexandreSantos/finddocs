



<div class="text-center">
    <p>
    <img src="images/insignia/{{$cabecalho->vc_ensignia}}.jpg" width="100" height="100"><br>
		{{$cabecalho->vc_republica}}<br>
        {{$cabecalho->vc_ministerio}}<br>
        </p>
</div>
        <h3><div class="text-center">RELTÓRIO DA QUANTIDADE DE ALUNOS POR CLASSE</div></h3>
       

        <table id="example" class="display table table-hover table-bordered ">
        <thead class="thead-dark">
            <tr class="text-center">
                <th class="text-center">TAREFA</th>
                <th class="text-center">CLASSE</th>
                <th class="text-center">DISCIPLINA</th>                  
                <th class="text-center">QUANTIDADE</th>          
            </tr>
        </thead>
        <tbody class="bg-white text-center">
        @foreach ($tarefas as $tarefa)
                    <tr class="text-center">
                        <th class="text-center">{{$tarefa->vc_tarefa}}</th>
                        <th class="text-center">{{$tarefa->vc_classe}}</th>
                        <th class="text-center">{{$tarefa->vc_disciplina}}</th>
                        <th class="text-center">{{$tarefa->quantidade}}</th>
                                             
                @endforeach

        </tbody>
    </table>
    
    <h5><div class="text-left">ANO LECTIVO: {{$it_id_anoLectivoLista}}</div></h5>
