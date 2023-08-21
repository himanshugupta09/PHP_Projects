<?php
include "config.php";

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO users (firstname, lastname, email, password, gender) VALUES ('$first_name', '$last_name', '$email', '$password', '$gender')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
    <body>
        <h2> Sign up Form </h2>

        <form action="" method="POST">
            <fieldset>
                <legend> Personal Information: </legend>
                First Name:<br>
                <input type="text" name="first_name">
                <br>
                Last Name:<br>
                <input type="text" name="last_name">
                <br>
                Email:<br>
                <input type="email" name="email">
                <br>
                Password:<br>
                <input type="password" name="password">
                <br>
                Gender:<br>
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="female">Female
                <br><br>
                <input type="submit" name="submit" value="submit">
            </fieldset>
        </form>
    </body>
</html>
