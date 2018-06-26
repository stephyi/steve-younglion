<?php
session_start();

$Db = "steveyounglion";
$user = "FabianMuli";
$password = "1LoveFabian";
$host = "localhost";

$user_name = "";
$email = "";
$item_name = "";
$total_price = "";

$conn = mysqli_connect($host, $user, $password, $Db);

if(isset($_SESSION['shirt'])) {
    $quantity_shirt = $_SESSION['quantity_shirt'];
    $shirtname=$_SESSION['shirt'];
    $sql_shirts="SELECT * FROM shirts WHERE name=('$shirtname')";
    $sql_shoes="SELECT * FROM shoes WHERE name=('$shirtname')";
    $sql_trousers="SELECT * FROM trousers WHERE name=('$shirtname')";
    $results=mysqli_query($conn,$sql_shirts);
    $results_shirt=mysqli_fetch_array($results);

    if(isset($_GET['delete_shirt'])) {
    $quantity_shirt--;
    if($quantity_shirt <= 0) {
        unset($_SESSION['shirt']);
    }
}
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body class="text-light" style="background-color:#2A2B30">
    <div class="container mt-5 pt-5">
        <h4 class="text-center"> SHOPPING CART</h4>
      <form action="#" method="POST" >
        <table style="width=75%" class="table">
        <tr>
         <th>Item Name</th>
         <th>Brand</th>
         <th>Quantity</th>
        <th>Price</th>

        </tr>
        <?php if(isset($_SESSION['shirt'])){
            ?>
        <tr>      
            <td><?php echo $results_shirt['name']; ?></td>
            <td><?php echo $results_shirt['brand']; ?></td> 
            <td><?php echo $quantity_shirt; ?></td>
            <td><?php echo $results_shirt['price'] * $quantity_shirt; ?></td>
            <td><a href="?delete_shirt=<?php $results_shirt['name']; ?>">delete item</td>

        </tr>
        <?php } ?>

        </table>
    </form>
    <div class="text-center pt-5 mt-5">
        <a href="shop.php"><i class="fa fa-arrow-left"></i>Back to Shop</a>

    </div>
    </div>

    

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js "></script>
    <script></script>

</body>
</html>