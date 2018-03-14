<?php
	session_start();

		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(!empty($_POST["username"]))
			{
				$name = dataFilter($_POST["username"]);
				$passWord = dataFilter($_POST["password"]);


				if(preg_match("/^[a-zA-Z ]*$/",$name))
				{
					if(!empty($_POST["username"]) && !empty($_POST["password"]))
					{
						$xml = simplexml_load_file("admin.xml");
						$loginFlag = FALSE ;

						foreach($xml->User as $user)
						{
						    if($name==$user->UserName && $passWord==$user->Password)
							{
								$loginFlag = TRUE ;
								$_SESSION["name"] = (string)$user->Name;
								$_SESSION["username"] = (string)$user->UserName;
								$_SESSION["email"] = (string)$user->Email;
								$_SESSION["password"] = (string)$user->Password;
								break;
							}

						}

					}

					if($loginFlag)
					{
						header("location:addproductui.php");
					}
					else
					{
						echo "Wrong login credentials";
					}
			    }

			    else
			    {
			    	echo "user name should conltain only letters";
			    }
			}

			if(empty($_POST["username"]))
			{
				echo "input user name first.<br/>";
			}

			if(empty($_POST["password"]))
			{
				echo "input password please";
			}

		}


		function dataFilter($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);

			return $data;
		}
	?>
