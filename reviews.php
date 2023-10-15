<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reviews</title>
</head>

<body>

    <h2>Reviews</h2>

    <form action="process_review.php" method="post">
        <label for="name">Fullname:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Average</option>
            <option value="4">4 - Good</option>
            <option value="5">5 - Excellent</option>
        </select><br><br>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit Review">
    </form>

</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  database credentials
     require_once("config.php");

    // Create connection
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and validate form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Insert review record
    $query_insert_review = "INSERT INTO reviews (name, rating, comment)
                            VALUES ('$name', '$rating', '$comment')";

    if ($conn->query($query_insert_review) === TRUE) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $query_insert_review . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>