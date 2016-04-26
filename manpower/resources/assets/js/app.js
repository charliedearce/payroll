$(".dropdown-button").dropdown();
$(".button-collapse").sideNav();
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
// NUMBER ONLY TXT FIELD onkeypress="return isNumberKey(event)"/>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
} 
//date picker
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100, // Creates a dropdown of 15 years to control year
    min: -99999999,
  // `true` sets it to today. `false` removes any limits.
  max: true,
  format: 'yyyy-mm-dd' 
  });
//select
$(document).ready(function() {
    $('select').material_select();
});
//TOASTER ERROR
$('#showtoast').click(function () {
 toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "50000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
  var $count = $('#errorcount');
  for (i = 0; i < $count.val(); i++) {
     var $msg = $('#msg'+ i);
     toastr.error($msg.val())
  }
});

$('#hehe').click(function () {
  alert('wtf');
});


$(document).ready(function(e){
$("#showtoast").trigger('click');
});