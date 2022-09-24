<?php
require 'connection.php';
$curId = $_GET['id'];
$sql = $conn->query("SELECT * FROM patients WHERE id=$curId");
$patient = $sql->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information</title>
    <style>
        .patient {
            width:80%;
            margin: 50px auto;

        }

        .patient img {
            width:200px;
            height:200px;
        }

        p {
            font-size:23px;
        }

        .buttons {
            display: flex;
            margin: 10px;
        }

        .buttons input[type='submit'] {
            margin:0 10px;
            font-size: 23px;
            color: rgb(58, 35, 35);
            background-color: rgb(68, 156, 232);
            cursor: pointer;
            border: none;
            padding: 10px;
            border-radius: 10px;
        }

        .buttons input[type='submit']:hover {
            background-color: rgba(68, 156, 232,0.6);
        }
    </style>
</head>
<body>
    <div class="patient">
        <h1>Patient Information</h1>
        <img src="https://aui.atlassian.com/aui/8.8/docs/images/avatar-person.svg">
        <p>ID : <?php echo $patient['id']; ?></p>
        <p>Name : <?php echo $patient['name']; ?></p>
        <p>Age : <?php echo $patient['age']; ?></p>
        <p>Address : <?php echo $patient['address']; ?></p>
        <p>Entry Time To Hospital : <?php echo $patient['entry_time']; ?></p>
        <p>Last Update : <?php echo $patient['last_update']; ?></p>
        <div class="buttons">
                <form action="update.php" method="post">
                    <input type="hidden" name="pId" value=<?php echo $patient[
                        'id'
                    ]; ?>>
                    <input type="submit" name="pUpdate" value="Update">
                </form>
                <form action="delete.php" method="post">
                    <input type="hidden" name="pId" value=<?php echo $patient[
                        'id'
                    ]; ?>>
                    <input type="submit" name="pDelete" value="Delete">
            </form>
            </div>
    </div>
</body>
</html>