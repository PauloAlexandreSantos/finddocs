
    <div class="form-group col-sm-3">
        <label for="it_id_utilizador">{{ __('Utilizador') }}</label>
        <select class="form-control" name="it_id_utilizador" id="it_id_utilizador" >
         
          
        @isset(  $user)
        <option value="{{$user->id}}" selected  >{{ $user->vc_nomeUtilizador}}</option>
        @endisset   

        @foreach ($users as $user)
    <option value="{{$user->id}}" >{{$user->vc_primemiroNome}}</option>
         @endforeach
    
  
       
        </select>
       
        

    </div>


    <div class="form-group col-sm-3">
        <label for="it_id_escola">{{ __('Escola') }}</label>
        <select class="form-control" name="it_id_escola" id="it_id_escola" >
         
           
        @isset(  $escola)
        <option value="{{ $escola->id}}" selected  >{{ $escola->vc_escola}}</option>
        @endisset   

        @foreach ($escolas as $escola)
    <option value="{{$escola->id}}" >{{$escola->vc_escola}}</option>
         @endforeach
    
  
       
        </select>
       
        

    </div>


    <div class="form-group col-sm-3">
        <label for="classe">Classe</label>
        <select type="text" class="form-control border-secondary "  name="it_id_classe">
        <option value="{{isset($classe)?$classe->id:''}}" selected > {{isset($classe)?$classe->vc_classe.'ª Classe':'Seleciona a classe'}}</option>
        @foreach($classes as $classe)
        <option value="{{ $classe->id}}">{{ $classe->vc_classe  }}ªClasse</option>
        @endforeach
        </select>
       
    </div>



    <div class="form-group col-sm-3">
        <label for="it_id_anolectivo">{{ __('Ano Lectivo') }}</label>
        <select class="form-control" name="it_id_anolectivo" id="it_id_anolectivo" >
         
           
        @isset(  $anoLetivo)
        <option value="{{ $anoLetivo->id}}" selected  >{{ $anoLetivo->ya_inicio}}-{{ $anoLetivo->ya_fim}}</option>
        @endisset   

    @foreach ($anosLectivo as $anoLectivo)
    <option value="{{$anoLectivo->id}}" >{{$anoLectivo->ya_inicio}}-{{$anoLectivo->ya_fim}}</option>
         @endforeach
    
  
       
        </select>
       
        

    </div>
