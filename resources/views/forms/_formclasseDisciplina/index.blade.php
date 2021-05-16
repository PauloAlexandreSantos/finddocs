<div class="col-md-4">
    <div class="form-group ">
        <label for="classe_id">{{ __('Classe') }}</label>
        <select class="form-control" name="classe_id" id="classe_id" required>

           
           
         
                <option value="{{ $classe->id }}">{{ $classe->vc_classe }}ª classe </option>
                </option>
             
        
        </select>

    </div>
</div>

<div class="col-md-4">
    <div class="form-group ">
        <label for="disciplina_id">{{ __('Disciplina') }}</label>
        <select class="form-control" name="disciplina_id" id="disciplina_id" required>
            @isset ($classeDisciplina['0'])
        <option value="{{ isset($classeDisciplina) ? $classeDisciplina['0']->disciplina_id : '' }}" selected disabled >
            {{ isset( $classeDisciplina['0']->vc_disciplina) ? $classeDisciplina['0']->vc_disciplina  : 'Selecione a Disciplina:' }}</option>
       @endisset    
        @foreach ($disciplinas as $disciplina)

        <option value="{{ $disciplina->id }}">{{ $disciplina->vc_disciplina }} </option>


           
        @endforeach
     
    </select>
    </div>
</div>