@extends('layouts.auth',['title' => 'Recupere a sua senha'])
@section('content')
    <main>
        <div class="container-xl px-4">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header justify-content-center"><h3 class="fw-light my-4">Recupere sua senha</h3></div>
                        <div class="card-body">
                            <div class="small mb-3 text-muted">
                                Digite seu endereço de e-mail e enviaremos um link para redefinir a sua senha.</div>
                            <form method="post" action="{{route('password.email')}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Insire seu E-mail" />
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="{{route('login')}}">Voltar para o login</a>
                                    <button type="submit" class="btn btn-primary" href="auth-login-basic.html">Redefinir sua senha</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="{{route('signup')}}">Ainda não possui uma conta? Cadastre-se Agora!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
