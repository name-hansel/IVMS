$(document).ready(function () {
  $("#datepicker").datepicker({ minDate: 0, maxDate: "+1M" });
  $("#datepicker").datepicker("option", "dateFormat", "d MM yy");
  let defDate = new Date($("#defaultDate").val());
  $("#datepicker").datepicker("setDate", defDate);
});

function formValidation() {
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

  if (branch === " " || branch.length < 5 || branch.length > 30) {
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

  let d = new Date(date);
  let current = new Date();
  let difference = (d - current) / (1000 * 3600 * 24);
  console.log(difference);
  if (Math.abs(difference) > 30) {
    document.getElementById("date-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("date-error").style.visibility = "hidden";

  if (result) {
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
    editTour(tourData);
  }
  return false;
}

function editTour(tourData) {
  axios({
    method: "put",
    url: "https://industrialvisit-api.herokuapp.com/API/tour/putEditTour.php",
    data: tourData,
  })
    .then(function (response) {
      if (response.data.message === "Tour edited") {
        swal("Success!", "Tour has been edited", "success");
        setTimeout(() => {
          window.location.href = "../your-tours/your-tours.php";
        }, 1000);
      } else {
        swal("Error", "Some error has occured", "error");
        setTimeout(() => {
          window.location.href = "../your-tours/your-tours.php";
        }, 1000);
      }
    })
    .catch(function (error) {
      console.error(error);
      swal("Error", "Some error has occured", "error");
      setTimeout(() => {
        window.location.href = "../your-tours/your-tours.php";
      }, 1000);
    });
}
