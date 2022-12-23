@extends('layouts.auth',['title' =>'Confirme seu email'])
@section('content')
        <main>
            <div class="container-xl px-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center"><h3 class="fw-light my-4">Ação necessaria</h3></div>
                            <div class="card-body">
                                <div class="small mb-3 text-muted">Enviamos um link de confirmação para o e-mail cadastrado.</div>
                            </div>
                            <div class="card-footer text-center">
                                <form action="{{route('verification.send')}}" method="post">
                                    @csrf
                                    <div class="small "><button class="btn btn-transparent-dark" type="submit" href="{{route('verification.send')}}">Reenviar email</button></div>
                                </form>

                                <div class="small  mt-3"><a href="{{route('login')}}">Login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection
