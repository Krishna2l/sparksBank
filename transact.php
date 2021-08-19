
<?php 
$insert = false;
if(isset($_POST['sender'])){
require_once('connect.php');
$sender= $_POST['sender'];
$receiver = $_POST['receiver'];
$amount=$_POST['amount'];
$sql="INSERT INTO `history` (`sender`, `receiver`, `amount`,`datetime`) VALUES ('$sender', '$receiver', '$amount',current_timestamp());";

if($sender == $receiver)
{
    echo '<script type ="text/JavaScript">';  
    echo 'window.location = "transfer.php";';
    echo 'alert("Sender and Receiver cannot be same")';      
    echo '</script>';  
}
else
{
    if($conn->query($sql)== true){
    //echo "Successfully inserted";
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

