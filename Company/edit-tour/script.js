var today = new Date();
console.log("HELLO");
var lastDate = new Date(today.getFullYear(), today.getMonth(0), 1);
$(document).ready(function () {
  $("#datepicker").datepicker({ minDate: 0, maxDate: "+1M" });
  $("#datepicker").datepicker("option", "dateFormat", "d-m-yy");
  //TODO fix date
  $("#datepicker").datepicker("setDate", $("#defaultDate").val());
});

function formValidation() {
  // console.log("hello?");
  let name = document.tour.name.value;
  let branch = document.tour.branch.value;
  let address = document.tour.place.value;
  let number = document.tour.number_people.value;
  let date = document.tour.available_days.value;
  let rate = document.tour.rate.value;
  let description = document.tour.description.value;
  let result = true;

  if (name === " " || name.length < 5 || name.length > 30) {
    document.getElementById("name-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("name-error").style.visibility = "hidden";

  let branchformat = /^[a-zA-Z]+$/;
  if (
    branch === " " ||
    branch.length < 5 ||
    branch.length > 30 ||
    !branch.match(branchformat)
  ) {
    document.getElementById("branch-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("branch-error").style.visibility = "hidden";

  if (address === " " || address.length < 5) {
    document.getElementById("address-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("address-error").style.visibility = "hidden";

  let numberformat = /^[0-9]+$/;
  if (number === " " || !number.match(numberformat)) {
    document.getElementById("capacity-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("capacity-error").style.visibility = "hidden";

  let rateformat = /^[0-9]+$/;
  if (rate === " " || !rate.match(rateformat)) {
    document.getElementById("rate-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("rate-error").style.visibility = "hidden";

  // TODO add validation so the date is one month from today
  if (result) {
    // open confirmation modal here and redirect
    let tourData = {
      tour_id: $("#tour_id").val(),
      name,
      branch,
      place: address,
      number_people: number,
      available_days: date,
      rate,
      description,
    };
    console.log(tourData);
    // editTour(tourData);
  }
  return false;
}

function editTour(tourData) {
  axios({
    method: "put",
    url: "http://localhost/IVMS-API/API/tour/putEditTour.php",
    data: tourData,
  })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.error(error);
    });
}
