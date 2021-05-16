@extends('layouts._includes.merge.painel')

@section('titulo', 'Supervisão')

@section('conteudo')

  

    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h4 page-title">
           Materia da    {{$classeDisciplina['0']->vc_classe}}ª classe  de {{$classeDisciplina['0']->vc_disciplina}}
            </h2>
        </div>
    </div>
   
    @foreach ($materias as $materia)
 
  
        <div class="card mb-2 mt-4">
            <div class="card-body">
                <h2 class="h5 text-center card-title">
                  {{$materia->vc_materia}}
                </h2>
            </div>
        </div>
    
        
    

       
                        
        <div class="row">
                         @foreach ($materiaVideo as $video)
                    
                   
                      @if ($video->id_materia==$materia->id)
                         
                     
                            <div class="col-md-3  card ">

                           <div class="card-body">
                                <video width="270" height="240" controls>
                                    <source src="{{ url("storage/{$video->vc_video}") }}" type="video/mp4">

                                </video>

                                <p class="card-text p-2">
                                    {{ $video->vc_descricao }}
                                </p>
                                @if (Auth::User()->vc_tipoUtilizador == 'Administrador')
                                    <div class="dropdown">
                                        <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                            <a href="{{ route('materia.editarVideo', ['id_materia' => $materia->id, 'id_video' => $video->id]) }}"
                                                class="dropdown-item">Editar</a>

                                            <a href="{{ route('materia.excluirVideo', $video->id) }}"
                                                class="dropdown-item"
                                                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                            @endif
                      
                        @endforeach
                    </div>
        
     
        <style>
            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }

        </style>



        <div class="card mt-4">
            <div class="card-body row">
              
                @foreach ($materiaPDF as $PDF)
              
                @if ($PDF->id_materia==$materia->id)
                          
                    {{-- <a href="{{ url("storage/{$PDF->vc_pdf}") }}" target="_blank"
                        class="col-sm-3">{{ $PDF->vc_descricao_pdf }}</a> --}}


                   

                        <div class="col-sm-3">
                            <a href="{!! url('storage/' . $PDF->vc_pdf) !!}" target="_blank" class=" "><img
                                    src="{{ url('site/img/pdf-24.png') }}" alt="">
                                    <h6> {{ $PDF->vc_descricao_pdf }}</h6></a>
                            {{-- <a href="{!! url('storage/' . $PDF->vc_pdf) !!}" target="_blank" class="btn btn-danger"><img
                                    src="{{ url('site/img/pdf-24.png') }}" alt="">
                                PDF</a> --}}
                        </div>

                        <div class="col-2">
                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador')
                                <div class=" dropdown">
                                    <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                    </button>Opções
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                        <a href="{{ route('materia.editarPDF', ['id_materia' => $materia->id, 'id_PDF' => $PDF->id]) }}"
                                            class=" dropdown-item"> Editar</a>

                                        <a href="{{ route('materia.excluirPDF', $PDF->id) }}" class=" dropdown-item"
                                            data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>

                                    </div>
                                </div>
                            @endif
                        </div>
                       

                   
                   
                    
                  
                    @endif
              
                @endforeach
            </div>

        </div>

    @endforeach
        <script src="/js/sweetalert2.all.min.js"></script>

        @if (session('delete'))
            <script>
                Swal.fire(
                    'Ficheiro eliminado com sucesso',
                    '',
                    'success'
                )

            </script>
        @endif

   
    @endsection
