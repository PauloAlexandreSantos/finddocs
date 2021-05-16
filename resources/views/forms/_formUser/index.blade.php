


<div class=" form-group col-sm-3">
        <div id="div_file"  style="width: 150px; height: 140px;">
                <div>

                <label for="files">
                    <img id="image1" style="width: 150px; height: 140px;" class="rounded p-1"
                    src="{{asset('images/icon/iconAdd.png')}}" alt="Adicionar uma fotografia" title="Adicionar uma fotografia">

                    </label> </div>
                <div>
                    <button id="files"style="visibility: hidden" class="btn_enviar"
                        onclick="document.getElementById('file').click(); return false;">
                        Upload Button
                    </button>

                </div>
            </div>
                 <input name="foto" type="file" id="file" class="form-control" onchange="readURL(this)" style="visibility: hidden" accept="image/*">

    <label for="vc_nomeUtilizador">{{ __('Selecionar foto') }}</label>
</div>






<div class="col-md-3">
    <div class="form-group ">
        <label for="vc_nomeUtilizador">{{ __('Utilizador') }}</label>
        <input value="{{ isset($user->vc_nomeUtilizador) ? $user->vc_nomeUtilizador : '' }}" id="vc_nomeUtilizador"
            type="text" class="form-control @error('vc_nomeUtilizador') is-invalid @enderror" name="vc_nomeUtilizador"
            placeholder="Utilizador" value="{{ old('vc_nomeUtilizador') }}" required autocomplete="vc_nomeUtilizador"
            autofocus>

        @error('vc_nomeUtilizador')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="col-md-3">
    <div class="form-group ">
        <label for="vc_primemiroNome">{{ __('Nome') }}</label>

        <input value="{{ isset($user->vc_primemiroNome) ? $user->vc_primemiroNome : '' }}" id="vc_primemiroNome"
            type="text" class="form-control @error('vc_primemiroNome') is-invalid @enderror" name="vc_primemiroNome"
            placeholder="Nome" value="{{ old('vc_primemiroNome') }}" required autocomplete="vc_primemiroNome"
            autofocus>

        @error('vc_primemiroNome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="col-md-3">
    <div class="form-group ">
        <label for="vc_apelido">{{ __('Apelido') }}</label>
        <input value="{{ isset($user->vc_apelido) ? $user->vc_apelido : '' }}" id="vc_apelido" type="text"
            placeholder="Apelido" class="form-control @error('vc_apelido') is-invalid @enderror" name="vc_apelido"
            value="{{ old('vc_apelido') }}" required autocomplete="vc_apelido" autofocus>

        @error('vc_apelido')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="col-md-3">
    <label for="vc_tipoUtilizador">{{ __('Nivel') }}</label>
    <select type="text" class="form-control border-secondary" name="vc_tipoUtilizador" required>
        @isset($user)
            <option value="{{ isset($user->vc_tipoUtilizador) ? $user->vc_tipoUtilizador : '' }}">
                {{ $user->vc_tipoUtilizador }}</option>
        @else
            <option disabled value="" selected>selecione o nível de acesso</option>
        @endisset

        @if(Auth::User()->vc_tipoUtilizador!='Encarregado')
        <option value="Administrador">Administrador</option>
        <option value="Professor">Professor</option>
        <option value="Encarregado">Encarregado</option>
        <option value="Aluno">Aluno</option>
        @endif

        @if (Auth::User()->vc_tipoUtilizador == 'Encarregado')
            <option value="Filho">Filho</option>

        @endif
    </select>
</div>


<div class="col-md-3">
    <div class="form-group ">
        <label for="vc_telefone">{{ __('Telefone') }}</label>
        <input value="{{ isset($user->vc_telefone) ? $user->vc_telefone : '' }}" id="vc_tipoUtilizador"
            id="vc_telefone" placeholder="Telefone" type="number" min="900000000"
            class="form-control @error('vc_telefone') is-invalid @enderror" name="vc_telefone"
            value="{{ old('vc_telefone') }}" required autocomplete="vc_telefone" autofocus>

        @error('vc_telefone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-md-3">
    <label for="vc_genero">{{ __('Genero') }}</label>
    <select type="text" class="form-control border-secondary" name="vc_genero" required>
        @isset($user)
            <option value="{{ isset($user->vc_genero) ? $user->vc_genero : '' }}">{{ $user->vc_genero }}</option>
        @else
            <option disabled value="" selected>selecione o gênero</option>
        @endisset
        <option value="masculino">Masculino</option>
        <option value="feminino">Feminino</option>
    </select>
</div>

<div class="col-md-3">
    <div class="form-group ">
        <label for="email">{{ __('Email') }}</label>
        <input value="{{ isset($user->vc_email) ? $user->vc_email : '' }}" id="email" type="email"
            placeholder="Email@gmail.com" class="form-control @error('email') is-invalid @enderror" name="vc_email"
            value="{{ old('vc_email') }}" required autocomplete="vc_email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="col-md-3">
    <div class="form-group ">
        <label for="password">{{ __('Senha') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="Senha" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="col-md-3">
    <div class="form-group ">
        <label for="password-confirm">{{ __('Confirmar a senha') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
            placeholder="Confirmar a senha" autocomplete="new-password">
    </div>
</div>
