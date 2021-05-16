<div class="col-md-3">
    <div class="form-group ">
        <label for="vc_imagem">{{ __('Imagem') }}</label>
        <input value="{{ isset($disciplina->vc_imagem) ? $disciplina->vc_imagem : '' }}" id="vc_imagem"
            type="file" class="form-control @error('vc_imagem') is-invalid @enderror" name="vc_imagem"
           value="{{ old('vc_imagem') }}" required autocomplete="vc_imagem" autofocus>

        @error('vc_imagem')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-md-8">
    <div class="form-group ">
        <label for="vc_disciplina">{{ __('Nome') }}</label>
        <input value="{{ isset($disciplina->vc_disciplina) ? $disciplina->vc_disciplina : '' }}" id="vc_disciplina"
            type="text" class="form-control @error('vc_disciplina') is-invalid @enderror" name="vc_disciplina"
            placeholder="Nome da disciplina" value="{{ old('vc_disciplina') }}" required autocomplete="vc_disciplina" autofocus>

        @error('vc_disciplina')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

