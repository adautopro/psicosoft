<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Paciente</title>

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
                            <small>Psicosoft</small>
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
                            <h3>Alteração de dados do paciente</h3>
                            <p class="text-subtitle text-muted">Use para modificar os dados do paciente, mas não se esqueça de salvar.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="/pacientes">pacientes</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">alteração de dados</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- FIM Título subtítulo e breadcomb -->


                <!-- Início do conteúdo -->

                <section class="section">
                    <form method="POST" action="?">
                        @csrf
                        <input type="hidden" name="id" value="{{$paciente->notionid}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Paciente ID {{$paciente->id}} ({{$paciente->notionid}})</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nome</label>
                                        <input type="text" class="form-control" value="{{$paciente->nome}}" placeholder="Nome completo">
                                    </div>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">E-mail</label>
                                        <input type="email" class="form-control"  placeholder="nom@provedor" value="{{$paciente->email}}" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">CPF</label>
                                        <input type="text" class="form-control"  placeholder="Somente números" value="{{$paciente->cpf}}" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Celular</label>
                                        <input type="text" class="form-control"  placeholder="(xx)9xxxx-xxxx" disabled="disabled" >
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">CEP</label>
                                        <input type="text" class="form-control" value="{{$paciente->cep}}" placeholder="Somente números" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="disabledInput">Endereço</label>
                                        <input type="text" class="form-control" value="{{$paciente->logradouro}}" placeholder="Rua, Av. Alameda ..." >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Número</label>
                                        <input type="text" class="form-control" value="{{$paciente->numero}}" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Complemento</label>
                                        <input type="text" class="form-control" value="{{$paciente->complemento}}" placeholder="Rua, Av. Alameda ..." >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Bairro</label>
                                        <input type="text" class="form-control" value="{{$paciente->bairro}}" placeholder="Rua, Av. Alameda ..." >
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">Cidade</label>
                                        <input type="text" class="form-control" value="{{$paciente->cidade}}" placeholder="Rua, Av. Alameda ..." >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">UF</label>
                                        <select class="form-select">
                                            <option value="" {{$paciente->uf==""?'selected':''}}>Selecione </option>
                                            <option value="SP" {{$paciente->uf=="SP"?'selected':''}}>São Paulo</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espirito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                            <option value="EX">Outro país</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="disabledInput">País</label>
                                        <input type="text" class="form-control" value="{{$paciente->pais}}" >
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
</body>
</html>
