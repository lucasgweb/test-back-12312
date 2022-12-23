@extends("layouts.default",[
    "title" => "Veiculos"
    ])
@section('content')
    <main>
        <div class="container mt-5 pt-3">
            <h1 class="fs-1 fw-bolder">Veiculos</h1>
            <hr>
            <div class="container  mb-5  ps-0">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newModal">
                    Adicionar Veiculo
                </button>
            </div>

            <h2 class="fs-5 fw-bolder">Meus veiculos</h2>
            <livewire:show-vehicles/>
        </div>
    </main>
    @push('scripts')
        <script src="{{asset('assets/js/notify.js')}}"></script>
        <script src="{{asset('assets/js/vehicles.js')}}"></script>
    @endpush
@endsection


