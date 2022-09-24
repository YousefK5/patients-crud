<?php
require 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <style>
        body {
            text-align:center;
        }
        form {
            text-align:left;
            width:80%;
            margin:20px auto;
        }
        form input {
            width:100%;
            height:30px;
            margin-bottom:20px;
        }
        form label {
            font-size:22px;
        }

        input[type='submit'] {
            height:40px;
            font-size:24px;
            color: rgb(58, 35, 35);
            background-color: rgba(68, 156, 232,0.8);
            border-radius:5px;
            border:none;
            cursor:pointer;
        }

        input[type='submit']:hover {
            background-color: rgba(68, 156, 232,0.6);
        }
    </style>
</head>
<body>
    <?php
    $all = $conn->query('SELECT id From patients');
    $all = $all->fetch_all();
    ?>
    <form action="create.php" method="post">
        <label for="">Patient ID :</label> <br>
        <input type="number" name="pId" value=<?php echo $all[
            count($all) - 1
        ][0] + 1; ?> required> <br>
        <label for="">Patient Name :</label> <br>
        <input type="text" name="pName" required> <br>
        <label for="">Patient Age :</label> <br>
        <input type="number" name="pAge" required><br>
        <label for="">Patient Address :</label> <br>
        <input type="text" name="pAddress" required><br>
        <input type="submit" name="pAdd" value="Add Patient">
    </form>
</body>
</html>

<?php try {
    if (isset($_POST['pAdd'])) {
        $sql = $conn->prepare("INSERT INTO patients (id,name,age,address)
        VALUES (? , ? , ? , ?)");
        $sql->bind_param(
            'isis',
            $_POST['pId'],
            $_POST['pName'],
            $_POST['pAge'],
            $_POST['pAddress']
        );
        $sql->execute();
        $sql->close();
        header('location:./index.php');
    }
} catch (Exception $e) {
    $e->getMessage();
}
?>
