$(document).ready(function () {
  let tour_id;
  $(".delete").click(function () {
    tour_id = this.id;
    swal("Delete this tour?", {
      buttons: {
        cancel: {
          text: "Go back",
          value: null,
        },
        confirm: {
          text: "Confirm",
          value: tour_id,
        },
      },
    }).then((value) => {
      if (value) {
        axios
          .get("http://localhost/IVMS-API/API/tour/deleteTour.php", {
            params: {
              tour_id: value,
            },
          })
          .then((response) => {
            if (response.data.message === "Tour deleted") {
              swal("Success", "Tour deleted", "success");
              setTimeout(() => {
                location.reload();
              }, 4000);
            } else {
              swal("Error", "Some error has occured", "error");
              setTimeout(() => {
                location.reload();
              }, 4000);
            }
          });
      }
    });
  });
});
