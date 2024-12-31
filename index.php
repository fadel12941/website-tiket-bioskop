<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pemesanan Tiket Bioskop</title>
</head>
<body>
    <div class="container">
        <h1>Pemesanan Tiket Bioskop</h1>
        <div id="movies">
            <!-- Movie list will be populated by JavaScript -->
        </div>
        <form id="bookingForm" onsubmit="submitBooking(event)">
            <h2>Pesan Tiket</h2>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            <label for="movie">Film:</label>
            <select id="movie" name="movie" required></select>
            <label for="seats">Jumlah Tiket:</label>
            <input type="number" id="seats" name="seats" min="1" required>
            <button type="submit">Pesan</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>