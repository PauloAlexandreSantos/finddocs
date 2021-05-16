

<div class="col-md-3">

    <div class="row ">
      
        <div class="col-md-6">
            <div class="form-group ">
                <label for="inicio">Hora de início</label>
                <input type="time" class="form-control border-secondary " placeholder="Hora de início" name="vc_hora_inicio"
                value="{{ isset($horario['0']->vc_hora_inicio) ? $horario['0']->vc_hora_inicio : '' }}">
               
               
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group ">
                <label for="fim">Hora de fim</label>
                <input type="time" class="form-control border-secondary " placeholder="Hora de fim" name="vc_hora_fim"
                value="{{ isset($horario['0']->vc_hora_fim) ? $horario['0']->vc_hora_fim : '' }}">
               
               
            </div>
        </div>
    </div>
</div>


<div class="col-md-3">
    <div class="form-group ">
        <label for="dia">seleciona O dia de Semana</label>
        <select type="text" class="form-control border-secondary "  name="it_id_dias">
        
            @if (isset($horario['0']))
            <option value="{{$horario['0']->id_dias_semana}}" selected disabled>{{$horario['0']->vc_dia}} </option>
            @else
           <option value="" selected disabled>seleciona O dia de Semana</option>
              @endif
       
      
        @foreach($dias as $dia)
        <option value="{{ $dia->id}}">{{ $dia->vc_dia }}</option>
        @endforeach
        </select>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group ">
     
        <label for="id_classe_disciplinas">{{ __('Seleciona a Classe|Disciplina') }}</label>
        <select class="form-control" name="it_id_classedisciplina" id="id_classe_disciplinas" required>

            @if (isset($horario['0']))
            <option value="{{$horario['0']->id_c_d}}" selected disabled>{{$horario['0']->vc_classe}}ª Classe|{{ $horario['0']->vc_disciplina }} </option>
            @else
           <option value="" selected disabled>Seleciona a Classe|Disciplina</option>
           @endif
        
            @foreach ($classesDisciplinas as $classeDisciplina)

            <option value="{{$classeDisciplina->id_c_d}}">{{$classeDisciplina->vc_classe}}ª Classe|{{ $classeDisciplina->vc_disciplina }} </option>

       
           
        @endforeach
 
             
        
        </select>

    </div>
</div>


<div class="col-md-3">
    <div class="form-group ">
        <label for="it_id_anoslectivos">{{ __('Ano Lectivo') }}</label>
        <select class="form-control" name="it_id_anoslectivos" id="it_id_anoslectivos" >
           @isset($horario['0'])
           <option value="{{$horario['0']->it_id_anoslectivos}}" selected>{{$horario['0']->ya_inicio}}-{{$horario['0']->ya_fim}}</option>
           @endisset
   
    @if (isset($anosLectivo))
    @foreach ($anosLectivo as $anoLectivo)
    <option value="{{$anoLectivo->id}}" >{{$anoLectivo->ya_inicio}}-{{$anoLectivo->ya_fim}}</option>
         @endforeach
         @else

         @if (isset($anoLectivo))
         <option value="{{$anoLectivo->id}}" >{{$anoLectivo->ya_inicio}}-{{$anoLectivo->ya_fim}}</option>
    @endif
    @endif
       
        </select>
       
        

    </div>
</div>