<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    $lrn = $_POST["lrn"]; 

    require_once "database.php";

    $errors = array();

    

   
    $sql = "SELECT * FROM registrar WHERE lrn = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $lrn);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);

        if ($rowCount > 0) {
            array_push($errors, "LRN already exists!");
        }

        mysqli_stmt_close($stmt);
    } else {
        array_push($errors, "Error: " . mysqli_error($conn));
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        
        $sql = "INSERT INTO registrar (lrn) VALUES (?)";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $lrn);
            mysqli_stmt_execute($stmt);

            
            echo "<div class='alert alert-success'>LRN registration successful!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>
