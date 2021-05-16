    <div class="row">
        <div class="col-lg-6 form-group ">
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
                    <input name="foto" type="file" id="file" onchange="readURL(this)" style="visibility: hidden" accept="image/*">
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    <div class="col-lg-3 form-group">

        <label for="vc_nomeUtilizador">{{ __('Utilizador') }}</label>
        <input value="{{ isset($user->vc_nomeUtilizador) ? $user->vc_nomeUtilizador : '' }}" id="vc_nomeUtilizador"
            type="text" class="form-control @error('vc_nomeUtilizador') is-invalid @enderror" name="vc_nomeUtilizador"
            placeholder="Utilizador" value="{{ old('vc_nomeUtilizador') }}" required autocomplete="vc_nomeUtilizador" autofocus>

        @error('vc_nomeUtilizador')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-lg-2">

            <label for="vc_primemiroNome">{{ __('Primeiro nome') }}</label>

            <input value="{{ isset($user->vc_primemiroNome) ? $user->vc_primemiroNome : '' }}" id="vc_primemiroNome"
                type="text" class="form-control @error('vc_primemiroNome') is-invalid @enderror" name="vc_primemiroNome"
                placeholder="Nome" value="{{ old('vc_primemiroNome') }}" required autocomplete="vc_primemiroNome" autofocus>

            @error('vc_primemiroNome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



        <div class="col-lg-4">

        <label for="vc_nome_meio">{{ __('Nome do meio') }}</label>

        <input value="{{ isset($user->vc_nome_meio) ? $user->vc_nome_meio : '' }}" id="vc_nome_meio"
            type="text" class="form-control @error('vc_nome_meio') is-invalid @enderror" name="vc_nome_meio"
            placeholder="Nome" value="{{ old('vc_nome_meio') }}" required autocomplete="vc_nome_meio" autofocus>

        @error('vc_nome_meio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="col-lg-2">

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

        <div class="col-md-4">

        <label for="dt_data_nascimento">{{ __('Data de nascimento') }}</label>
        <input value="{{ isset($user->dt_data_nascimento) ? $user->dt_data_nascimento : '' }}" id="dt_data_nascimento"
            type="date" class="form-control @error('dt_data_nascimento') is-invalid @enderror" name="dt_data_nascimento"
             required autocomplete="dt_data_nascimento" autofocus>

        @error('dt_data_nascimento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

     </div>


<div class="col-lg-3">

                <label for="it_num_processo">{{ __('Número de processo') }}</label>
            <input value="{{ isset($user->it_num_processo) ? $user->it_num_processo : '' }}" id="vc_tipoUtilizador" id="it_num_processo"
                placeholder="Número de processo" type="number" class="form-control @error('it_num_processo') is-invalid @enderror" name="it_num_processo"
                value="{{ old('it_num_processo') }}" required autocomplete="it_num_processo" autofocus>

            @error('it_num_processo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
  </div>


<div class="col-lg-3">

      <label for="vc_BI">{{ __('Número do BI') }}</label>
      <input value="{{ isset($user->vc_BI) ? $user->vc_BI : '' }}" id="vc_BI" type="text"
      placeholder="Bilhete de Identidade" class="form-control @error('vc_BI') is-invalid @enderror" name="vc_BI"
          value="{{ old('vc_BI') }}" required autocomplete="vc_BI" autofocus>

      @error('vc_BI')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>



    <div class="col-lg-3">


            <label for="vc_telefone">{{ __('Telefone') }}</label>
            <input value="{{ isset($user->vc_telefone) ? $user->vc_telefone : '' }}" id="vc_tipoUtilizador" id="vc_telefone"
                placeholder="Telefone" type="number" min="900000000" class="form-control @error('vc_telefone') is-invalid @enderror" name="vc_telefone"
                value="{{ old('vc_telefone') }}" required autocomplete="vc_telefone" autofocus>

            @error('vc_telefone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


    <div class="col-lg-6">
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

    <div class="col-lg-6 form-group">

            <label for="email">{{ __('Email') }}</label>
            <input value="{{ isset($user->vc_email) ? $user->vc_email : '' }}" id="email" type="email"
            placeholder="Email@gmail.com"class="form-control @error('email') is-invalid @enderror" name="vc_email" value="{{ old('vc_email') }}"
                required autocomplete="vc_email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    <div class="col-lg-6 form-group">

            <label for="password">{{ __('Senha') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="Senha"name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    <div class="col-lg-6 form-group">

            <label for="password-confirm">{{ __('Confirmar a senha') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
            placeholder="Confirmar a senha" autocomplete="new-password">
        </div>
    </div>
