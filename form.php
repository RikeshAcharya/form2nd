<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected to MySQL server successfully.<br>";
    }

    // Check if database exists
    $result = $conn->query("SHOW DATABASES LIKE '$db_name'");
    if ($result->num_rows == 0) {
        // Database does not exist, so create it
        $sql = "CREATE DATABASE $db_name";
        if ($conn->query($sql) === TRUE) {
            echo "Database '$db_name' created successfully.<br>";
        } else {
            echo "Error creating database: " . $conn->error . "<br>";
        }
    } else {
        echo "Database '$db_name' already exists.<br>";
    }

    // Select the database
    $conn->select_db($db_name);

    // Check if the database is selected
    if ($conn->errno) {
        echo "Error selecting database: " . $conn->error . "<br>";
    } else {
        echo "Database '$db_name' is selected successfully.<br>";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
