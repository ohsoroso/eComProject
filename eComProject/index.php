<?php include("header.php"); 
      include "../inc/dbinfo.inc";

      $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

$database = mysqli_select_db($connection, DB_DATABASE);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.php">
    <title>SunLight | Online store</title>
</head>
<style>
    h1{
            font-size: 50px;
            line-height: 60px;
            margin: 25px 0;
        }
    p{
        font-size:20px;
    }   
    .btn{
            display: inline-block;
            background: #098D9C;
            color: #fff;
            padding: 8px 30px;
            margin: 30px 0;
            border-radius: 30px;
        } 
    .col-2{
            max-width: 100%;
            padding: 50px 0;
        }
    .form{
            width: 250px;
            float: right;
            height: 380px;
            border-radius: 10px;
            padding: 25px;
        }
    .form input:focus{
            outline: none;
        }
    h4{
            text-align: center;
            font-size: 40px;
            color: #098D9C;
            text-decoration: underline;     
            text-decoration-color: #098D9C;  
            text-decoration-style: double;  
        }
    h2 {
            text-align: center;
            margin-bottom: 40px;
        }
    button {

            background: rgb(35, 174, 202);
            padding: 5px 10px;
            color: #fff;
            border-radius: 5px;
            margin-right: 2px;
            border: none;
        }    
        
       
</style>

<body>


<div class="login">
			<h2>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="user_name">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="user_name" placeholder="Username" id="user_name" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
            <p1 class="link">Don't have an account<br>
            <a href="form.php">Sign up here</a></p1>
</div>

        <div class="sunlight" style="padding: 10px;">
            <img class="images-sunlight" src="images/sunlight.jpg" width="310" height="310">
            <h1>Give Your Outfit<br> A New Style!</h1>
                <p>Style is something each of us already has, all we need to do is find it.</p>
                <a href="" class="btn">Explore Now &#10137;</a>
        </div>
        
        
                
        

       
        
            

        <h4>Men Featured Products</h4>


    <div class="container mt-5">
        <div class="row">
            <?php
                $resultM = mysqli_query($connection, "SELECT * FROM prodinfo WHERE sex='M'");
                while($row = $resultM->fetch_assoc()) {
                    ?>
                     <div class="col-lg-3">
                        <form action="manage_cart.php" method="POST">
                            <div class="card">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['prodimg']); ?>" />
                            <div class="card-body text-center">
                                <h5 class="card-title"> <?php echo $row['prodname']?></h5>
                                <p class="card-text">Price: $ <?php echo $row['prodprice']?></p>
                                <button type="submit" name="Add_Cart" class="btn btn-info">Add Cart</button>
                                <input type="hidden" name="Item_Name" value="Graphic Shirt Striped">
                                <input type="hidden" name="Price" value="50">
                            </div> 
                            </div>
                        </form>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>

                            <h4 class="container mt-5">Women Featured Products</h4>

    <div class="container mt-5">
        <div class="row">
        <?php
                $resultM = mysqli_query($connection, "SELECT * FROM prodinfo WHERE sex='F'");
                while($row = $resultM->fetch_assoc()) {
                    ?>
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['prodimg']); ?>" />
                    <div class="card-body text-center">
                        <h5 class="card-title"> <?php echo $row['prodname']?></h5>
                        <p class="card-text">Price: $ <?php echo $row['prodprice']?></p>
                        <button type="submit" name="Add_Cart" class="btn btn-info">Add Cart</button>
                        <input type="hidden" name="Item_Name" value="Green Joggers">
                        <input type="hidden" name="Price" value="60">
                    </div> 
                    </div>
                </form>
            </div>
            <?php
                }
                ?>
        </div>
    </div>
</body>
</html>