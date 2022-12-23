@extends('layouts.auth',['title' => 'Recupere a sua senha'])
@section('content')
    <main>
        <div class="container-xl px-4">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header justify-content-center">
                            <h3 class="fw-light my-4">Redefina suasenha</h3>
                        </div>
                        <div class="card-body">
                            <div class="small mb-3 text-muted">
                                Escolha uma nova senha para concluir.
                            </div>
                            <form action="{{route('password.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{$token}}">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control" id="inputEmailAddress" name="email" type="email"
                                           placeholder="Insire seu E-mail"/>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputPassword">Senha</label>
                                    <input class="form-control" id="inputPassword" name="password" type="password"
                                           placeholder="Insire sua nova senha"/>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputPasswordConfirmation">Confirme sua senha</label>
                                    <input class="form-control" id="inputPasswordConfirmation"
                                           name="password_confirmation" type="password"
                                           placeholder="Confirme sua nova senha"/>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="{{route('login')}}">Voltar para o login</a>
                                    <button type="submit" class="btn btn-primary" href="auth-login-basic.html">Redefinir
                                        sua senha
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small">Ainda não possui uma conta?<a href="{{route('signup')}}"> Cadastre-se
                                    Agora!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


