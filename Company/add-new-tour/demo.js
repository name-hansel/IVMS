axios({
  method: "post",
  url: "http://localhost/IVMS-API/API/tour/postNewTour.php",
  data: {
    name: "Hello",
    branch: "Hello",
    companyID,
    available_days: date,
    place: address,
    number_people: number,
    rate,
    description,
  },
})
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error.message);
  });
