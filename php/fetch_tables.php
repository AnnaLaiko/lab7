<?php 
	if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<2)
	{
		header('Location: index.php');
	}
	require_once 'connect.php';
	$check_users=mysqli_query($connect, "SELECT * FROM `users` ORDER BY `users`.`id` DESC");
	if(mysqli_num_rows($check_users))
	{
		  echo 
			  '<div class="container drivers">
		        <div class="row drive bg-secondary text-light font-weight-bolder">
		   	        <div class="col-lg-1">'
		   	        . 'ID' . 
			        '</div>
			        <div class="col-lg-2"> '
			        . 'Login' .
			        '</div>
			        <div class="col-lg-3">'
			        . 'Password' . 
			        '</div>
			        <div class="col-lg-3">'
			        . 'Email' . 
			        '</div>
			        <div class="col-lg-2">'
			        . 'FIO' . 
			        '</div>
			        <div class="col-lg-1">'
			        . 'Rank' . 
			        '</div>
			      </div>
			    </div>';
		while($users=mysqli_fetch_assoc($check_users))
	      echo 
			  '<div class="container drivers">
		        <div class="row drive">
		   	        <div class="col-lg-1">'
			        . $users['id'] . 
			        '</div>
			        <div class="col-lg-2"> '
			        . $users['Login'] .
			        '</div>
			        <div class="col-lg-3">'
			        . $users['Password'] . 
			        '</div>
			        <div class="col-lg-3">'
			        . $users['Email'] . 
			        '</div>
			        <div class="col-lg-2">'
			        . $users['FIO'] . 
			        '</div>
			        <div class="col-lg-1">'
			        . $users['Rank'] . 
			        '</div>
			      </div>
			    </div>';
	}

 ?>