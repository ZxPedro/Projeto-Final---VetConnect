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
    <div class="col py-3">
        @yield('content')
    </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('input').attr('autocomplete', 'off');
        });
    </script>

    <!-- Buscar Cep -->
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


    <!-- Editar endereço -->
    <script type="text/javascript">
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

                        if (data.flagprincipal) {
                            $('#flagprincipal').prop('checked', true);
                        } else {
                            $('#flagprincipal').prop('checked', false);
                        }


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
                $('#flagprincipal').prop('checked', false);
            });
        });
    </script>


    <!-- Exibe as raças de acordo com a especie selecionada -->
    <script type="text/javascript">
        $(document).ready(function() {
            var especiesSelect = $('#especie');
            var racasSelect = $('#raca');

            especiesSelect.change(function() {
                var especieSelecionada = especiesSelect.val();
                $.ajax({
                    url: '/breeds/' + especieSelecionada,
                    type: 'GET',
                    dataType: 'json',
                    success: function(racas) {
                        racasSelect.empty();
                        $.each(racas, function(index, raca) {
                            racasSelect.append($('<option>', {
                                value: raca.id,
                                text: raca.name
                            }));
                        });

                        if (racas.length > 0) {
                            racasSelect.prop('disabled', false);
                        } else {
                            racasSelect.prop('disabled', true);
                            racasSelect.append($('<option>', {
                                value: '',
                                text: 'Não há raças disponíveis para esta espécie'
                            }));
                        }
                    },
                    error: function(xhr, status, error) {}
                });
            });

            especiesSelect.trigger('change');
        });
    </script>

    <!-- Exibe os pets de acordo com o cliente selecionado -->
    <script type="text/javascript">
        $(document).ready(function() {
            var customerSelect = $('#customer_id_scheduling');
            var animalSelect = $('#animal_id_scheduling');

            customerSelect.change(function() {
                var customerSelecionado = customerSelect.val();

                $.ajax({
                    url: '/animalscustomer/' + customerSelecionado,
                    type: 'GET',
                    dataType: 'json',
                    success: function(pets) {
                        animalSelect.empty();
                        $.each(pets, function(index, pet) {
                            animalSelect.append($('<option>', {
                                value: pet.id,
                                text: pet.name
                            }));
                        });

                        if (pets.length > 0) {
                            animalSelect.prop('disabled', false);
                        } else {
                            animalSelect.prop('disabled', true);
                            animalSelect.append($('<option>', {
                                value: '',
                                text: 'Não há Pets disponíveis para esse cliente'
                            }));
                        }
                    },
                    error: function(xhr, status, error) {}
                });
            });

            customerSelect.trigger('change');
        });
    </script>

    <!-- Exibe as categorias de acordo com o funcionário selecionado -->
    <script type="text/javascript">
        $(document).ready(function() {
            var professionalSelect = $('#professional_id_scheduling');
            var categorySelect = $('#category_id_scheduling');

            professionalSelect.change(function() {
                var professionalSelecionado = professionalSelect.val();

                $.ajax({
                    url: '/professionalcategories/' + professionalSelecionado,
                    type: 'GET',
                    dataType: 'json',
                    success: function(categories) {
                        // Limpar todas as opções existentes
                        categorySelect.empty();

                        // Adicionar a opção padrão
                        categorySelect.append($('<option>', {
                            value: 'default', // ou outro valor padrão
                            text: 'Selecione uma categoria'
                        }));

                        if (categories.length > 0) {
                            // Adicionar as outras opções com base no profissional
                            $.each(categories, function(index, category) {
                                categorySelect.append($('<option>', {
                                    value: category.id,
                                    text: category.name
                                }));
                            });

                            categorySelect.prop('disabled', false);
                        } else {
                            categorySelect.prop('disabled', true);
                            categorySelect.append($('<option>', {
                                value: '',
                                text: 'Não há categorias disponíveis para esse profissional'
                            }));
                        }
                    },
                    error: function(xhr, status, error) {}
                });
            });

            professionalSelect.trigger('change');
        });
    </script>

    <!-- Exibe os serviços de acordo com a categoria selecionada -->
    <script type="text/javascript">
        $(document).ready(function() {
            var categorySelect = $('#category_id_scheduling');
            var serviceSelect = $('#service_id_scheduling');

            categorySelect.change(function() {
                var categorySelecionada = categorySelect.val();

                $.ajax({
                    url: '/categoryservice/' + categorySelecionada,
                    type: 'GET',
                    dataType: 'json',
                    success: function(services) {
                        // Limpar todas as opções existentes
                        serviceSelect.empty();

                        // Adicionar a opção padrão
                        serviceSelect.append($('<option>', {
                            value: 'default', // ou outro valor padrão
                            text: 'Selecione o serviço desejado'
                        }));

                        if (services.length > 0) {
                            // Adicionar as outras opções com base na categoria
                            $.each(services, function(index, service) {
                                serviceSelect.append($('<option>', {
                                    value: service.id,
                                    text: service.name
                                }));
                            });

                            serviceSelect.prop('disabled', false);
                        } else {
                            serviceSelect.prop('disabled', true);
                            serviceSelect.append($('<option>', {
                                value: '',
                                text: 'Não há serviços para essa categoria'
                            }));
                        }
                    },
                    error: function(xhr, status, error) {}
                });
            });

            categorySelect.trigger('change');
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            var servicesSelect = $('#service_id_scheduling');
            var totalInput = $('#total_service');

            servicesSelect.change(function() {
                var serviceSelecionado = servicesSelect.val();

                $.ajax({
                    url: '/getpriceservice/' + serviceSelecionado,
                    type: 'GET',
                    dataType: 'json',
                    success: function(price_service) {
                        totalInput.val(""); // Limpar o conteúdo atual, se houver

                        if (price_service) {
                            var firstServicePrice = price_service.price;
                            firstServicePrice.toLocaleString('pt-BR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                            totalInput.val(firstServicePrice);
                        } else {
                            totalInput.val("Nenhum serviço disponível para esta categoria");
                        }

                        totalInput.prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        // Trate erros, se necessário
                    }
                });
            });

            servicesSelect.trigger('change');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#ModalStockEntryAndExit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Botão que acionou o modal
                var productId = button.data('product-id'); // Extrai o ID do produto do botão
                var productName = button.data('product-name'); // Extrai o nome do produto do botão


                $('#productIdModal').val(productId);
                $('#productName').text(productName);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-get-release').on('click', function() {
                var itemId = $(this).data('release-id');

                $.ajax({
                    type: 'GET',
                    url: '/getrelease/' + itemId,
                    success: function(data) {
                        $('#name_release').val(data.name).prop('readonly', true);
                        $('#descricao_release').val(data.descricao).prop('readonly', true);
                        $('#price_release').val(data.price).prop('readonly', true);

                        if (data.type === "C") {
                            $('#optionEntrada').prop('checked', true);
                        } else {
                            $('#optionSaida').prop('checked', true);
                        }

                        $('#btnConcluir').hide();
                        $('#release').modal('show');
                    },
                    error: function(error) {
                        console.log('Erro ao obter dados do servidor: ', error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#release').on('hidden.bs.modal', function() {

                $('#name_release').val('').prop('readonly', false);
                $('#descricao_release').val('').prop('readonly', false);
                $('#price_release').val('').prop('readonly', false);
                $('#btnConcluir').show();
                $('#optionEntrada').prop('checked', false);
                $('#optionSaida').prop('checked', false);
            });
        });
    </script>

    <script>
        function imprimirStockOut() {
            var tabela = document.getElementById('stockOut');
            var estiloTabela = getComputedStyle(tabela);

            var janelaImpressao = window.open('', '_blank');
            janelaImpressao.document.write('<html><head>  <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css"><title>Imprimir Tabela</title>');


            janelaImpressao.document.write('<style>');
            janelaImpressao.document.write(estiloTabela.cssText); // Inclui o estilo da tabela
            janelaImpressao.document.write('</style></head><body>');
            janelaImpressao.document.write('<h3">Relatório de Ruptura de Estoque</h3>');
            janelaImpressao.document.write(tabela.outerHTML);
            janelaImpressao.document.write('</body></html>');
            janelaImpressao.document.close();
            janelaImpressao.print();
        }
    </script>

    <script>
        function imprimirNegativeStock() {
            var tabela = document.getElementById('negativeStock');
            var estiloTabela = getComputedStyle(tabela);

            var janelaImpressao = window.open('', '_blank');
            janelaImpressao.document.write('<html><head>  <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css"><title>Imprimir Tabela</title>');


            janelaImpressao.document.write('<style>');
            janelaImpressao.document.write(estiloTabela.cssText); // Inclui o estilo da tabela
            janelaImpressao.document.write('</style></head><body>');
            janelaImpressao.document.write('<h3">Relatório de Estoque Negativo</h3>');
            janelaImpressao.document.write(tabela.outerHTML);
            janelaImpressao.document.write('</body></html>');
            janelaImpressao.document.close();
            janelaImpressao.print();
        }
    </script>

    <script>
        function imprimirServiceReport() {
            var tabela = document.getElementById('tabelaServiceReport');
            var estiloTabela = getComputedStyle(tabela);

            var janelaImpressao = window.open('', '_blank');
            janelaImpressao.document.write('<html><head>  <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css"><title>Imprimir Tabela</title>');


            janelaImpressao.document.write('<style>');
            janelaImpressao.document.write(estiloTabela.cssText); // Inclui o estilo da tabela
            janelaImpressao.document.write('</style></head><body>');
            janelaImpressao.document.write('<h3">Relatório de Atendimentos Finalizados</h3>');
            janelaImpressao.document.write(tabela.outerHTML);
            janelaImpressao.document.write('</body></html>');
            janelaImpressao.document.close();
            janelaImpressao.print();
        }
    </script>

    <!-- Filtro Clientes -->
    <script>
        $(document).ready(function() {
            $('#searchCustomer').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: '/searchcustomers',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var tableBody = $('#resultTableCustomer tbody');
                        tableBody.empty(); // Limpa o conteúdo atual da tabela
                        $.each(data, function(index, customer) {
                            var row = '<tr>' +
                                '<td>' + customer.name + '</td>' +
                                '<td>' + customer.email + '</td>' +
                                '<td>' + customer.data_nascimento + '</td>' +
                                '<td>' + customer.cpf + '</td>' +
                                '<td>' + customer.telefone + '</td>' +
                                '<td>' +
                                '<a href="/customer/profile/' + customer.id + '" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>' +
                                '<a href="/customer/delete/' + customer.id + '"  class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row); // Adiciona a linha à tabela
                        });
                    }
                });
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function() {
            $('#searchUser').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: '/searchusers',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var tableBody = $('#resultTableUser tbody');
                        tableBody.empty(); // Limpa o conteúdo atual da tabela
                        $.each(data, function(index, user) {
                            var row = '<tr>' +
                                '<td>' + user.name + '</td>' +
                                '<td>' + user.email + '</td>' +
                                '<td>' + user.created_at + '</td>' +
                                '<td>' +
                                '<a href="/users/edit/' + user.id + '" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>' +
                                '<a href="/users/delete/' + user.id + '"  class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row); // Adiciona a linha à tabela
                        });
                    }
                });
            });
        });
    </script> -->


    <!-- Filtro Categoria -->
    <script>
        $(document).ready(function() {
            $('#searchCategory').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: '/searchcategories',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var tableBody = $('#resultTableCategory tbody');
                        tableBody.empty(); // Limpa o conteúdo atual da tabela
                        $.each(data, function(index, category) {
                            var row = '<tr>' +
                                '<td>' + category.name + '</td>' +
                                '<td>' +
                                '<a href="/cadastros/categories/edit/' + category.id + '" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>' +
                                '<a href="/cadastros/categories/delete/' + category.id + '"  class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row); // Adiciona a linha à tabela
                        });
                    }
                });
            });
        });
    </script>

    <!-- Filtro Serviço -->
    <script>
        $(document).ready(function() {
            $('#searchService').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: '/searchservices',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var tableBody = $('#resultTableService tbody');
                        tableBody.empty(); // Limpa o conteúdo atual da tabela
                        $.each(data, function(index, service) {
                            var row = '<tr>' +
                                '<td>' + service.name + '</td>' +
                                '<td>' + service.category.name + '</td>' +
                                '<td> R$' + service.price + '</td>' +
                                '<td>' +
                                '<a href="/cadastros/services/edit/' + service.id + '" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>' +
                                '<a href="/cadastros/services/delete/' + service.id + '"  class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row); // Adiciona a linha à tabela
                        });
                    }
                });
            });
        });
    </script>

    <!-- Filtro Profissional -->
    <script>
        $(document).ready(function() {
            $('#searchProfessional').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: '/searchprofessionals',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var tableBody = $('#resultTableProfessional tbody');
                        tableBody.empty(); // Limpa o conteúdo atual da tabela
                        $.each(data, function(index, professional) {

                            if (professional.categories_user) {
                                var row = '<tr>' +
                                    '<td>' + professional.name + '</td>' +
                                    '<td>' + professional.categories_user + ' Especialidade(s)</td>' +
                                    '<td>' + professional.working_days + ' Dia(s) </td>' +
                                    '<td>' +
                                    '<a href="/cadastros/professionals/edit/' + professional.id + '" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>' +
                                    '<a href="/cadastros/professionals/delete/' + professional.id + '"  class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>' +
                                    '</td>' +
                                    '</tr>';
                                tableBody.append(row); // Adiciona a linha à tabela
                            }

                        });
                    }
                });
            });
        });
    </script>
</body>


</html>