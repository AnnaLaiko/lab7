<?php
if(!empty($_GET['search'])) {
	$search = $_GET['search'];
	if ($search != '') {
		$search = mysqli_real_escape_string($connect, $search);
		$search = htmlspecialchars($search);
		$result_user = mysqli_query($connect, "SELECT * ,
		MATCH(Login, Email, FIO) AGAINST ('$search' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION) as REL
		FROM users WHERE MATCH(Login, Email, FIO) AGAINST ('$search' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION)
		ORDER BY REL DESC");
		$a = 0;
		$search_result = array();
		if (mysqli_num_rows($result_user)) {
			while ($answer = mysqli_fetch_assoc($result_user)) {
				if (floatval($answer['REL']) > 0.01) {
					$search_result[] = $answer;
				}
			}
		}
		$result_cars = mysqli_query($connect, "SELECT * ,
		MATCH(car) AGAINST ('$search' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION) as REL
		FROM cars WHERE MATCH(car) AGAINST ('$search' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION)
		ORDER BY REL DESC");
		if (mysqli_num_rows($result_cars)) {
			while ($answer = mysqli_fetch_assoc($result_cars)) {
				if (floatval($answer['REL']) > 0.01) {
					$search_result[] = $answer;
				}
			}
		}
		usort($search_result, 'cmp');
		print_table($search_result,$search);
	}
}

	function cmp($a, $b)
	{
		if($a['REL']==$b['REL'])
			return 0;
		if($a['REL']>$b['REL'])
			return -1;
		else
			return 1;
	}

	function print_table($arr_res,$link)
	{
		$count=1;
		?>
		<div class="card card-body mx-5 text-dark">
			<div class="container search">
				<div class="row drive bg-secondary text-light font-weight-bolder">
					<div class="col-lg-1">ID</div>
					<div class="col-lg-4">RESULT</div>
					<div class="col-lg-7">INFO</div>
				</div>
			</div>
		<?php
		foreach ($arr_res as $element)
		{
			$res=(isset($element['car']))?'Машина: '.$element['car']:'Пользователь: '.$element['FIO'];
			$info=(isset($element['car']))?
				'Владелец: '.$element['user_id'].' Стоимость: '.$element['price'].' Год покупки: '.$element['year']:
				'Логин: '.$element['Login'].' Почта: '.$element['Email'].' Ранг: '.$element['Rank'];
			$table=(!isset($element['car']))?1:2;
			$id=$element['id'];
			?>
			<div class="container search" style="color:#fffc9f">
				<div class="row drive" style="background: <?php echo ($count%2)?'chocolate':'orange'; ?>; border-radius: 15px; margin-top:10px;">
					<div class="col-lg-1"><?php echo $count; ?></div>
					<div class="col-lg-2"><a href="detail.php?table=<?php echo $table;?>&id=<?php echo $id;?>&search=<?php echo $link;?>"><?php echo $res; ?></a></div>
					<div class="col-lg-3"><?php echo $info; ?></div>
				</div>
			</div>
			<?php
			$count++;
		}
		?>
		</div>
	<?php
	}