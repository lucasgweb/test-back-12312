@extends('layouts.default',['title' => 'Home'])
@section('content')
    <main>
        <div class="container mt-5 pt-3">
            <h1 class="fs-1 fw-bolder">Manutenções futuras</h1>
            <h6 class="fs-6  mt-5">Manutenções previstas para os proximos 7 dias</h6>
            <hr class="mt-2 mb-4"/>
            <div class="table-responsive">
                <table class="table table-striped tab-pane  align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Veículo</th>
                        <th scope="col">Última manutenção</th>
                        <th scope="col">Proxima manutenção</th>
                    </tr>
                    </thead>
                    <tbody id="table-data">
                    </tbody>
                </table>
            </div>
            <div class="paginate d-flex justify-content-end">
                <a class="btn btn-secondary me-2" id="prevPage" href="">Anterior</a>
                <a class="btn btn-secondary" id="nextPage">Próximo</a>
            </div>

        </div>
    </main>
    @push('scripts')
        <script>

            $(document).ready(function (){
                table('{{route('api.show.maintenances')}}')
            })

            $(".paginate a").click(function (a){
                a.preventDefault()
               let page =  $(this).attr("href")

                table(page)
            })

            function table(url){
                $.ajax({
                    type: "GET",
                    url: url,
                    contentType: "application/json",
                }).done(function (response) {
                    let body = ""
                    if (response.links.prev == null){
                        $('#prevPage').addClass('d-none')
                    } else {
                        $('#prevPage').attr('href', response.links.prev).removeClass('d-none')
                    }

                    if (response.links.next == null) {
                        $('#nextPage').attr('href',"#").addClass('d-none')
                    } else {
                        $('#nextPage').attr('href', response.links.next).removeClass('d-none')
                    }
                    if (response.data.length > 0){
                        for (var i in response.data) {
                            body += "<tr>"
                            body += "<td> <span class='fw-900'>" + response.data[i].vehicle.plate + "</span><p>" + response.data[i].vehicle.brand + " " + response.data[i].vehicle.model + "</p></td>"
                            if (response.data[i].vehicle.last_maintenance) {
                                let data_last_maintenance = new Date(response.data[i].vehicle.last_maintenance);
                                body += "<td>" + data_last_maintenance.toLocaleDateString('pt-BR', {timeZone: 'UTC'}) + "</td>"
                            } else {
                                body += "<td>Nenhum registro</td>"
                            }
                            let data = new Date(response.data[i].date);
                            body += "<td>" +  data.toLocaleDateString('pt-BR', {timeZone: 'UTC'}) + "</td>"
                        }
                    } else {
                        body = "<tr><td colspan='5' class='text-center'>Nenhum registro encontrado</td></tr>"
                    }
                    $("#table-data").html(body)

                }).fail(function (err) {
                    console.log(err)
                });
            }
        </script>
    @endpush
@endsection


