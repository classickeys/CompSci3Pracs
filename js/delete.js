document.addEventListener("DOMContentLoaded", function () {

  // Function to open the delete confirmation modal
  function openDeleteModal() {
    document.getElementById("deleteConfirmationModal").style.display = "block";
  }

  // Function to close the delete confirmation modal
  function closeDeleteModal() {
    document.getElementById("deleteConfirmationModal").style.display = "none";
  }

  

  // Attach click events to the "Delete Profile" button and "Confirm Deletion" button
  document
    .getElementById("deleteInfo")
    .addEventListener("click", openDeleteModal);
  
});
