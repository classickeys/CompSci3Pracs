<?php include_once("nav.php") ?>

<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database configuration file
    require_once("config.php");

    // Create a database connection
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email and password (you should implement proper validation)

    // Hash the submitted password using the same method as in your registration script
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM team8.doctor WHERE email = ? ");
    $stmt->bind_param("s", $email, );

    $stmt1 = $conn->prepare("DELETE FROM team8.user WHERE email = ?  AND password = ?");
    $stmt1->bind_param("ss", $email, $hashedPassword);

     
 
    // Execute the delete
    if ($stmt->execute()) {
        if ($stmt1->execute()) {
            session_unset();
            session_destroy();
            setFlashMessage('Success', 'Record deleted');
            header("Location: index.php");
        }
    } else {
        setFlashMessage('Error', 'Error deleting record: ' . $stmt->error);
    header("Location: dashboard.php");
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Handle non-POST requests if needed
    echo "Invalid request method";
}
?>
