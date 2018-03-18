        /* $(document).ready(function() {
        function convert(){
          var usd = $('#acf-field_5a1568deab1d7').val();
          var kurs = $('#acf-field_5a1570eaccdf8').val();
          $('#_regular_price').val(usd*kurs);
          return;
        }
      });
      $(document).ready(function() {
        convert()
      }); */
      
      
      document.getElementById('acf-field_5a8eb218574c7').onchange = function() {
    var usd = $('#acf-field_5a8eb218574c7').val();
    var kurs = $('#acf-field_5a8eb351b3027').val();
    var pln = usd*kurs;
    $('#_regular_price').attr('value',pln.toFixed(2));
    return;
}