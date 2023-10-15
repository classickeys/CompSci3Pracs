    // Function to show the appointment modal and populate it with data
    function showAppointmentModal(doctor, specialty, timeSlots) {
        const modal = document.getElementById('appointment-modal');
        const form = modal.querySelector('form');
        const doctorInput = form.querySelector('#doctor');
        const specialtyInput = form.querySelector('#specialty');
        const timeSlotsInput = form.querySelector('#time-slots');

        doctorInput.value = doctor;
        specialtyInput.value = specialty;
        timeSlotsInput.value = timeSlots;

        modal.style.display = 'block';
    }

    // Function to close the appointment modal
    function closeAppointmentModal() {
        const modal = document.getElementById('appointment-modal');
        modal.style.display = 'none';
    }

    // Add click event listeners to the "Book Now" buttons
    const bookButtons = document.querySelectorAll('.book-button');
    bookButtons.forEach(button => {
        button.addEventListener('click', () => {
            const doctor = button.getAttribute('data-doctor');
            const specialty = button.getAttribute('data-specialty');
            const timeSlots = button.getAttribute('data-time-slots');
            showAppointmentModal(doctor, specialty, timeSlots);
        });
    });

    // Handle form submission
    const appointmentForm = document.getElementById('appointment-form');
    appointmentForm.addEventListener('submit', function (e) {
        e.preventDefault();
        // Handle form submission logic here
        alert('Form submitted successfully');
        closeAppointmentModal();
    });