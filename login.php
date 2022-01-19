
<!------ Include the above in your HEAD tag ---------->

<!---*************welcome this is my simple empty strap by John Niro Yumang ******************* -->
<?php 
  session_start();
   ?>
<!DOCTYPE html>
<html lang="en">

	<title>Sign up facundo farm & resort</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<head>
		<script src="jquery/jquery.min.js"></script>
		<!---- jquery link local dont forget to place this in first than other script or link or may not work ---->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!---- boostrap.min link local ----->
		
		<link rel="stylesheet" href="css/style.css">
		<!---- boostrap.min link local ----->

		<script src="js/bootstrap.min.js"></script>
		<!---- Boostrap js link local ----->
		
		<link rel="icon" href="images/icon.png" type="image/x-icon" />
		<!---- Icon link local ----->
		
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<!---- Font awesom link local ----->
	</head>
	<body>
        <?php 
		//create connection
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "store";
        $userData=array(["name"=>"tharaa","email"=>"tharaa9@live.com","password"=>"123"]);
        $userEmailError=$loginEmailMsg=$passwordMatch=$passwordError=$loginPassMsg="";

             if (isset($_POST['email'])){
            $user=array();
            $regex='/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
            if(preg_match($regex,$_POST['email'])){
               $userEmailError="";
            }else $userEmailError= "email is unvalid";

            $regexPass = '/^.{8,}$/';
            if(preg_match($regexPass,$_POST['password'])){
                if($_POST['password']===$_POST['password2']){
               $passwordMatch="Match";
           }else{
			$passwordError="Mush be 8 Characters";
		   }
                // $array=array("password"=>$_POST['password']);
                // array_merge($user,$array);
            // }else{
            //  $passwordError="Mush be 8 Characters";
            // }
			}
            
           if(preg_match($regex,$_POST['email']) && preg_match($regexPass,$_POST['password']) && $_POST['password']===$_POST['password2']){
            //    $user=array("name"=>$_POST['username'],"email"=>$_POST['email'],"password"=>$_POST['password']);
            //    if(isset($_SESSION['userData']) ){
            //         $oldData=$_SESSION["userData"];
            //         array_push($oldData,$user);
            //    $_SESSION["userData"]=$oldData;
            //    }else{
            //        array_push($userData,$user);
            //        $_SESSION["userData"]=$userData;
            //    }
            
		
			$username=$_POST['username'];
			$useremail=$_POST['email'];
			$userpassword=$_POST['password'];

			try{
				$connection=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql="INSERT INTO userdata( `username`, `email`, `password`,'is_admin') VALUES ('$username','$useremail','$userpassword','false')";
				$connection->exec($sql);
				echo "New record created successfully";
			}catch(PDOExecption $e){
                echo $sql . "<br>" . $e->getMessage();
			}
              
           }
        }
                $_SESSION["errorPMsg"]=" ";
                $_SESSION["errorEMsg"]=" ";
            if(isset($_POST["loginUser"])){ 
				$loggedemail=$_POST["loginUser"];
				$loggedpassword=$_POST["loginPassword"];
                // $data=$_SESSION['userData'];
                // foreach($data as $user){
                //     if($user["email"]===$_POST["loginUser"] && $user["password"]===$_POST["loginPassword"] ){  
                //          $_SESSION['userName']=$user["name"];
                //          $_SESSION["errorPMsg"]=" ";
                //          $_SESSION["errorEMsg"]=" ";
                //         header('Location: welcome.php'); 
                //     }elseif($user["email"]!==$_POST["loginUser"]){
                //         $_SESSION["errorEMsg"]="Incorrect Email";
                //         $_SESSION["errorPMsg"]=" ";
                //     }elseif($user["email"]===$_POST["loginUser"] && $user["password"]!==$_POST["loginPassword"]){
                //         $_SESSION["errorPMsg"]="Incorrect password";
                //         $_SESSION["errorEMsg"]=" ";
                //         break;
                //     }
                // }
				try{
					$connection=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
				    // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql="SELECT * FROM userdata WHERE email='$loggedemail' AND password='$loggedpassword'";
					$result=$connection->query($sql);
					if($result->rowCount()!=0 ){
						$row = $result->fetch(PDO::FETCH_ASSOC) ;
						if($row['is_admin']==1){
							header('Location: ./admin/index.html');
						}else if($row['is_admin']==0){
							$_SESSION["userName"]=$row['username'];
							$_SESSION["errorPMsg"]=" ";
						    $_SESSION["errorEMsg"]=" ";
							header('Location: welcome.php'); 
						}
							
				}else{
					$_SESSION["errorEMsg"]="Invalid login";
			        $_SESSION["errorPMsg"]=" ";
				}
            }catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			  }
			}
       
        ?>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">Facundo farm and Resort</h2>
			 <p class="text-center">
				<small id="passwordHelpInline" class="text-muted"> Developer: follow me on facebook <a href="https://www.facebook.com/JheanYu"> John niro yumang</a> inspired from <a href="https://p.w3layouts.com/">https://p.w3layouts.com/</a>.</small>
			</p>
 			<hr>
			<div class="row">
				<div class="col-md-5">
 					<form role="form" method="post" onsubmit="return validation()" action="">
						<fieldset>							
							<p class="text-uppercase pull-center"> SIGN UP.</p>	
 							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control input-lg" placeholder="username" required >
							</div>

							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" onchange="emailValidation()" required>
                               <p id="emailMsg"></p>
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" onchange="passValidation()" placeholder="Password" required>
                                 <p id="passwordMsg"></p>
							</div>
                           
								<div class="form-group">
								<input type="password" name="password2" id="password2" class="form-control input-lg" placeholder="Password2" onchange="matchingPassword()" required>
                               <p id="matchMsg"></p>
							</div>
							<div class="form-check">
								<label class="form-check-label">
								  <input type="checkbox" class="form-check-input">
								  By Clicking register you're agree to our policy & terms
								</label>
							  </div>
 							<div>
 									  <input type="submit" class="btn btn-lg btn-primary   value="Register">
 							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					<!-------null------>
				</div>
				
				<div class="col-md-5">
 				 		<form role="form" method="post" action="">
						<fieldset>							
							<p class="text-uppercase"> Login using your account: </p>	
 								
							<div class="form-group">
								<input type="email" name="loginUser" id="loginUser" class="form-control input-lg" placeholder="Email" required>
                                <p id="msgError" style="color:red"><?php
                                 if(isset( $_SESSION["errorEMsg"])) { echo $_SESSION["errorEMsg"]; }else echo ""; ?></p>
							</div>
							<div class="form-group">
								<input type="password" name="loginPassword" id="loginPassword" class="form-control input-lg" placeholder="Password" required>
                                <p id="msgError" style="color:red"><?php  if(isset( $_SESSION["errorPMsg"])) {echo $_SESSION["errorPMsg"]; }else echo "";?></p>
							</div>
							<div>
								<input type="submit" class="btn btn-md" value="Sign In">
							</div>
								 
 						</fieldset>
				</form>	
				</div>
			</div>
		</div>
		<p class="text-center">
			<small id="passwordHelpInline" class="text-muted"> Developer:<a href="http://www.psau.edu.ph/"> Pampanga state agricultural university ?</a> BS. Information and technology students @2017 Credits: <a href="https://v4-alpha.getbootstrap.com/">boostrap v4.</a></small>
		</p>
	</div>
    <script src="./index.js"> </script>
	</body>
	

</html>