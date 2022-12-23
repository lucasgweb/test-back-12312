@extends('layouts.default',['title' => "Manutençoes"])
@section('content')
    <main>
        <div class="container mt-5">
            <h1 class="fs-1 fw-bolder">Manutenções</h1>
            <hr class="mt-2 mb-4"/>
            <div class="container  mb-3  ps-0">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newModal">
                    Adicionar Manutenção
                </button>
            </div>
            <livewire:show-maintenances/>
        </div>
    </main>
    @push('scripts')
        <script src="{{asset('assets/js/maintenance.js')}}"></script>
        <script src="{{asset('assets/js/notify.js')}}"></script>
    @endpush
@endsection


