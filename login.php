<!DOCTYPE html>
<html lang="en">
	<title>Create Or Login Account</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<!---- Font awesom link local ----->
	</head>
	<body>
		<style type="text/css">
			body {background-color:#eee;}
			.container-fluid {padding:50px;}
			.container{background-color:white;padding:50px;   }
			#title{font-family: 'Lobster', cursive;;}
		</style>

	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">ONLINE CAR RENT</h2>
			 <p class="text-center">
				<small id="passwordHelpInline" class="text-muted">We Are Best And Trusted Car rental Company. And we Always Protect Customers Information</small>
			</p>
 			<hr>
 			<span style="text-align:center;">
 					<!-- PHP BLOCK -->
		<?php
include 'db.php';
 
		  if(isset($_POST['create'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $password = $_POST['password'];
                        $address = mysqli_real_escape_string($con,$_POST['address']);;
                        $national_id = $_POST['national_id'];                      
                            
                        if (empty($name) ||empty($phone) | empty($password) ||empty($address) ||empty($national_id)) {
                            echo $txt = "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        }
                       
                         elseif ( strlen ($password) < 6) {  
		                echo $txt =  "<span class='error-msg'>Password Minimum 6 Digit</span>";  
		                         
			            } elseif ( strlen ($phone) != 11) {  
			                echo $txt =  "<span class='error-msg'>Phone Only 11 Digit</span>";  
			                         
			            }elseif ( strlen ($national_id) != 13) {  
			                echo $txt =  "<span class='error-msg'>National Id no will Digit</span>";  
			                         
			            }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
			  	 			echo $txt =  "<span class='error-msg'>Only letters and white space allowed</span>";
						}

			            else{
     
			                $permited  = array('jpg', 'jpeg', 'png', 'gif');
			                $file_name = $_FILES['image']['name'];
			                $file_size = $_FILES['image']['size'];
			                $file_temp = $_FILES['image']['tmp_name'];
			    
			                $div            = explode('.', $file_name);
			                $file_ext       = strtolower(end($div));
			                $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
			                $uploaded_image = "img/".$unique_image;
			                $move_image = "img/".$unique_image;
			               
			               if(empty($file_ext)){
			                     echo $txt = "<span class='error-msg'>Image is required</span>";
			                     
			               }
			               else if ($file_size >1048567) {
			                 echo $txt = "<span class='error-msg'>Image Size should be less then 1MB! </span>";
			               } elseif (in_array($file_ext, $permited) === false) {
			                echo $txt = "<span class='error-msg'>You can upload only:-".implode(', ', $permited)."</span>";
			               }
			               else{
			                    move_uploaded_file($file_temp, $move_image);
			               
			                    $sql = "INSERT into  users (name,email,phone,address,password,national_id,flag,image) values('$name','$email','$phone','$address','$password','$national_id','0','$uploaded_image')";
			                    if ($con->query($sql) === TRUE) {
                       
                            move_uploaded_file($tempnameone,$folder1);
                            echo "<script>window.location='index.php';</script>";
		                            
		                    echo $txt = "<span class='success-msg'>New record created successfully</span>";
		                    } else {
		                        echo $txt = "Error: " . $sql . "<br>" . $con->error__;
		                    }
					                          
					                } 
					            }


		                    }

					                    if (isset($_POST['login'])) {
					                    	$email = $_POST['email'];
					                        $password = $_POST['password'];
                                            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
                                            
                                            $result = $con->query($query);
                                    
                                            if ($result->num_rows > 0) {
session_start();
                                            	 
                                                $value = mysqli_fetch_array($result);
                                                //session_destroy();
                                                $_SESSION['name'] = $value['name'];
                                                $_SESSION['email'] = $value['email'];
                                                $_SESSION['phone'] = $value['phone'];
                                                
                                                $_SESSION['id'] = $value['id'];
                                                $_SESSION['flag'] = $value['flag'];
                                                if ($value['flag']=='1') {
                                                  header('Location:admin/index.php');
                                                }else{
                                                  header('Location:index.php');
                                                }
                                               
                                                 
                                             }else{
                                                  echo $txt = "<span class='error-msg'>Email Or Password is Unmatch</span>";
                                             }
                    }
                    
		?>
		<!-- PHP BLOCK -->
		</span>
 			<hr>
			<div class="row">
				<div class="col-md-5">
 					<form method="post" enctype="multipart/form-data">
						<fieldset>							
							<p class="text-uppercase pull-center"> SIGN UP.</p>	
 							<div class="form-group">
								<input type="text" name="name" class="form-control input-lg" placeholder="Name">
							</div>

							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="number" min="0" name="phone" id="password" class="form-control input-lg" placeholder="Mobile NO ">
							</div>
							<div class="form-group">
								<input type="number" min="0" name="national_id" id="password" class="form-control input-lg" placeholder="National Identity NO">
							</div>

							<div class="form-group">
								<textarea class="form-control input-lg" name="address" placeholder="Address"></textarea>
							</div>



								<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="file" name="image"  class="form-control input-lg" >
							</div>
							<!-- <div class="form-check">
								<label class="form-check-label">
								  <input type="checkbox" class="form-check-input">
								  By Clicking register you're agree to our policy & terms
								</label>
							  </div> -->
 							<div>
 									  <input type="submit" name="create" class="btn btn-lg btn-primary   value="Register">
 							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					<!-------null------>
				</div>
				
				<div class="col-md-5">
 				 		<form method="post" action="">
						<fieldset>							
							<p class="text-uppercase"> Login using your account: </p>	
 								
							<div class="form-group">
								<input type="email" name="email" class="form-control input-lg" placeholder="email">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
							</div>
							<div>
								<input type="submit" name="login" class="btn btn-md" value="Sign In">
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
	</body>
	 

</html>