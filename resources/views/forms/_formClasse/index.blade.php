<div class="col-md-6">
    <div class="form-group ">
        <label for="vc_classe">{{ __('Nome') }}</label>
        <input value="{{ isset($classe->vc_classe) ? $classe->vc_classe : '' }}" id="vc_classe"
            type="text" class="form-control @error('vc_classe') is-invalid @enderror" name="vc_classe"
            placeholder="Nome da classe" value="{{ old('vc_classe') }}" required autocomplete="vc_classe" autofocus>

        @error('vc_classe')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
