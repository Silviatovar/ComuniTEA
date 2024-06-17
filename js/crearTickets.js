document.addEventListener('DOMContentLoaded', function () {
    const ticketForm = document.getElementById('ticketForm');

    ticketForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const openBy = document.getElementById('open_by').value;
        const email = document.getElementById('email').value;
        const mensaje = document.getElementById('mensaje').value;

        if (!openBy || !email || !mensaje) {
            alert('Por favor, complete todos los campos.');
            return;
        }

        const formData = new FormData(ticketForm);

        fetch('./php/Tickets.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
           alert("Ticket creado correctamente");
           
            if (data.includes('Ticket creado correctamente')) {
                ticketForm.reset();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error al crear el ticket.');
        });
    });
});
