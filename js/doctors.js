const form = document.getElementById("patientForm");

form.addEventListener("submit", function (event) {
  const firstName = document.getElementById("firstName").value;
  const lastName = document.getElementById("lastName").value;
  const age = document.getElementById("age").value;

  if (firstName === "" || lastName === "" || age === "") {
    event.preventDefault(); // Prevent form submission
    alert("Please fill in all required fields.");
  }
});