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
            max-width: 800px;
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
    $patientID = $_POST['pId'];
    $sql = $conn->query(
        "SELECT id,name,age,address
        FROM patients
        WHERE id=$patientID"
    );
    $patient = $sql->fetch_assoc();
    ?>
    <form method="post">
        <label for="">Patient ID :</label> <br>
        <input type="number" name="pId" value="<?php echo $patient[
            'id'
        ]; ?>" required> <br>
        <label for="">Patient Name :</label> <br>
        <input type="text" name="pName" value="<?php echo $patient[
            'name'
        ]; ?>" required> <br>
        <label for="">Patient Age :</label> <br>
        <input type="number" name="pAge" value="<?php echo $patient[
            'age'
        ]; ?>" required><br>
        <label for="">Patient Address :</label> <br>
        <input type="text" name="pAddress" value="<?php echo $patient[
            'address'
        ]; ?>" required><br>
        <input type="submit" name="pUpdate" value="Update">
    </form>
</body>
</html>

<?php try {
    if (isset($_POST['pUpdate'])) {
        $patientID = $_POST['pId'];
        $sql = $conn->prepare(
            "UPDATE patients SET id=?,name=?,age=?,address=? WHERE id=$patientID"
        );
        $sql->bind_param(
            'isis',
            $_POST['pId'],
            $_POST['pName'],
            $_POST['pAge'],
            $_POST['pAddress']
        );
        $sql->execute();
        header('location:./index.php');
    }
} catch (Exception $e) {
    $e->getMessage();
}

?>
