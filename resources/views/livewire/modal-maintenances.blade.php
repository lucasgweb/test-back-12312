<div>
    {{-- Modal de adicionar --}}
    <div wire:ignore.self class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModalLabel">Cadastrar nova manutenção</h5>
                    <button type="button" wire:click="resetInput()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="create">
                    <div class="modal-body">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label class="small" for="vehicle-id">
                                        Selecione o veiculo:
                                    </label>
                                    <select class="form-select" id="vehicle-id" wire:model.defer="vehicleId">
                                        <option selected>Selecione um veiculo</option>
                                        @foreach($vehicles as $vehicle)
                                            <option value="{{$vehicle->id}}">{{$vehicle->plate}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="small" for="maintenance-date">
                                        Data da manutenção:
                                    </label>
                                    <input wire:model.defer="date" class="form-control" type="date" name=""
                                           id="maintenance-date">
                                    @error('date') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 col-sm-6">
                                    <label class="small" for="input-plate">Odômetro:</label>
                                    <input wire:model.defer="odometer" class="form-control" id="input-plate"
                                           type="number">
                                    @error('odometer') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="small" for="input-plate">Custo total:</label>
                                    <input wire:model.defer="coust" class="form-control" id="input-coust" type="number" step="0.01">
                                    @error('coust') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label class="small" for="description">Descrição:</label>
                                    <textarea wire:model.defer="description" class="form-control" name="description"
                                              id="description" cols="30"
                                              rows="10" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gray-800 text-white"  wire:click="resetInput()" data-bs-dismiss="modal">Fechar
                        </button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- Modal de editar --}}
    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="newModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModalLabel">Informações da manutenção</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="resetInput()"></button>
                </div>
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model.defer="maintenanceId">
                    <div class="modal-body">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label class="small" for="vehicle-id">
                                        Selecione o veiculo:
                                    </label>
                                    <select {{($showPage == 0)? '': 'disabled'}} class="form-select" id="vehicle-id" wire:model.defer="vehicleId">
                                        <option selected>Selecione um veiculo</option>
                                        @foreach($vehicles as $vehicle)
                                            <option value="{{$vehicle->id}}">{{$vehicle->plate}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="small" for="maintenance-date">
                                        Data da manutenção:
                                    </label>
                                    <input {{($showPage == 0)? '': 'disabled'}} wire:model.defer="date" class="form-control" type="date"
                                           id="maintenance-date">
                                    @error('date') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 col-sm-6">
                                    <label class="small" for="input-odometer">Odômetro:</label>
                                    <input {{($showPage == 0)? '': 'disabled'}} wire:model.defer="odometer" class="form-control" id="input-odometer"
                                           type="number">
                                    @error('odometer') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="small" for="input-coust">Custo total:</label>
                                    <input {{($showPage == 0)? '': 'disabled'}} wire:model.defer="coust" class="form-control" id="input-coust" type="number" step="0.01">
                                    @error('coust') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label class="small" for="description">Descrição:</label>
                                    <textarea {{($showPage == 0)? '': 'disabled'}} wire:model.defer="description" class="form-control" name="description"
                                              id="description" cols="30"
                                              rows="10" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gray-800 text-white" data-bs-dismiss="modal"
                                wire:click="resetInput()">Fechar
                        </button>
                        <button {{($showPage == 0)? '': 'disabled'}} wire:click="deleteId({{$maintenanceId}})" type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" class="btn btn-danger">excluir
                        </button>
                        <button {{($showPage == 0)? '': 'disabled'}} type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal reativar manutenção--}}
    <div wire:ignore.self class="modal fade" id="pendingModal" tabindex="-1" aria-labelledby="newModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModalLabel">Escolha uma data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="resetInput()"></button>
                </div>
                <form wire:submit.prevent="pending">
                    <input type="hidden" wire:model.defer="maintenanceId">
                    <div class="modal-body">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col">
                                    <label class="small" for="maintenance-date">
                                        Data da manutenção:
                                    </label>
                                    <input wire:model.defer="date" class="form-control" type="date"
                                           id="maintenance-date">
                                    @error('date') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gray-800 text-white" data-bs-dismiss="modal"
                                wire:click="resetInput()">Fechar
                        </button>
                        <button type="submit" class="btn btn-primary">Agendar novamente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal de confirmar exclusão -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmação</h5>
                    <button type="button"  wire:click="resetInput()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="resetInput()" class="btn bg-gray-800 text-white close-btn" data-bs-dismiss="modal">Fechar
                    </button>
                    <button type="submit" wire:click.prevent="delete()"
                            class="btn btn-danger close-modal" data-bs-dismiss="modal">Sim, Excluir
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
</div>
