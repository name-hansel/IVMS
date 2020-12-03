const formCompanyValidation = () => {
  let email = document.signup.email.value;
  let password = document.signup.password.value;
  let phn = document.signup.phn.value;
  let company = document.signup.company.value;
  let description = document.signup.description.value;
  let result = true;

  if (
    email === "" ||
    !email.match(
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
    )
  ) {
    document.getElementById("email-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("email-error").style.visibility = "hidden";

  if (
    password === "" ||
    !password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)
  ) {
    document.getElementById("password-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("password-error").style.visibility = "hidden";

  if (
    phn === "" ||
    !phn.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)
  ) {
    document.getElementById("phn-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("phn-error").style.visibility = "hidden";

  if (company.length > 120) {
    document.getElementById("company-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("company-error").style.visibility = "hidden";

  if (description.length > 120) {
    document.getElementById("desc-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("desc-error").style.visibility = "hidden";

  return result;
};

const formCoordinatorValidation = () => {
  let email = document.signup.email.value;
  let password = document.signup.password.value;
  let phn = document.signup.phn.value;
  let college = document.signup.college.value;

  let result = true;
  if (
    email === "" ||
    !email.match(
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
    )
  ) {
    document.getElementById("email-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("email-error").style.visibility = "hidden";

  if (
    password === "" ||
    !password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)
  ) {
    document.getElementById("password-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("password-error").style.visibility = "hidden";

  if (
    phn === "" ||
    !phn.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)
  ) {
    document.getElementById("phn-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("phn-error").style.visibility = "hidden";

  if (college.length > 120) {
    document.getElementById("college-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("college-error").style.visibility = "hidden";

  return result;
};
