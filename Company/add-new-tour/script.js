var today = new Date();
var lastDate = new Date(today.getFullYear(), today.getMonth(0), 1);
$(function () {
  $("#datepicker").datepicker({ minDate: 0, maxDate: "+1M" });
  $("#datepicker").datepicker("option", "dateFormat", "d MM yy");
});

const dialogAndAdd = ({
  name,
  branch,
  address,
  number,
  date,
  rate,
  description,
}) => {
  axios({
    method: "post",
    url: "https://industrialvisit-api.herokuapp.com/API/tour/postNewTour.php",
    data: {
      name,
      branch,
      company_id: companyID,
      available_days: date,
      place: address,
      number_people: number,
      rate,
      description,
    },
  })
    .then(function (response) {
      if (response.data.message === "Tour Created") {
        swal("Success!", "Tour has been created!", "success");
        setTimeout(function () {
          window.location.href = "../company-dashboard/company-dashboard.php";
        }, 1000);
      } else {
        console.log(response);
        swal("Error", "Some error has occured", "error");
      }
    })
    .catch(function (error) {
      swal("Error", "Some error has occured", "error");
    });
  setTimeout(function () {
    window.location.href = "../company-dashboard/company-dashboard.php";
  }, 5000);
};

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
  if (Math.abs(difference) > 30) {
    document.getElementById("date-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("date-error").style.visibility = "hidden";

  if (result) {
    let tourData = {
      name,
      branch,
      address,
      number,
      date,
      rate,
      description,
    };
    dialogAndAdd(tourData);
  }
  return false;
}
