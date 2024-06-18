<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de nota</title>

    @include('blocks.header')
    @yield('imports')

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


            <div class="page-heading">
                <!-- Título subtítulo e breadcomb -->
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Alteração manual de NF</h3>
                            <p class="text-subtitle text-muted">Alteração de itens individuais.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="/notas">notas</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">edição</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- FIM Título subtítulo e breadcomb -->

                @include('blocks.alerts')
                <!-- Início do conteúdo -->

                <section class="section">
                    <form method="POST" action="?">
                        @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edição</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="basicInput">Número da nota</label>
                                        <input type="number" class="form-control " name="nota"  readonly="true" disabled placeholder="Opcional" value="{{$nota->id}}">

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Paciente</label>
                                        <input type="text" id="search" class="form-control" name="nome"  placeholder="Escreva e escolha" value="{{$paciente->nome}}">
                                        <input type="hidden" name="paciente_id" id="paciente" value="{{$nota->paciente_id}}">
                                        <div id="display" class="list-group" ></div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Valor</label>
                                        <input type="number" class="form-control"  placeholder="Valor" name="valor" value="{{$nota->valor}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Mês</label>
                                        <select class="form-select" name="mes" id="mes">
                                            <option value="00">Escolha o mês</option>
                                            <option value="01" {{$nota->mes==1?'selected':''}}>Janeiro</option>
                                            <option value="02" {{$nota->mes==2?'selected':''}}>Fevereiro</option>
                                            <option value="03" {{$nota->mes==3?'selected':''}}>Março</option>
                                            <option value="04" {{$nota->mes==4?'selected':''}}>Abril</option>
                                            <option value="05" {{$nota->mes==5?'selected':''}}>Maio</option>
                                            <option value="06" {{$nota->mes==6?'selected':''}}>Junho</option>
                                            <option value="07" {{$nota->mes==7?'selected':''}}>Julho</option>
                                            <option value="08" {{$nota->mes==8?'selected':''}}>Agosto</option>
                                            <option value="09" {{$nota->mes==9?'selected':''}}>Setembro</option>
                                            <option value="10" {{$nota->mes==10?'selected':''}}>Outubro</option>
                                            <option value="11" {{$nota->mes==11?'selected':''}}>Novembro</option>
                                            <option value="12" {{$nota->mes==12?'selected':''}}>Dezembro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Ano</label>
                                        <input type="number" class="form-control"  placeholder="Ano" name="ano" value="{{$nota->ano}}" >
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Emisão</label>
                                        <input type="date" class="form-control" name="emissao" placeholder="Data" value="{{$nota->emissao->format('Y-m-d')}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="lancada" {{$nota->status=='lancada'?'selected':''}}>Lançada</option>
                                            <option value="emitida" {{$nota->status=='emitida'?'selected':''}}>Emitida</option>
                                            <option value="importada" {{$nota->status=='importada'?'selected':''}}>Importada</option>
                                            <option value="editada" {{$nota->status=='editada'?'selected':''}}>Editada</option>
                                            <option value="substituida" {{$nota->status=='substituida'?'selected':''}}>Editada</option>
                                            <option value="cancelada" {{$nota->status=='cancelada'?'selected':''}}>Cancelada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Link</label>
                                        <input type="text" class="form-control" name="link" placeholder="Link para download" value="{{$nota->link}}" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <textarea class="form-control" name="descricao" rows="5">{{$nota->descricao}}</textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="obs">Observações</label>
                                        <textarea class="form-control" name="obs" >{{$nota->obs}}</textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="obs">Arquivo</label>
                                        <input type="file" class="form-control" name="arquivo" placeholder="PDF" >
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-6 d-flex">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Salvar</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpar</button>
                                    <a class="btn btn-light-secondary me-1 mb-1" href="/pacientes">Cancelar</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    </form>
                </section>

                <!-- Final do conteúdo da página -->
            </div>

            @include('blocks.footer')
            @yield('footer')
        </div>
    </div>
    @yield('final_imports')
<script>
    //Getting value from "ajax.php".
    function fill(Value,Id) {
        //Assigning value to "search" div in "search.php" file.
        $('#search').val(Value);
        $('#paciente').val(Id);
        //Hiding "display" div in "search.php" file.
        $('#display').hide();
    }
    $(document).ready(function() {
        //On pressing a key on "Search box" in "search.php" file. This function will be called.
        $("#search").keyup(function() {
            //Assigning search box value to javascript variable named as "name".
            var name = $('#search').val();
            //Validating, if "name" is empty.
            if (name == "") {
                //Assigning empty value to "display" div in "search.php" file.
                $("#display").html("");

            }
            //If name is not empty.
            else {
                //AJAX is called.
                $.ajax({
                    //AJAX type is "Post".
                    type: "GET",
                    //Data will be sent to "ajax.php".
                    url: "/pacientes/search/"+name,
                    //Data, that will be sent to "ajax.php".

                    //If result found, this funtion will be called.
                    success: function(html) {
                        //Assigning result to "display" div in "search.php" file.
                        $("#display").html(html).show();
                    }
                });
            }
        });
    });
</script>

</body>
</html>
