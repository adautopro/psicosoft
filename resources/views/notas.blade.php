<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @include('blocks.header')
    <title>Home - @yield('app_name')</title>

    @yield('imports')

    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="./assets/compiled/css/table-datatable.css">

</head>

<body>
    @yield('theme')
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">

                            <!-- <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo" srcset=""></a>-->
                            <small>@yield('app_name')</small>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                 role="img" class="iconify iconify--system-uicons" width="20" height="20"
                                 preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                   stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                 role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                                 viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    @include('blocks.menu')
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>


            <!-- Início do conteúdo da página -->
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">

                            <h3><i class="bi bi-file-earmark-person-fill"></i>Notas fiscais</h3>
                            <p class="text-subtitle text-muted">Dados específicos</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Notas fiscais</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Opções</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons">

                                <a href="/notas/cadastrar" class="btn btn-primary"><i class="bi bi-plus"></i> Criar</a>
                                <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#importarNotas">
                                    <i class="bi bi-file-arrow-down"></i> Importar do Notion
                                </button>
                                <button type="button" class="btn btn-outline-primary block" onclick="exportarSelecionadas()">
                                    <i class="bi bi-filetype-xml"></i> Exportar selecionadas
                                </button>
                                <a href="/notas/processar-retorno" class="btn btn-outline-primary" title="Processar o arquivo CSV importado do GIAP"><i class="bi bi-filetype-csv"></i> Processar retorno</a>

                            </div>

                        </div>
                    </div>
                </section>
                @include('blocks.alerts')
                <section class="section">
                    @include('blocks.modal-importar-notas')
                    @include('blocks.modal-apagar-notas')
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-2 ">
                                <input type="checkbox" class="form-check-input form-check-primary form-check-glow" onclick="selecionarTodos(this)"> Selecionar todos
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                <tr>
                                    <th>

                                       NUMERO
                                    </th>
                                    <th>PESSOA</th>
                                    <th>Ref</th>
                                    <th>Valor</th>
                                    <th>Descriçao</th>
                                    <th>Observações</th>
                                    <th>Status</th>
                                    <th>Opções</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notas as $nota)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="form-check-input form-check-primary form-check-glow"  name="paciente[{{$nota->id}}]" value="{{$nota->id}}">
                                                <label class="form-check-label" for="checkboxGlow{{$nota->id}}">&nbsp;{{$nota->id}}</label>
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{$nota->getNome()}}</td>
                                    <td>{{$nota->mes}}/{{$nota->ano}}</td>
                                    <td>R$ {{number_format($nota->valor,2,',','.')}}</td>
                                    <!--<td>{{html_entity_decode($nota->descricao, ENT_QUOTES, 'UTF-8') }}</td>-->
                                    <td>{{html_entity_decode(explode('realizada',$nota->descricao,)[0], ENT_QUOTES, 'UTF-8') }}</td>
                                    <td>{{$nota->obs }}</td>
                                    <td>
                                        @switch($nota->status)
                                            @case('emitida')
                                                <span class="badge bg-info">
                                                @break
                                            @case('lancada')
                                                <span class="badge bg-success">
                                                @break
                                            @case('substituida')
                                                <span class="badge bg-secondary">
                                                @break
                                            @case('importada')
                                                <span class="badge bg-primary">
                                                @break


                                            @endswitch

                                            {{$nota->status}}</span>
                                    </td>
                                    <td>
                                        @if(!empty($nota->link))
                                            <a href="{{$nota->link}}" target="_blank" class="btn icon btn-sm btn-outline-primary"><i class="bi bi-download"></i></a>

                                        @endif
                                        <a href="/notas/alterar/{{$nota->id}}" class="btn icon btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>&nbsp;
                                        <a href="/notas/exportar/{{$nota->id}}" target="_blank" class="btn icon btn-sm btn-outline-primary"><i class="bi bi-filetype-xml"></i></a>&nbsp;
                                        <a href="#" class="btn icon btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#apagarNotas" onclick="excluirIndividual('{{$nota->id}}')"><i class="bi bi-trash"></i></a>&nbsp;


                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Selecionados</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons">
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="bi bi-check2-square"></i>
                                    Apagar Selecionados
                                </a>
                                <a href="#" class="btn btn-outline-primary" onclick="exportar()">
                                    <i class="bi bi-bookmark-check-fill"></i>
                                    Exportar selecionados
                                </a>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Fim do conteúdo da página -->
            @include('blocks.footer')
            @yield('footer')
        </div>
    </div>
    @yield('final_imports')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var cortar = '';
        $(document).ready(function() {
            $(".select-all").click(function() {
                var checkBoxes = $("input[name=paciente\\[\\]]");
                checkBoxes.prop("checked", !checkBoxes.prop("checked"));
                console.log('fui clicado');
            });
        });
        function importar(){
            if(!$('#mes').val()==='00' || $('#ano').val()<2023){
                alert("Selecione o período corretamente"+$('#mes').val());
                return false;
            }

            $.ajax({
                url: "/notas/importar/"+$('#mes').val()+"/"+$('#ano').val()+"/"+$('#nota').val(),
                context: document.body,
                beforeSend: function() {
                    $("#modal-sync").html('Carregando...');
                }
            }).done(function(data) {
                $("#modal-sync").html(data);
            }).fail(function(data) {
                console.log(Object.keys(data));
                if(data.status === '400')
                    $("#modal-sync").html('<p> Erro ao executar a solicitação: '+data.responseText+'</p>');
            });
        }

        function exportar(){
            var itens = Array;
            $('input:checkbox.class').each(function () {
                if(this.checked)
                    itens.append($(this).val());
            });
            console.log(itens);

        }

        function selecionarTodos(campo){
            $("input:checkbox[name^=paciente]").each(
                function(){
                    $(this).prop("checked", campo.checked)
                }
            );
        }
        function exportarSelecionadas(){
            let itens =''
            $("input:checkbox[name^=paciente]:checked").each(
                function(){
                    itens+=$(this).val()+',';
                }
            );

            console.log(itens)
            if(itens !== '')
                window.open('/notas/exportar/'+itens, '_blank').focus();

        }
        function excluirIndividual(id){
            cortar = id;

        }
        function excluirSelecionadas(){
            let itens =''
            $("input:checkbox[name^=paciente]:checked").each(
                function(){
                    itens+=$(this).val()+',';
                }
            );

            console.log(itens);
            if(itens !== '')
                excluir(itens);


        }
        function excluir(ids){
            $.ajax({
                type:'POST',
                url:'/notas/excluir',
                data:ids,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success:function(data){
                    window.location.href = '/'
                }
            });

        }
    </script>
</body>
</html>
