
<?php 
$insert = false;
if(isset($_POST['sender'])){
require_once('connect.php');
$sender= $_POST['sender'];
$receiver = $_POST['receiver'];
$amount=$_POST['amount'];
$sql="INSERT INTO `history` (`sender`, `receiver`, `amount`,`datetime`) VALUES ('$sender', '$receiver', '$amount',current_timestamp());";
$sqlquery = "UPDATE `customers` SET `Balance`=Balance-$amount WHERE `Name`='$sender' ";
$query = "UPDATE `customers` SET Balance=`Balance`+$amount WHERE `Name`='$receiver'";
if($sender == $receiver)
{
    echo '<script type ="text/JavaScript">';  
    echo 'window.location = "transfer.php";';
    echo 'alert("Transaction failed! Sender and Receiver cannot be same")';      
    echo '</script>';  
}
else if($sender=="---Select---" || $receiver=="---Select---") {
    echo '<script type ="text/JavaScript">';  
    echo 'window.location = "transfer.php";';
    echo 'alert("Transaction failed! Insufficient Balance")';      
    echo '</script>'; 
}

else if($amount<=0){
    echo '<script type ="text/JavaScript">';  
    echo 'window.location = "transfer.php";';
    echo 'alert("Transaction failed! Amount must be greater than zero")';      
    echo '</script>'; 
}
else
{
    if($conn->query($sql)== true){
    //echo "Successfully inserted";
    $conn->query($sqlquery);
    $conn->query($query);
    $insert= true;
    
    echo '<script type ="text/JavaScript">';  
    echo 'window.location = "index.php";';
    echo 'alert("Transaction Successful")';  
    echo '</script>';   
 }
     else{
             echo "ERROR: $sql <br> $conn->error";
     }
$conn->close();
}
     
}
?>

