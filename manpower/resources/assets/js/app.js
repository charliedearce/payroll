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

//TOASTER SUCCESS
$('#showtoastsuccess').click(function () {
 toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-center",
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
      var $systemmsg = $('#systemmsg');
      if ($('#msgtype').val() == 'success'){
        toastr.success($systemmsg.val())
      }else if($('#msgtype').val() == 'error'){
        toastr.error($systemmsg.val())
      }else if($('#msgtype').val() == 'info'){
        toastr.info($systemmsg.val())
      }else if($('#msgtype').val() == 'warning'){
        toastr.warning($systemmsg.val())
      }

});

$('#hehe').click(function () {
  alert('wtf');
});


$(document).ready(function(e){
$("#showtoast").trigger('click');
$("#showtoastsuccess").trigger('click');
});

//time picker
$(document).ready(function() {
    $('#su-in1').timepicker();
    $('#su-out1').timepicker();
    $('#su-bin1').timepicker();
    $('#su-bout1').timepicker();
    $('#mo-in1').timepicker();
    $('#mo-out1').timepicker();
    $('#mo-bin1').timepicker();
    $('#mo-bout1').timepicker();
    $('#tu-in1').timepicker();
    $('#tu-out1').timepicker();
    $('#tu-bin1').timepicker();
    $('#tu-bout1').timepicker();
    $('#we-in1').timepicker();
    $('#we-out1').timepicker();
    $('#we-bin1').timepicker();
    $('#we-bout1').timepicker();
    $('#tu-in1').timepicker();
    $('#tu-out1').timepicker();
    $('#tu-bin1').timepicker();
    $('#tu-bout1').timepicker();
    $('#fr-in1').timepicker();
    $('#fr-out1').timepicker();
    $('#fr-bin1').timepicker();
    $('#fr-bout1').timepicker();
    $('#sa-in1').timepicker();
    $('#sa-out1').timepicker();
    $('#sa-bin1').timepicker();
    $('#sa-bout1').timepicker();

    $('#su-in2').timepicker();
    $('#su-out2').timepicker();
    $('#su-bin2').timepicker();
    $('#su-bout2').timepicker();
    $('#mo-in2').timepicker();
    $('#mo-out2').timepicker();
    $('#mo-bin').timepicker();
    $('#mo-bout2').timepicker();
    $('#tu-in2').timepicker();
    $('#tu-out2').timepicker();
    $('#tu-bin2').timepicker();
    $('#tu-bout2').timepicker();
    $('#we-in2').timepicker();
    $('#we-out2').timepicker();
    $('#we-bin2').timepicker();
    $('#we-bout2').timepicker();
    $('#tu-in2').timepicker();
    $('#tu-out2').timepicker();
    $('#tu-bin2').timepicker();
    $('#tu-bout2').timepicker();
    $('#fr-in2').timepicker();
    $('#fr-out2').timepicker();
    $('#fr-bin2').timepicker();
    $('#fr-bout2').timepicker();
    $('#sa-in2').timepicker();
    $('#sa-out2').timepicker();
    $('#sa-bin2').timepicker();
    $('#sa-bout2').timepicker();
});