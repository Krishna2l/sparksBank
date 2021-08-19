<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/history.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <title>KeepSafe Sparks Bank</title>
    
</head>
<?php include('nav.php') ?>
<body>
    <div class="container">
        <h1 id="histitle">TRANSACTION HISTORY</h1>
        <br>
        <table class="table table-dark table-striped">
            <thead>
                <tr class="font-italic">
                    <th scope="col">SL.NO</th>
                    <th scope="col">DEBITED FROM</th>
                    <th scope="col">CREDITED TO</th>
                    <th scope="col">AMOUNT TRANSFERRED</th>
                    <th scope="col">DATE AND TIME</th>
                </tr>
            </thead>
            <tbody>
                <?php
		require_once('connect.php');
		$result = $conn->prepare("SELECT * FROM history ORDER BY slno ASC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
                <tr>
                    <th scope="row"><label>
                            <?php echo $row['slno']; ?>
                        </label></th>
                    <td><label>
                            <?php echo $row['sender']; ?>
                        </label></td>
                    <td><label>
                            <?php echo $row['receiver']; ?>
                        </label></td>
                    <td><label>
                            <?php echo $row['amount']; ?>
                        </label></td>
                        <td><label>
                            <?php echo $row['datetime']; ?>
                        </label></td>
                </tr>
                <?php } ?>
            </tbody>
            <table>
    </div>
</body>
</html>