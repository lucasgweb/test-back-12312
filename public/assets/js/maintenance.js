window.addEventListener('added', (e) => {
    $.notify("Manutenção agendada com sucesso!", "success");
    $('#newModal').modal('hide');
});

window.addEventListener('updated', (e) => {
    $.notify("Atualizações salvas com sucesso!", "success");
    $('#editModal').modal('hide');
});

window.addEventListener('concluded', (e) => {
    $.notify("Manutenção concluida!", "success");
});
window.addEventListener('pending', (e) => {
    $.notify("Manutenção marcada como pendente!", "info");
    $('#pendingModal').modal('hide');
});
