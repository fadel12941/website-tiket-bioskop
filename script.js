document.addEventListener('DOMContentLoaded', () => {
    fetch('process.php?action=getMovies')
        .then(response => response.json())
        .then(data => {
            const movieSelect = document.getElementById('movie');
            const moviesDiv = document.getElementById('movies');

            data.forEach(movie => {
                // Add to dropdown
                const option = document.createElement('option');
                option.value = movie.id;
                option.textContent = `${movie.title} (${new Date(movie.show_time).toLocaleString()})`;
                movieSelect.appendChild(option);

                // Display movie details
                const movieDiv = document.createElement('div');
                movieDiv.innerHTML = `
                    <h3>${movie.title}</h3>
                    <p>${movie.description}</p>
                    <p><strong>Waktu Tayang:</strong> ${new Date(movie.show_time).toLocaleString()}</p>
                `;
                moviesDiv.appendChild(movieDiv);
            });
        });
});

function submitBooking(event) {
    event.preventDefault();

    const formData = new FormData(document.getElementById('bookingForm'));

    fetch('process.php?action=bookTicket', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Pemesanan Berhasil!');
            } else {
                alert('Pemesanan Gagal!');
            }
        });
}