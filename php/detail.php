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
        print_cars(cars($detail_info['id'],$connect));
	} else if ($table == 'cars') {
		?>
		<div class="container drivers">
			<div class="row drive bg-secondary text-light font-weight-bolder">
				<div class="col-lg-1">ID</div>
				<div class="col-lg-2">USER_ID</div>
				<div class="col-lg-3">MODEL CAR</div>
				<div class="col-lg-3">PRICE</div>
				<div class="col-lg-2">YEAR</div>
			</div>
		</div>
		<?php
		?>
		<div class="container drivers">
			<div class="row drive" >
				<div class="col-lg-1"><?php echo $detail_info['id']?></div>
                <div class="col-lg-2"><a href="detail.php?id=<?php echo $detail_info['user_id']?>&table=1&search=<?php echo $search_text?>"><?php echo $detail_info['user_id']?></a></div>
				<div class="col-lg-3"><?php echo $detail_info['car']?></div>
				<div class="col-lg-3"><?php echo $detail_info['price']?></div>
				<div class="col-lg-2"><?php echo $detail_info['year']?></div>
			</div>
		</div>
		<?php
        print_user(get_user_info($detail_info['user_id'],$connect),$search_text);
	} else {
		header('Location: index.php');
	}
	?>
	<p class="text-center">
	<a href="search.php?search=<?php echo $search_text?>" class="btn btn-lg btn-info font-weight-bold text-dark">К поиску</a>
	</p>
	<?php
}
function cars($id_user,$con)
{
    $cars=mysqli_query($con,'SELECT * FROM cars WHERE user_id='.intval($id_user));
    $car=array();
    while($next=mysqli_fetch_assoc($cars))
    {
        $car[]=$next;
    }
    return $car;
}

function print_cars($cars)
{
    if(!empty($cars)):
	?>
    <div class="container drivers">
        <div class="row drive bg-secondary text-light font-weight-bolder">
            <div class="col-lg-1">ID</div>
            <div class="col-lg-2">USER_ID</div>
            <div class="col-lg-3">MODEL CAR</div>
            <div class="col-lg-3">PRICE</div>
            <div class="col-lg-2">YEAR</div>
        </div>
    </div>
	<?php
	foreach ($cars as $car) {
		?>
        <div class="container drivers">
            <div class="row drive" >
                <div class="col-lg-1"><?php echo $car['id']?></div>
                <div class="col-lg-2"><?php echo $car['user_id']?></div>
                <div class="col-lg-3"><?php echo $car['car']?></div>
                <div class="col-lg-3"><?php echo $car['price']?></div>
                <div class="col-lg-2"><?php echo $car['year']?></div>
            </div>
        </div>
		<?php
    }
	endif;
}

function get_user_info($user_id, $con)
{
    $user_table=mysqli_query($con, 'SELECT * FROM users WHERE id='.$user_id);
    $user=mysqli_fetch_assoc($user_table);
    return($user);
}

function print_user($user, $search_text)
{
	if(!empty($user)):
		?>
        <div class="container drivers">
            <div class="row drive bg-secondary text-light font-weight-bolder">
                <div class="col-lg-1">ID</div>
                <div class="col-lg-2">LOGIN</div>
                <div class="col-lg-3">PASSWORD</div>
                <div class="col-lg-2">EMAIL</div>
                <div class="col-lg-2">FIO</div>
                <div class="col-lg-1">RANK</div>
            </div>
        </div>
            <div class="container drivers">
                <div class="row drive" >
                    <div class="col-lg-1"><?php echo $user['id']?></div>
                    <div class="col-lg-2"><a href="detail.php?id=<?php echo $user['id']?>&table=1&search=<?php echo $search_text?>"><?php echo $user['Login']?></a></div>
                    <div class="col-lg-3"><?php echo $user['Password']?></div>
                    <div class="col-lg-2"><?php echo $user['Email']?></div>
                    <div class="col-lg-2"><?php echo $user['FIO']?></div>
                    <div class="col-lg-1"><?php echo $user['Rank']?></div>
                </div>
            </div>
        <?php
	endif;
}