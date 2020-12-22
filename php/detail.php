<?php
require_once 'php/connect.php';
if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<2)
{
	header('Location: index.php');
}
if(!isset($_GET['id'])||!isset($_GET['table'])) header('Location: index.php');
$id=intval($_GET['id']);
$search_text=mysqli_real_escape_string($connect,$_GET['search']);
$table=(intval($_GET['table']))==1?'users':'cars';
$detail_answer=mysqli_query($connect,'SELECT * FROM '.$table.' WHERE id='.$id);
$detail_info=mysqli_fetch_assoc($detail_answer);
if(!empty($detail_answer)) {
	if ($table == 'users') {
		?>
		<div class="container drivers">
			<div class="row drive bg-secondary text-light font-weight-bolder">
				<div class="col-lg-1">ID</div>
				<div class="col-lg-2">LOGIN</div>
				<div class="col-lg-3">PASSWORD</div>
				<div class="col-lg-2">EMAIL</div>
				<div class="col-lg-2">FIO</div>
				<div class="col-lg-1">RANK</div>
				<div class="col-lg-1">DEL</div>
			</div>
		</div>
		<?php
		?>
		<div class="container drivers">
			<div class="row drive">
				<div class="col-lg-1"><?php echo $detail_info['id']?></div>
				<div class="col-lg-2"><?php echo $detail_info['Login']?></div>
				<div class="col-lg-3"><?php echo $detail_info['Password']?></div>
				<div class="col-lg-2"><?php echo $detail_info['Email']?></div>
				<div class="col-lg-2"><?php echo $detail_info['FIO']?></div>
				<div class="col-lg-1"><?php echo $detail_info['Rank']?></div>
			</div>
		</div>
		<?php
	} else if ($table == 'cars') {
		?>
		<div class="container drivers">
			<div class="row drive bg-secondary text-light font-weight-bolder">
				<div class="col-lg-1">ID</div>
				<div class="col-lg-2">USER_ID</div>
				<div class="col-lg-3">MODEL CAR</div>
				<div class="col-lg-3">PRICE</div>
				<div class="col-lg-2">YEAR</div>
				<div class="col-lg-1">DEL</div>
			</div>
		</div>
		<?php
		?>
		<div class="container drivers">
			<div class="row drive" >
				<div class="col-lg-1"><?php echo $detail_info['id']?></div>
				<div class="col-lg-2"><?php echo $detail_info['user_id']?></div>
				<div class="col-lg-3"><?php echo $detail_info['car']?></div>
				<div class="col-lg-3"><?php echo $detail_info['price']?></div>
				<div class="col-lg-2"><?php echo $detail_info['year']?></div>
			</div>
		</div>
		<?php
	} else {
		header('Location: index.php');
	}
	?>
	<p class="text-center">
	<a href="search.php?search=<?php echo $search_text?>" class="btn btn-lg btn-info font-weight-bold text-dark">Назад</a>
	</p>
	<?php
}
