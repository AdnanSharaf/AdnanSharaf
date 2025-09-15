<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $n=$_POST["name"];
    $e=$_POST["email"];
    $m=$_POST["message"];
    $conn=new mysqli("localhost","root","","cep");
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    $stmt=$conn->prepare("INSERT INTO messages (name,email,message) VALUES (?,?,?)");
    $stmt->bind_param("sss",$n,$e,$m);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Data</title>
<link rel="stylesheet" href="display.css">
</head>
<body>
<div class="result-box">
<h2>Submitted Details</h2>
<p><strong>Name:</strong> <?php echo $n; ?></p>
<p><strong>Email:</strong> <?php echo $e; ?></p>
<p><strong>Message:</strong> <?php echo nl2br($m); ?></p>
</div>
</body>
</html>
