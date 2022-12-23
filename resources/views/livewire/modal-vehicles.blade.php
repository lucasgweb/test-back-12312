<div>
    {{-- Modal de adicionar --}}
    <div wire:ignore.self class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModalLabel">Novo veiculo</h5>
                    <button type="button" class="btn-close" wire:click="resetInput()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <label for="input-plate">Placa:</label>
                                    <input wire:model.defer="plate" class="form-control" id="input-plate" type="text"
                                           placeholder="Placa">
                                    @error('plate') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label class="small" for="type-vehicle">
                                        Tipo:
                                    </label>
                                    <select wire:model.defer="type" class="form-select" id="type-vehicle">
                                        <option selected>Selecione a tipo</option>
                                        <option value="carros">Carro</option>
                                        <option value="motos">Moto</option>
                                        <option value="caminhoes">Caminhão</option>
                                    </select>
                                    @error('type') <span class="small text-red-soft">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label class="small" for="brand-select">
                                        Marca:
                                    </label>
                                    <select wire:model.defer="brand" class="form-select" name="brand" id="brand-select">
                                    </select>
                                    @error('brand') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label class="small" for="model-select">
                                        Modelo:
                                    </label>
                                    <select wire:model.defer="model" class="form-select" name="brand" id="model-select">
                                    </select>
                                    @error('model') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-2 mb-4">
                                <div class="col">
                                    <label class="small" for="year-select">
                                        Ano:
                                    </label>
                                    <select wire:model.defer="year" class="form-select" name="brand" id="year-select">
                                    </select>
                                    @error('year') <span class="small text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gray-800 text-white" wire:click="resetInput()" data-bs-dismiss="modal">Fechar
                            </button>
                            <input id="submit-vehicle" type="submit" class="btn btn-primary" value="Adicionar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal de editar --}}
    <div>
        <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Atualizar veiculo</h5>
                        <button type="button" class="btn-close" wire:click="resetInput()" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="updateVehicle">
                            @csrf
                            <input id="id-vehicle" type="hidden" wire:model.defer="vehicleId">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <label for="input-edit-plate">
                                            Placa:
                                        </label>
                                        <input id="input-edit-plate" wire:model.defer="plate" class="form-control"
                                               type="text">
                                        @error('plate') <span class="small text-red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-3">
                                <button type="button" class="btn bg-gray-800 text-white" wire:click="resetInput()" data-bs-dismiss="modal">Fechar
                                </button>
                                <input type="submit" class="btn btn-primary " value="Atualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de confirmar Exclusão -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmação</h5>
                    <button wire:click="resetInput()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir?</p>
                </div>
                <div class="modal-footer">
                    <button  wire:click="resetInput()" type="button" class="btn bg-gray-800 text-white close-btn" data-bs-dismiss="modal">Fechar
                    </button>
                    <button  type="submit" wire:click.prevent="delete()"
                            class="btn btn-danger close-modal" data-bs-dismiss="modal">Sim, Excluir
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
