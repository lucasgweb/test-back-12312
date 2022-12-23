$("#type-vehicle").change(function () {
    let typeVehicle = $("#type-vehicle").val()

    $.get("https://parallelum.com.br/fipe/api/v1/" + typeVehicle + "/marcas", function (brands) {
        let optionsBrand = "<option disabled selected>Selecione a marca</option>"

        brands.forEach(function (brand) {
            optionsBrand = optionsBrand + "<option data-code-brand='" + brand.codigo + "' value='" + brand.nome + "'>" + brand.nome + "</option>"
        })
        $("#brand-select").html(optionsBrand);
    })

    $("#brand-select").change(function () {
        let brandVehicle = $("#brand-select option:selected").attr('data-code-brand')
        $.get("https://parallelum.com.br/fipe/api/v1/" + typeVehicle + "/marcas/" + brandVehicle + "/modelos", function (models) {

            let optionsModel = "<option disabled selected>Selecione o modelo</option>"

            models['modelos'].forEach(function (model) {
                optionsModel = optionsModel + "<option data-code-model='" + model.codigo + "' value='" + model.nome + "'>" + model.nome + "</option>"
            })
            $("#model-select").html(optionsModel);
        })
    })

    $("#model-select").change(function () {
        let modelVehicle = $("#model-select option:selected").attr('data-code-model');
        let brandVehicle = $("#brand-select option:selected").attr('data-code-brand')

        $.get("https://parallelum.com.br/fipe/api/v1/" + typeVehicle + "/marcas/" + brandVehicle + "/modelos/" + modelVehicle + "/anos", function (years) {

            let optionsYear = "<option disabled selected>Selecione o ano</option>"

            years.forEach(function (year) {
                optionsYear = optionsYear + "<option data-code-year='" + year.codigo + "' value='" + year.nome + "'>" + year.nome + "</option>"
            })

            $("#year-select").html(optionsYear);
        })
    })
})

window.addEventListener('resetInput', (e) => {
    $("#type-vehicle").html("<option selected disabled>Selecione o tipo</option>" +
        "<option value='carros'>Carro</option>" +
        "<option value='motos'>Moto</option>" +
        "<option value='caminhoes'>Caminhão</option>")

})


window.addEventListener('added', (e) => {
    $.notify("Veiculo cadastrado com sucesso!", "success");
    $('#newModal').modal('hide');
});

window.addEventListener('updated', (e) => {
    $.notify("Atualizações salvas com sucesso!", "success");
    $('#editModal').modal('hide');
});
