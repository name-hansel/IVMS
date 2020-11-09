$(document).ready(function () {
  let tour_id;
  $(".delete").click(function () {
    tour_id = this.id;
    swal("Delete this tour?", {
      buttons: {
        cancel: "Go back",
        confirm: {
          text: "Confirm",
          value: tour_id,
        },
      },
    }).then((value) => {
      axios
        .delete("http://localhost/IVMS-API/API/tour/deleteTour.php", {
          params: {
            tour_id: value,
          },
        })
        .then((response) => {
          location.reload();
        });
    });
  });
});
