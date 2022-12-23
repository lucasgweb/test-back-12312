<div>
    @include('livewire.modal-vehicles')
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end">
        <small>
            Mostrar
            <select wire:change="resetPage" wire:model="entries" class="form-select-sm">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="25">25</option>
            </select>
        </small>

    </div>
<div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead>
        <tr>
            <th scope="col">Placa</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Ano</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @if(count($vehicles) > 0)
            @foreach($vehicles as $vehicle)
                <tr>
                    <th scope="row">{{$vehicle->plate}}</th>
                    <td>{{$vehicle->brand}}</td>
                    <td>{{$vehicle->model}}</td>
                    <td>{{$vehicle->year}}</td>
                    <td>
                        <button type="button" wire:click="editVehicle({{$vehicle->id}})" id="btn-edit"
                                class="btn btn-secondary-soft btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal"><i class="bi  bi-pencil-square"></i></button>

                        <button wire:click="deleteId({{ $vehicle->id }})" type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" class="btn btn-danger btn-sm mt-2 mt-sm-0"><i
                                class="bi bi-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">Nenhum veículo encontrado</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
    <div class="d-flex justify-content-end">
        {{$vehicles->links('livewire::bootstrap')}}
    </div>
</div>
