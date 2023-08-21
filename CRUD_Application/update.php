<?php
include "config.php";

// Check if the 'update' button is clicked
if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $user_id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use backticks (`) instead of single quotes (') for table and column names
    $sql = "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `password` = '$password' WHERE `id` = '$user_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Record Updated Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if the 'id' is set in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Use backticks (`) instead of single quotes (') for table and column names
    $sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $first_name = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
        }

        // Display the update form
        ?>
        <html>
        <head>
            <title>User Update Form</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        </head>
        <body>
            <div class="container">
                <h2>User Update Form</h2>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <fieldset>
                        <legend> Personal Information: </legend>
                        First Name:<br>
                        <input type="text" name="firstname" value="<?php echo $first_name; ?>">
                        <br>
                        Last Name:<br>
                        <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                        <br>
                        Email:<br>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                        <br>
                        Password:<br>
                        <input type="password" name="password" value="<?php echo $password; ?>">
                        <br>
                        Gender:<br>
                        <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> >Male
                        <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female
                        <br><br>
                        <input type="submit" name="update" value="Update">
                    </fieldset>
                </form>
            </div>
        </body>
        </html>
    <?php
    } else {
        // If the 'id' is not valid, redirect the user back to the view.php page
        header('Location: view.php');
    }
}
?>
