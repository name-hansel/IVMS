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

  return result;
}

function goBack() {
  window.location.href = "../edit-profile/edit-profile.php";
}
