@extends('layouts.auth',['title' => 'Cadastre-se'])
    @section('content')
        <main>
            <div class="container-xl px-4">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center"><h3 class="fw-light my-4">Faça seu cadastro</h3></div>
                            <div class="card-body">
                                <form method="post" action="{{route('register')}}">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputFirstName">Nome</label>
                                                <input class="form-control" id="inputFirstName" type="text" name="name" value="{{old('name')}}" placeholder="Insira seu primeiro nome" />
                                                @error('name') <span class="small text-red">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputLastName">Sobrenome</label>
                                                <input class="form-control" id="inputLastName" name="last_name" value="{{old('last_name')}}" type="text" placeholder="Insite seu ultimo nome" />
                                                @error('last_name') <span class="small text-red">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control" id="inputEmailAddress" name="email" type="email" value="{{old('email')}}" aria-describedby="emailHelp" placeholder="Insira seu melhor email" />
                                        @error('email') <span class="small text-red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Senha</label>
                                                <input class="form-control" id="inputPassword" value="{{old('password')}}" name="password" type="password" placeholder="Insira sua senha" />
                                                @error('password') <span class="small text-red">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputConfirmPassword">Confirme sua senha</label>
                                                <input class="form-control" id="inputConfirmPassword" value="{{old('password_confirm')}}" name="password_confirm" type="password" placeholder="Confirme sua senha" />
                                                @error('password_confirm') <span class="small text-red">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Criar conta</button>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small">Já possue uma conta?<a href="{{route('login')}}"> Faça o login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection

