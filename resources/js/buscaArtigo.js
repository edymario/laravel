var teste = 0;
$("#busca").click(function(){
console.log('machine learning');
  let valorBusca = $("#art").val();
  console.log(valorBusca.search(" "));

  console.log( $.ajax({
        method: "GET",
        url: 'https://www.uplexis.com.br/blog/?',
        datatype: "HTML",
        data: {s: valorBusca},
        success: function (result) {


            $(".falseDiv").append(result)
                let busc =   $('.falseDiv .blog .container .post').each(function(val){
                this.teste = 1;
                        let title = $(this).find('.title').text();
                        let link =  $(this).find('.btn-uplexis').attr('href');
                        let titleNotSpace = title.trim();
                        let dados = {titulo:titleNotSpace, page:link}
                        savePost(dados);
                });
                    if( this.teste == undefined) {
                        alert("Nem Um Post Encontrado")
                        document.getElementById('falseDiv').remove()
                        document.location.reload(true);
                    } else {
                        alert('Post Salvo Com Sucesso')
                    }
            },
            error: function() {
            alert("Ocorreu um erro na busca dos Artigos.");
         }

    }));


});

function savePost(info){
$.ajax({
    method: "POST",
    url: 'http://127.0.0.1:8000/artigo',
    data: {titulo: info.titulo, page:info.page},
    success: function (val) {

    },
    error: function() {
         alert("Ocorreu um erro na Hora de Salva o Artigo.");
    }

});

document.getElementById('falseDiv').remove()
}
