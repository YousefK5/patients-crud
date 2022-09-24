<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Landing Page</title>
</head>
<body>
    <header>
        <h2>List Of All Patients</h2>
        <a class='addPatient' href="create.php">Add New Patient</a>
    </header>
    <div class="cards">
    <?php
    $st = $conn->query('SELECT id , name FROM patients');
    if ($st) {
        while ($patient = $st->fetch_assoc()) { ?>
        <div class="card">
            <img src="https://aui.atlassian.com/aui/8.8/docs/images/avatar-person.svg">
            <p>Id : <?php echo $patient['id']; ?></p>
            <p>Name : <?php echo $patient['name']; ?></p>
            <a href="patient.php?id=<?php echo $patient[
                'id'
            ]; ?>">Show More Info</a>
            <div class="buttons">
                <form action="update.php" method="post">
                    <input type="hidden" name="pId" value=<?php echo $patient[
                        'id'
                    ]; ?>>
                    <input type="submit" name="pUp" value="Update">
                </form>
                <form action="delete.php" method="post">
                    <input type="hidden" name="pId" value=<?php echo $patient[
                        'id'
                    ]; ?>>
                    <input type="submit" name="pDel" value="Delete">
            </form>
            </div>
        </div>
        <?php }
    }
    ?> 
    </div>
</body>
</html>