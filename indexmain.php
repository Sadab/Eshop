<html>
	<head>
		<title>E-Shop</title>
	</head>
	<body>
	<?php
		session_start();
	?>
		<div align="center">
		<h1>E-SHOP</h1></br></br></br><hr/>
		<main>
            <?php
				$i = 0;
				$items;
            	$xmlRead = simplexml_load_file("products.xml");
            	foreach($xmlRead->post as $user)
            	{
						echo $i;
            			echo "<p><b>"."Product Name: ".$user->title."</b></p>";
						echo "<p>"."Product Quantity: " .$user->writing."</p>";
						echo "<p>"."Price: ৳" .$user->price."</p>";
						echo '<img src="'.$user->pic.'" alt="Picture"  height="100" width="100" /></br></br>';
						echo '<a href="cart.php"><input type="button" name="button5" id="button5" value="Add to Cart"></a>';
						echo "<hr/>";
						$i++;
						
				}
            ?>
        </main></br></br>
		<a href="logout.php"><input type="button" name="button6" id="button6" value="Logout"></a>
		</div>
	</body>
	
	
</html>