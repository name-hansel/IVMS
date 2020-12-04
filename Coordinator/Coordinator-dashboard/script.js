function formValidation() {
  let number_people = document.tour.number_people.value;
  let max = document.tour.max_people.value;
  console.log(number_people, max);
  let result = true;
  if (int(number_people) > int(max)) {
    document.getElementById("number-error").style.visibility = "visible";
    result = false;
  } else {
    document.getElementById("number-error").style.visibility = "hidden";
    result = true;
  }
  return result;
}
