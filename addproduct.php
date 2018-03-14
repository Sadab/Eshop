<?php

		session_start();
        $xmlRead = simplexml_load_file("products.xml");

	 	$xml = new DomDocument("1.0", "UTF-8");
		$xml->preserveWhiteSpace = false;
		$xml->formatOutput = true;
		$xml->load("products.xml");


		 if(!$_FILES['pic']['name'])
		 {
				echo "<br/>Please upload a document";
				echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		 }

		else
		{
			$info = pathinfo($_FILES['pic']['name']);
			$ext = $info['extension'];
			$pic_id=rand();
			$newname = ((string)$pic_id).".".$ext;

			$target = 'Images/'.$newname;

			if(move_uploaded_file( $_FILES['pic']['tmp_name'], $target))
			{
				echo "added successfully</br></br>";
				echo '<a href="addproductui.php"><input type="button" name="button5" id="button5" value="Add More"></a>';
			}
			else
			{
				echo "not added successfully";
			}

		}


	$posts = $xml->firstChild;

	if(isset($_POST['submit']))
	{
	    $user_name=$_SESSION["username"];
	    $title=dataFilter($_POST["producttitle"]);
		$writing=dataFilter($_POST["textarea"]);
		$price=dataFilter($_POST["textarea1"]);
		$picPath=$target;

		$Postpp = $xml->createElement("post");
		$posts->appendChild($Postpp);

		$name_push  = $xml->createElement("UserName",$user_name);
		$title_push= $xml->createElement("title",$title);
		$Writings_push = $xml->createElement("writing",$writing);
		$pic_push  = $xml->createElement("pic",$picPath);
		$price_push = $xml->createElement("price",$price);

		$Postpp->appendChild($name_push);
		$Postpp->appendChild($title_push);
		$Postpp->appendChild($Writings_push);
		$Postpp->appendChild($pic_push);
		$Postpp->appendChild($price_push);

		$xml->save("products.xml");

	}

    function dataFilter($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }



?>
