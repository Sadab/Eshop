
<?php

$xml = new DomDocument("1.0", "UTF-8");
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
$xml->load("reg.xml");



    $userList = $xml->firstChild; // taking the root element into $userList.

if(isset($_POST['submit']))
{
    $fname=$_POST["name"];
    $fuserName=$_POST["username"];
    $femail=$_POST["email"];
    $fpassword=$_POST["password"];


    $user = $xml->createElement("User");
    $userList->appendChild($user);


    $name = $xml->createElement("Name",$fname);
    $username = $xml->createElement("UserName",$fuserName);
    $email = $xml->createElement("Email",$femail);
    $password = $xml->createElement("Password",$fpassword);

    $user->appendChild($name);
    $user->appendChild($username);
    $user->appendChild($email);
    $user->appendChild($password);


    //$xml->formatOutput = true;
    //echo"<xmp>".$xml->saveXML()."</xmp>";
    $xml->save("reg.xml");

    echo "You have registered successfully!!!";
}
?>
