
    <div class="form-group col-sm-3">
        <label for="it_id_anoLectivo">{{ __('Ano Lectivo') }}</label>
        <select class="form-control" name="it_id_anoLectivo" id="it_id_anoLectivo" >
         
           
        
        <option value="0" selected  >todos os anos</option>
     

        @foreach ($anoLectivos as $anoLectivo)
    <option value="{{$anoLectivo->id}}">{{$anoLectivo->ya_inicio}}-{{$anoLectivo->ya_fim}}</option>
         @endforeach
    
         
        </select>

    </div>


    <div class="form-group col-sm-3">
        <label for="it_id_classesDiciplina">{{ __('Classe|Disciplina') }}</label>
        <select class="form-control" name="it_id_classesDiciplina" id="it_id_classesDiciplina" >
        <option value="0" selected  >todas as Classe|Disciplina </option>
        

        @foreach ($classesDisciplinas as $classesDisciplina)
    <option value="{{$classesDisciplina->id}}" >{{$classesDisciplina->vc_classe}}|{{$classesDisciplina->vc_disciplina}}</option>
         @endforeach
    
  
       
        </select>
        
    </div>
