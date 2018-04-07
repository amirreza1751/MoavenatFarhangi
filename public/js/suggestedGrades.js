$(document).ready(function() {
var counter = 0;
var temp = 0;
for (var i=1;i<=5;i++){
//     // var selector = '#1-'+i;
//     alert($('#' + '1-' + i).val());
    var value = $('#' + '1-' + i).val();
    if (isNumber(value)){
//     alert($(+"\"" +selector+ "\"").val());
//     // if ($("\"" +selector+ "\"").val() != "-"){
//         counter = counter + 1;
        alert($('#' + '1-' + i).val("3333333"));
        // temp += $('#' + '1-' + i).val();
// // alert('$("#1-"'+i+').val()');
// //
    }
//     // alert(counter);
//
// alert("\"" + "#1-" + i + "\"");
    // $("\"" + "#1-" + i + "\"").val('4');
}
    // var average = temp/counter.toFixed(2);
    // alert(average);
    // alert(counter);
//     $("#1").val("25");



});