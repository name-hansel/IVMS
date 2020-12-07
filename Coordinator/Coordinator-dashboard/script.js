function formValidation() {
  let number_people = document.tour.number_people.value;
  let max = document.tour.max_people.value;

  let result = true;
  if (number_people > max || number_people <= 0) {
    document.getElementById("number-error").style.visibility = "visible";
    result = false;
  } else {
    document.getElementById("number-error").style.visibility = "hidden";
  }
  return result;
}
