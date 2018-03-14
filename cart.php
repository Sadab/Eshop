
<?php

$xml = new DomDocument("1.0", "UTF-8");
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
$xml->load("cart.xml");
    $cartList = $xml->firstChild; // taking the root element into $userList.

if(isset($_POST['submit']))
{
    $fname=$_POST["productName"];
    $fPrice=$_POST["price"];


    $user = $xml->createElement("Product");
    $cartlist->appendChild($user);


    $name = $xml->createElement("ProductName",$fname);
    $price = $xml->createElement("Price",$fPrice);

    $user->appendChild($name);
    $user->appendChild($price);
    $xml->save("cart.xml");

    echo "Added to cart";
}
?>
