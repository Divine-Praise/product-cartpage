<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <nav>
        <div class="logo">
            <a href="index.php"><h2>Logo</h2></a>
        </div>
        <div class="link">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#" class="active">PRODUCT</a></li>
                <li><a href="#">CONTACT US</a></li>
            </ul>
        </div>
    </nav>

    <?php
        $server = 'localhost';
        $username = 'root';
        $pwd = '';
        $db = 'dbcart';

        $connect = mysqli_connect($server, $username, $pwd, $db);

        if(!$connect) {
            die('Error: Unable to coneect to database');
        }else{
            // echo "Connected to the database successfully";
        }

        $sq = "SELECT * FROM cart";
        $res = mysqli_query($connect, $sq);
        
        echo "<div class='product'>";
            if(mysqli_num_rows($res)>0){
                while($rec = mysqli_fetch_assoc($res)){
                    echo "<div class='cloth-product'>";
                    echo "<img id='img' src=". $rec['productimg'] . " class='product-img' >";
                    echo "<h2 class='product-title'>" . $rec['productname'] . "</h2>";
                    echo "<span class='price'>" . '$' . $rec['productprice'] . "</span>";
                    echo " <button type='button' class='add-cart'>ADD TO CART</button>";
                    echo "</div>";
                }
            }else{
                echo "<h1>No Product found!</h1>";
            }


        echo "</div>";
        echo "<br><br>";
        echo "<center><a href='form.html' class='add-p'>Add product</a></center>";

    ?>


</body>
</html>

