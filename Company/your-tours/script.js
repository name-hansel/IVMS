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
      //   delete tour here
      axios
        .delete("http://localhost/IVMS-API/API/tour/deleteTour.php", {
          params: {
            tour_id: value,
          },
        })
        .then((response) => {
          let confirm = response.data.message === "Tour deleted" ? true : false;
          if (confirm) {
            swal("Tour Deleted");
            location.reload();
          } else {
            swal("Tour Not Deleted", "error");
          }
        });
    });
  });
});
