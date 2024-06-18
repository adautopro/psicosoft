@extends('site.app')
@section('content')

    <!-- Registration 9 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5 py-xl-5">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="d-flex justify-content-center text-bg-primary">
                        <div class="col-12 col-xl-9">
                            <img class="img-fluid rounded mb-4" loading="lazy" src="./img/logo.png" width="245" height="80" alt="LPR LOGO">
                            <hr class="border-primary-subtle mb-4">
                            <h2 class="h1 mb-4">Painel de informações e conteúdo dedicado.</h2>
                            <p class="lead mb-5">Consulte seus dados financeiros e fiscais, além de acessar conteúdos exclusivos. </p>



                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-5">
                    <div class="card border-0 rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <p>&nbsp;</p>
                                        <h2 class="h3">Login</h2>
                                        <h3 class="fs-6 fw-normal text-secondary m-0">Preencha para acessar.</h3>
                                        @include('blocks.alerts')
                                    </div>
                                </div>
                            </div>
                            <form method="POST">
                                @csrf
                                <div class="row gy-3 overflow-hidden">

                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                            <label for="email" class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Senha" required>
                                            <label for="password" class="form-label">Senha</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                                                <label class="form-check-label text-secondary" for="rememberMe">
                                                    Lembrar de mim
                                                </label>
                                            </div>
                                            <a href="#!" class="link-primary text-decoration-none">Esqueci a senha</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="button text-light" type="submit">Acessar</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="m-0 text-secondary text-center">Não tem senha? <a href="#!" class="link-primary text-decoration-none">Cadastre-se</a></p>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
