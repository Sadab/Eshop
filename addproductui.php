
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add new product</title>
    </head>
    <body>
    <h1>Enter Product Details</h1>
        <form class="" action="addproduct.php" method="post" enctype="multipart/form-data"/>
            <input type="text" name="producttitle" value="" placeholder="Name of the product" required/> <br/><br/>
            Quantity: <textarea name="textarea" rows="1" cols="5" required></textarea><br/><br/>
            Price: <textarea name="textarea1" rows="1" cols="5" required></textarea></br></br>
            <b>CHOOSE PICTURE:</b> <br/>

            <input name="pic" type="file"/><br/><br/><br/>

            <input type="submit" name="submit" value="SAVE"/>
        </form>
    </body>
</html>
