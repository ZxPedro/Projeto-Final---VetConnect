<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/0c87b9c9fa.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    @yield('navbar')
    <div class="container">
        @yield('content')
    </div>


    <script type="text/javascript">
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value = ("");
            document.getElementById('endereco_bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('endereco').value = (conteudo.logradouro);
                document.getElementById('endereco_bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('endereco').value = "...";
                    document.getElementById('endereco_bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>


    <script>
        $(document).ready(function() {
            $('.edit-address').click(function() {
                var enderecoId = $(this).data('variable'); // Obtém o ID do endereço do atributo de dados do botão

                console.log(enderecoId);
                $.ajax({
                    url: '/address/edit/' + enderecoId, // Substitua pela rota do controlador que retorna os dados
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Preencha os inputs do modal com os dados retornados
                        $('#address_id').val(data.id);
                        $('#endereco_cep').val(data.endereco_cep);
                        $('#endereco').val(data.endereco);
                        $('#endereco_numero').val(data.endereco_numero);
                        $('#endereco_complemento').val(data.endereco_complemento);
                        $('#endereco_bairro').val(data.endereco_bairro);
                        $('#cidade').val(data.cidade);
                        $('#uf').val(data.uf);

                    },
                    error: function(xhr, status, error) {
                        // Lide com erros, se necessário
                    }
                });
            });

            $('#ModalEndereco').on('hidden.bs.modal', function() {

                $('#address_id').val('');
                $('#endereco_cep').val('');
                $('#endereco').val('');
                $('#endereco_numero').val('');
                $('#endereco_complemento').val('');
                $('#endereco_bairro').val('');
                $('#cidade').val('');
                $('#uf').val('');
            });
        });
    </script>
</body>


</html>