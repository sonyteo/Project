<?php 
include('db.php');
?>
<!DOCTYPE html>
<html>

<head></head>

<body>
    <form method="post">
        <label>Email :</label>
        <input type="email" name="email" />
        <input type="submit" name="submit" value="Submit" />
    </form>
    <?php
    if (!isset($_POST["email"])) {
        $_POST["email"] = "";
    } else {
        $email = $_POST["email"];
        if (!empty($email) && $email !== "") {
            $sql = "INSERT INTO subscribe (sub_email) VALUES ('" . $email . "')";
            $conn->query($sql);
        }
    }
    ?>
</body>

</html>