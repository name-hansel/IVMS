function changePassword(newP) {
  axios({
    method: "put",
    url: "http://localhost/IVMS-API/API/company/putCompanyHash.php",
    data: {
      password: newP,
      company_id: companyID,
    },
  })
    .then((response) => {
      if (response.data.message === "Company password changed.") {
        swal("Success!", "Password has been updated", "success");
        setTimeout(() => {
          window.location.href = "../company-dashboard/company-dashboard.php";
        }, 1000);
      } else {
        swal("Error", "Some error has occurred", "error");
        setTimeout(() => {
          window.location.href = "../company-dashboard/company-dashboard.php";
        }, 1000);
      }
    })
    .catch((error) => {
      console.error(error);
      swal("Error", "Some error has occurred", "error");
      setTimeout(() => {
        window.location.href = "../company-dashboard/company-dashboard.php";
      }, 1000);
    });
}
function formValidation() {
  let current = document.password.current.value;
  let newP = document.password.new.value;
  let confirm = document.password.confirm.value;
  let result = true;

  if (md5(current) != currentPassword) {
    document.getElementById("current-error").style.visibility = "visible";
    result = false;
  } else {
    document.getElementById("current-error").style.visibility = "hidden";
  }

  let newFormat = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
  if (!newP.match(newFormat)) {
    document.getElementById("new-error").style.visibility = "visible";
    result = false;
  } else {
    document.getElementById("new-error").style.visibility = "hidden";
  }

  if (confirm != newP) {
    document.getElementById("confirm-error").style.visibility = "visible";
    result = false;
  } else {
    document.getElementById("confirm-error").style.visibility = "hidden";
  }

  if (current === newP) {
    document.getElementById("same-error").style.visibility = "visible";
    result = false;
  } else {
    document.getElementById("same-error").style.visibility = "hidden";
  }

  if (result) {
    newP = md5(newP);
    changePassword(newP);
  }
  return false;
}
