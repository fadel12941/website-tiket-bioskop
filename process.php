<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bioskop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_GET['action'] === 'getMovies') {
    $result = $conn->query("SELECT * FROM movies");
    $movies = [];
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
    echo json_encode($movies);
}

if ($_GET['action'] === 'bookTicket') {
    $name = $_POST['name'];
    $movie_id = $_POST['movie'];
    $seats = $_POST['seats'];

    $stmt = $conn->prepare("INSERT INTO bookings (movie_id, name, seats) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $movie_id, $name, $seats);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

$conn->close();
?>