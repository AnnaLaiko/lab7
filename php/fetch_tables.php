<?php 
	if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<2)
	{
		header('Location: index.php');
	}
	require_once 'connect.php';
	$check_users=mysqli_query($connect, "SELECT * FROM `users` ORDER BY `users`.`id` DESC");
	if(mysqli_num_rows($check_users))
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
		<?php while($users=mysqli_fetch_assoc($check_users))
        {?>
			  <div class="container drivers">
		        <div class="row drive">
                    <div class="col-lg-1"><a href="#" aria-expanded="false" aria-controls="multiCollapseExample2" data-toggle="collapse" data-target="#editcollapse<?php echo $users['id']?>"><?php echo $users['id']?></a></div>
                    <div class="col-lg-2"><?php echo $users['Login']?></div>
			        <div class="col-lg-3"><?php echo $users['Password']?></div>
			        <div class="col-lg-2"><?php echo $users['Email']?></div>
			        <div class="col-lg-2"><?php echo $users['FIO']?></div>
			        <div class="col-lg-1"><?php echo $users['Rank']?></div>
                    <div class="col-lg-1">
                        <p class="text-center">
                            <input type="checkbox" name="<?php echo $users['id']?>" aria-label="Checkbox for following text input">
                        </p>
                    </div>
			      </div>
			    </div>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="editcollapse<?php echo $users['id']?>">
                        <div class="card card-body">
                            <div class="modal-body bg-dark">

                                <p class="text-center"><label class="text-center font-weight-bold" style="font-size: 30px; color:white">Почта</label></p>
                                <input name="email<?php echo $users['id']?>" id="email" class="form-control" placeholder="email@mail.ru">

                                <p class="text-center"><label class="text-center font-weight-bold" style="font-size: 30px; color:white">ФИО</label></p>
                                <input name="fio<?php echo $users['id']?>" type="text" minlength="3" class="form-control" placeholder="Ivanov I.I.">

                                <p class="text-center"><label class="text-center font-weight-bold" style="font-size: 30px; color:white">Ранг</label></p>
                                <input name="rank<?php echo $users['id']?>" type="number" min="0" max="10" class="form-control" placeholder="0">

                                <p class="text-center">
                                <button type="submit" name="edit" value="<?php echo $users['id']?>" class="mt-3 btn btn-lg btn-info font-weight-bold text-dark">изменить</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
	?>