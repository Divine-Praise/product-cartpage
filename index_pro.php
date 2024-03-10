<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



    <?php
        $server = "localhost";
        $user = "root";
        $password = "";

        $connect = mysqli_connect($server, $user, $password);

        if(!$connect){
            die("Unable to connect to the data base" . mysqli_connect_error($connect)); 
        }

        $sql = "CREATE DATABASE IF NOT EXISTS dbcart";

        if(!mysqli_query($connect, $sql)){
            die("Error: Unable to connect to the server");
        }

        $sql2 = "USE dbcart";
        if(!mysqli_query($connect, $sql2)){
            die("Error: Unable to connect to the server");
        }

        echo "<h1>Database created successfully. Cart is Active</h1>";
        
        $sql3 = "CREATE TABLE IF NOT EXISTS cart(
            id INT AUTO_INCREMENT PRIMARY KEY,
            productimg VARCHAR(200) NOT NULL,
            productname VARCHAR(100) NOT NULL,
            productprice INT(100) NOT NULL
            )";

        if(mysqli_query($connect, $sql3)){
            $productimg = $_REQUEST['productimg'];
            $productname = $_REQUEST['productname'];
            $productprice = $_REQUEST['productprice'];
            
            $sql4 = "INSERT INTO cart (productimg, productname, productprice) VALUE('$productimg', '$productname', '$productprice')";
              
            if(mysqli_query($connect, $sql4)){
                echo "1 record added successfully";
                
            }else{
                die("Error: Unable to transfer data to database");
            }
            }else{
                echo "Unable to create table" . mysqli_error($connect);
            }
            
        header("location: index.php");

    ?>

</body>
</html>