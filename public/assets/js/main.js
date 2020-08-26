function toLanding() {
    window.location.replace("/");
}

$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3000d'
});
