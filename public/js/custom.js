//initialize all tooltips

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


function uCletter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}