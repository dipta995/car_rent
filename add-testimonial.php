<?php
 include 'header.php'; 
 $query = "SELECT * FROM office_info";
$result = $con->query($query); 
$info = mysqli_fetch_array($result);


                
 ?>
    

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-4">
          <div class="row mb-5">
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-map-o"></span>
			          	</div>
			            <p><span>Address:</span><?php  echo $info['address']; ?></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-mobile-phone"></span>
			          	</div>
			            <p><span>Phone:</span> <a href="tel://1234567920"><?php  echo $info['phone']; ?></a></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-envelope-o"></span>
			          	</div>
			            <p><span>Email:</span> <a href="mailto:info@yoursite.com"><?php  echo $info['email']; ?></a></p>
			          </div>
		          </div>
		        </div>
          </div>
          <div class="col-md-8 block-9 mb-md-5">
            <?php 
              if (isset($_POST['submit'])) {
                $customerid= $_SESSION['id'];
                $message = $_POST['message'];
                if (empty($message)) {
                  echo "Field Must not be empty";

                } elseif ( strlen ($message)> 200) {  
                  echo $txt =  "<span class='error-msg'>Maximum 100 word required</span>";  
                           
                }else {
                  $sql = "INSERT INTO testimonials (customer_id,comment,status)VALUES('$customerid','$message','0')";
                  if ($con->query($sql) === TRUE) {
                    echo "<script>window.location='index.php';</script>";
                  }else {
                    echo "something wrong";
                  }
                }

               
              }
            ?>
            <form action="" method="POST" class="bg-light p-5 contact-form">
           
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Add" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
        
      </div>
    </section>
	
    <?php include 'footer.php'; ?>