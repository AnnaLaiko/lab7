<?php
if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<2)
{
    header('Location: index.php');
}
require_once 'connect.php';
$check_cars=mysqli_query($connect, "SELECT * FROM `cars` ORDER BY `cars`.`id` DESC");
$check_users=mysqli_query($connect, "SELECT id, FIO FROM `users` ORDER BY `users`.`id` DESC");
if(mysqli_num_rows($check_users))
{
    while($users=mysqli_fetch_assoc($check_users))
    {
        $user_mass[]=array('ID'=>$users['id'], 'FIO'=>$users['FIO']);
    }
}
if(mysqli_num_rows($check_cars))
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
<?php while($cars=mysqli_fetch_assoc($check_cars))
{?>
    <div class="container drivers">
        <div class="row drive">
            <div class="col-lg-1"><a href="#" aria-expanded="false" aria-controls="multiCollapseExample2" data-toggle="collapse" data-target="#editcollapse<?php echo $cars['id']?>"><?php echo $cars['id']?></a></div>
            <div class="col-lg-2"><?php echo $cars['user_id']?></div>
            <div class="col-lg-3"><?php echo $cars['car']?></div>
            <div class="col-lg-3"><?php echo $cars['price']?></div>
            <div class="col-lg-2"><?php echo $cars['year']?></div>
            <div class="col-lg-1">
                <p class="text-center">
                    <input type="checkbox" name="<?php echo $cars['id']?>" aria-label="Checkbox for following text input">
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="editcollapse<?php echo $cars['id']?>">
                <div class="card card-body">
                    <div class="modal-body bg-dark">

                        <p class="text-center font-weight-bold" style="font-size: 30px; color:white">Владелец машины</p>
                        <select name="car_owner" id="car_owner" class="form-control">
                            <?php
                            foreach ($user_mass as $user)
                            {
                                ?>
                                <option <?php if($_SESSION['user']['id']==$user['ID']) echo 'selected'; ?> value="<?php echo $user['ID']; ?>"><?php echo $user['FIO']; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        <p class="text-center"><label class="text-center font-weight-bold" style="font-size: 30px; color:white">Модель</label></p>
                        <input name="model<?php echo $cars['id']?>" type="text" class="form-control" placeholder="model">

                        <p class="text-center"><label class="text-center font-weight-bold" style="font-size: 30px; color:white">Цена</label></p>
                        <input name="price<?php echo $cars['id']?>" type="number" min="0" max="5000000" class="form-control" placeholder="1000000">

                        <p class="text-center"><label class="text-center font-weight-bold" style="font-size: 30px; color:white">Год выпуска</label></p>
                        <input name="year<?php echo $cars['id']?>" type="number" min="2000" max="2100" class="form-control" placeholder="2000">

                        <p class="text-center">
                            <button type="submit" name="edit" value="<?php echo $cars['id']?>" class="mt-3 btn btn-lg btn-info font-weight-bold text-dark">изменить</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>