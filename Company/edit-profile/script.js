function password() {
  window.location.href = "../change-password/change-password.php";
}
function editProfile(profile) {
  axios({
    method: "put",
    url:
      "https://industrialvisit-api.herokuapp.com/API/company/putCompanyDetails.php",
    data: profile,
  })
    .then((response) => {
      if (response.data.message == "Company details edited") {
        swal("Success!", "Profile has been edited", "success");
        setTimeout(() => {
          location.reload();
        }, 1000);
      } else {
        swal("Error", "Some error has occurred", "error");
      }
    })
    .catch((error) => {
      console.error(error);
      swal("Error", "Some error has occurred", "error");
    });
}

function formValidation() {
  let name = document.profile.name.value;
  let phone_number = document.profile.phone_number.value;
  let description = document.profile.description.value;
  let result = true;

  if (name === " " || name.length < 5 || name.length > 30) {
    document.getElementById("name-error").style.visibility = "visible";
    result = false;
  } else document.getElementById("name-error").style.visibility = "hidden";

  let numberformat = /^[0-9]+$/;
  if (
    phone_number === " " ||
    !phone_number.match(numberformat) ||
    phone_number.length != 10
  ) {
    document.getElementById("phone_number-error").style.visibility = "visible";
    result = false;
  } else
    document.getElementById("phone_number-error").style.visibility = "hidden";
  if (result) {
    let profile = {
      company_id: companyID,
      company: name,
      phone_number,
      description,
    };
    editProfile(profile);
  }
  return false;
}
