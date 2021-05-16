<div class="row">
<div class="col-md-4">
    <div class="form-group ">
        <label for="vc_tarefa">{{ __('Título') }}</label>
        <input value="{{ isset($tarefa->vc_tarefa) ? $tarefa->vc_tarefa : '' }}" id="vc_tarefa"
            type="text" class="form-control @error('vc_tarefa') is-invalid @enderror" name="vc_tarefa"
            placeholder="Nome da tarefa" value="{{ old('vc_tarefa') }}" required autocomplete="vc_tarefa" autofocus>

        @error('vc_tarefa')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="col-md-4">
    <div class="form-group ">
        <label for="id_classe_disciplinas">{{ __('Seleciona a Classe|Disciplina') }}</label>
        <select class="form-control" name="id_classe_disciplinas" id="id_classe_disciplinas" required>

           @if (isset($classeDisciplina['0']))
           <option value="{{$classeDisciplina['0']->id_c_d}}" selected disabled>{{$classeDisciplina['0']->vc_classe}}ª Classe|{{ $classeDisciplina['0']->vc_disciplina }} </option>
           @else
           <option value="" selected disabled>Seleciona a Classe|Disciplina</option>
           @endif
        
            @foreach ($classesDisciplinas as $classeDisciplina)

            <option value="{{$classeDisciplina->id_c_d}}">{{$classeDisciplina->vc_classe}}ª Classe|{{ $classeDisciplina->vc_disciplina }} </option>


           
        @endforeach
                </option>
             
        
        </select>

    </div>
</div>

<div class="col-md-4">
    <div class="form-group ">
        <label for="dt_data_entrega">{{ __('Data de entrega') }}</label>
        <input value="{{ isset($tarefa->dt_data_entrega) ? $tarefa->dt_data_entrega : '' }}" id="dt_data_entrega"
            type="date" class="form-control @error('dt_data_entrega') is-invalid @enderror" name="dt_data_entrega"
             required autocomplete="dt_data_entrega" autofocus>

        @error('dt_data_entrega')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>
<div class="col-md-12">
    <div class="form-group ">
        <label for="vc_descricao">{{ __('Descrição') }}</label>
        <textarea id="vc_descricao" name="vc_descricao" rows="4" cols="50" class="form-control">

            @if (isset($tarefa->vc_descricao))
            {{ $tarefa->vc_descricao }}
            @endif
           
          
            </textarea>
    </div>
</div>



