<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="forma.php" method="post">
        name<br>
        <input type="text" name="name"><br>
        min<br>
        <input type="text" name="min"><br>
        max<br>
        <input type="text" name="max"><br>
        description<br>
        <input type="text" name="description"><br>
        measure<br>
        <input type="text" name="measure">
        <input type="submit" value="Испрати">
    </form> 
</body>
</html>

<?php
$servername = "46.217.240.242";
$username = "hakaton";
$password = "hakaton";
$dbname = "hakaton";

$name = $_POST['name'];
$max = $_POST['max'];
$min = $_POST['min'];
$desc = $_POST['description'];
$measure = $_POST['measure'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO items(name, max, min, description, measure) VALUES ('$name','$max','$min','$desc','$measure')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>