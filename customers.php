<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/customers.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <title>KeepSafe Sparks Bank/ Customer Details</title>
</head>

<?php include('nav.php') ?>

<body>
    <div class="container">
        <h1 class="custitle">CUSTOMER DETAILS</h1>
        <br>
        <table class="table table-dark table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">BALANCE</th>
                </tr>
            </thead>
            <tbody>
                <?php
		require_once('connect.php');
		$result = $conn->prepare("SELECT * FROM customers ORDER BY ID ASC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
                <tr class="details">
                    <th scope="row"><label>
                            <?php echo $row['ID']; ?>
                        </label></th>
                    <td><label>
                            <?php echo $row['Name']; ?>
                        </label></td>
                    <td  class="font-italic"><label>
                            <?php echo $row['EMail']; ?>
                        </label></td>
                    <td><label>
                            <?php echo $row['Balance']; ?>
                        </label></td>
                </tr>
                <?php } ?>
            </tbody>
            <table>
    </div>
</body>

</html>