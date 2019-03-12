//initialize all tooltips

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});


function uCletter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}