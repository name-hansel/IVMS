var today = new Date();
var lastDate = new Date(today.getFullYear(), today.getMonth(0), 1);
$(function () {
  $("#datepicker").datepicker({ minDate: 0, maxDate: "+1M" });
  $("#datepicker").datepicker("option", "dateFormat", "DD, d MM, yy");
});
