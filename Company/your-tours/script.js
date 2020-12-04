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
          .get(
            "https://industrialvisit-api.herokuapp.com/API/tour/deleteTour.php",
            {
              params: {
                tour_id: value,
              },
            }
          )
          .then((response) => {
            if (response.data.message === "Tour deleted") {
              swal("Success", "Tour deleted", "success");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else {
              swal("Error", "Some error has occured", "error");
              setTimeout(() => {
                location.reload();
              }, 2000);
            }
          });
      }
    });
  });
});
