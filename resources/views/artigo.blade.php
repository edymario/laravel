
@extends('layouts.app')

@section('content')

<script  src="{{ asset('js/buscaArtigo.js')}}" type="text/javascript"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Artigo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                <div class="row">
                    <div class="col-sm">Titulo</div>
                    <div class="col-sm">Link</div>
                    <div class="col-sm">Excluir Artigos</div>
                </div>


                   @foreach($artigos as $ar)
                   <br>
                   <div class="row">
                         <div class="col-sm">{{$ar['titulo']}}</div>
                         <div class="col-sm"><a href="{{$ar['link']}}" target='_blank'><button class='btn btn-success'>Ir Para Artigo</button></a></div>
                         <div class="col-sm">
                            <form action="{{ route ('artigo.destroy', $ar['id'])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class='btn form-control-sm' name='delete' value='DELETE' >
                            </form>
                        </div>
                    </div>
                   @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
