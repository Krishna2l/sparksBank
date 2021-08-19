<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="customers.css?v=<?php echo time(); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">

  <title>KeepSafe Sparks Bank/Transfer Money</title>
  </style>
</head>
<?php include('nav.php') ?>

<body>

  <div class="container" style="margin-top: 100px">
    <h1 class="trtitle text-center" style="font-family: 'Libre Baskerville', serif;">TRANSFER MONEY</h1>
    <br>
    <br>
    <form action="transact.php" method="POST">
      <div class="input-group input-group-lg mb-5">
        <div class="input-group-prepend">
          <span class="input-group-text">Debit From</span>
        </div>
        <select class="form-control" name="sender">
          <option value=" " disabled selected>---Select---</Option>
      <?php
		    require_once('connect.php');
        $result = $conn->prepare("SELECT * FROM customers ORDER BY ID ASC");
	     	$result->execute();
	      for($i=0; $row = $result->fetch(); $i++){ 
      ?>
          <option value="<?php echo $row['Name'];?>">
            <?php ?>
            <?php echo $row['Name'];?> (Balance :
            <?php echo $row['Balance'] ;?> Rs )
          </option>
      <?php
}
?>
        </select>
      </div>

      <div class="input-group  input-group-lg mb-5">
        <div class="input-group-append">
          <span class="input-group-text px-4">Credit To</span>
        </div>
        <select class="form-control" name="receiver">
          <option value=" " disabled selected>---Select---</Option>
        <?php
		      require_once('connect.php');
          $result = $conn->prepare("SELECT * FROM customers ORDER BY ID ASC");
		      $result->execute();
		      for($i=0; $row = $result->fetch(); $i++){ 
        ?>
          <option value="<?php echo $row['Name'];?>">
            <?php echo $row['Name'];?>
          </option>
          <?php
}
?>
        </select>
      </div>

      <div class="input-group input-group-lg mb-5">
        <div class="input-group-prepend">
          <span class="input-group-text px-5">Rs</span>
        </div>
        <input type="text" class="form-control" autocomplete="off" name="amount"
          aria-label="Amount (to the nearest dollar)">
        <div class="input-group-append">
          <span class="input-group-text">.00</span>
        </div>
      </div>
      <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Transfer">
    </form>
  </div>
</body>

</html>