@extends('layouts.auth',['title' =>'Login'])
@section('content')
    <main>
        <div class="container-xl px-4">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header justify-content-center"><h3 class="fw-light my-4">Login</h3></div>
                        <div class="card-body">
                            <form method="post" action="{{route('login.authenticate')}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email"  value="test@example.com" name="email" placeholder="Insira o endereço de email" />
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputPassword">Senha</label>
                                    <input class="form-control" id="inputPassword" type="password" name="password" value="password" placeholder="Insira sua senha" />
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" id="rememberPasswordCheck" name="remember" type="checkbox" value="true" />
                                        <label class="form-check-label" for="rememberPasswordCheck">Manterme conectado</label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="{{route('password.request')}}">Esqueceu sua senha?</a>
                                    <input class="btn btn-primary" type="submit" value="Login">
                                </div>

                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small">Ainda não possui uma conta? <a href="{{route('signup')}}">Cadastre-se Agora!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
