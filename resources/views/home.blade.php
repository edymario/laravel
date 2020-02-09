
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Busca Artigo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn  btn-info" type="button" id="busca"> Capturar</button>
                        </div>
                      <input type="text" class="form-control" id='art' placeholder="Artigo.." aria-label="" aria-describedby="basic-addon1" >
                    </div>
                    <div  style="display:none" class='falseDiv' id='falseDiv'>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   var teste = 0;
    $("#busca").click(function(){
      let valorBusca = $("#art").val();
      valorBusca.search(" ");

       $.ajax({
            method: "GET",
            url: 'https://www.uplexis.com.br/blog/?',
            datatype: "HTML",
            data: {s: valorBusca},
            success: function (result) {
                $(".falseDiv").append(result)
                    let busc =   $('.falseDiv .blog .container .post').each(function(val){
                    teste = 1;
                            let title = $(this).find('.title').text();
                            let link =  $(this).find('.btn-uplexis').attr('href');
                            let titleNotSpace = title.trim();
                            let dados = {titulo:titleNotSpace, page:link}
                            savePost(dados);
                    });
                        if( teste == 0) {
                            alert("Nem Um Post Encontrado")
                            document.location.reload(true);
                        } else {
                            alert('Post Salvo com Sucesso')
                        }
                },
                error: function() {
                alert("Ocorreu um erro na busca dos Artigos.");
             }

        });


    });

function savePost(info){
   $.ajax({
        method: "POST",
        url: 'http://127.0.0.1:8000/artigo',
        data: {titulo: info.titulo, page:info.page},
        success: function (val) {
        }
   });
  document.getElementById('falseDiv') != null ?  document.getElementById('falseDiv').remove(): "";
  document.location = 'http://localhost:8000/artigo';
}
</script>
@endsection
