<?php
if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<2)
{
    header('Location: index.php');
}
require_once 'connect.php';
$check_users=mysqli_query($connect, "SELECT id, FIO FROM `users` ORDER BY `users`.`id` DESC");
if(mysqli_num_rows($check_users))
{
    while($users=mysqli_fetch_assoc($check_users))
    {
        $user_mass[]=array('ID'=>$users['id'], 'FIO'=>$users['FIO']);
    }
}
?>



<form action="php/add_car.php" method="POST" class="needs-validation" name="form" id="form">
    <div class="modal-body">
        <div for="car_owner">
            <label class="text-center font-weight-bold" style="font-size: 30px; color:#000000">Владелец машины</label>
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
        </div>

        <div for="car_name">
            <label class="text-center font-weight-bold" style="font-size: 30px; color:#000000">Модель машины</label>
            <input class="form-control" type="text" name="car_name" id="car_name" minlength="3" required placeholder="car name">
            <ul class="input-requirements text-danger">
                <li>Минимальная длинна 3 символа</li>
            </ul>
        </div>

        <div for="car_price">
            <label class="text-center font-weight-bold" style="font-size: 30px; color:#000000">Цена машины</label>
            <input class="form-control" type="number" name="car_price" id="car_price" min="1" max="4999999" step="1" required placeholder="1000000">
            <ul class="input-requirements text-danger">
                <li>Цена от 1 до 5 000 000 (в рублях)</li>
            </ul>
        </div>

        <div for="car_year">
            <label class="text-center font-weight-bold" style="font-size: 30px; color:black">Год покупки</label>
            <input class="form-control" type="number" name="car_year" id="car_year" max="2100" min="2000" step="1" required placeholder="2000">
            <ul class="input-requirements text-danger">
                <li>Год в диапозоне от 2000 до 2100</li>
            </ul>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" name="add_data" id="add_data" class="btn btn-primary">Добавить</button>
    </div>
</form>