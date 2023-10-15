<?php
DEFINE("SERVERNAME","cs3-dev.ict.ru.ac.za");
DEFINE("USERNAME","G20G1609");
DEFINE("PASSWORD","G20G1609");
DEFINE("DATABASE","team8");


$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE) or die("<div class='alert alert-danger' role='alert'>Could not connect to the database!</div>");

?>