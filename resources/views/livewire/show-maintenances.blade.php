<div>
    @include('livewire.modal-maintenances')
    <div class="d-flex justify-content-center mb-3">
        <button class="px-1 btn me-sm-4 {{($showPage == 0) ? 'border-bottom border-3 text-gray-700 fw-bolder':''}}"
                wire:click="selectPage(0)">Proximas manutenções
        </button>
        <button class="px-1 btn ms-sm-4 {{($showPage == 1)? 'border-bottom border-3 text-gray-700 fw-bolder':'' }}"
                wire:click="selectPage(1)">Historico de manutenções
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped tab-pane  align-middle">
            <thead>
            <tr>
                <th scope="col">Veículo</th>
                @if($showPage == 0)
                    <th scope="col">Última manutenção</th>
                    <th scope="col">Proxima manutenção</th>
                @else
                    <th scope="col">Data da Manutenção</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @if(count($maintenances) > 0)

                @foreach($maintenances as $maintenance)
                    <tr>
                        <td>
                            <span class="fw-900">{{$maintenance->vehicle->plate}}</span>
                            <p>{{$maintenance->vehicle->brand}} {{$maintenance->vehicle->model}}</p>
                        </td>
                        @if($showPage == 0)
                            @if($maintenance->vehicle->last_maintenance != null)
                                <td>{{date('d/m/Y',strtotime($maintenance->vehicle->last_maintenance))}}</td>
                            @else
                                <td>Nenhum registro</td>
                            @endif
                            <td>
                                @php
                                    $diff = strtotime($maintenance->date) - strtotime(date('Y-m-d'));
                                    $days = floor($diff/(60*60*24));
                                @endphp
                                @if($days >= 0)
                                    {{($diff == 0)? 'Hoje' : "Daqui {$days} dias " }}
                                @else
                                    {{"Atrasada a " . abs($days) ." dias"}}
                                @endif
                            </td>
                            <td class="text-end">
                                <button data-bs-toggle="modal" data-bs-target="#editModal"
                                        class="btn btn-sm  fw-bolder text-gray-700 btn-secondary-soft"
                                        wire:click="edit({{$maintenance->id}})">
                                    INFORMAÇÕES
                                </button>
                                <button class="btn btn-sm  fw-bolder mt-2 mt-sm-0 btn-success"
                                        wire:click="concluded({{$maintenance->id}})">
                                    MARCAR COMO CONCLUIDO
                                </button>
                            </td>
                        @else
                            <td>{{ date('d/m/Y',strtotime($maintenance->date)) }}</td>
                            <td class="text-end">
                                <button data-bs-toggle="modal" data-bs-target="#editModal"
                                        class="btn btn-sm   text-gray-700 fw-bolder btn-secondary-soft"
                                        wire:click="edit({{$maintenance->id}})">
                                    INFORMAÇÕES
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#pendingModal"
                                        class="btn btn-sm fw-bolder mt-2 mt-sm-0 btn-warning"
                                        wire:click="edit({{$maintenance->id}})">
                                    MARCAR COMO PENDENTE
                                </button>
                            </td>
                        @endif

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">Nenhum registro encontrado</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        {{$maintenances->links('livewire::bootstrap')}}
    </div>
</div>
