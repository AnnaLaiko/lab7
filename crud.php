<?php 
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<2)
{
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Работа с БД</title>
    <!--Ссылка для бутстрапа-->
<?php include_once 'html/head.html'; ?>
</head>
<body class="login drive_body bg-warning">
    <?php require_once 'php/head.php';?>
    <div style="height:30vh"></div>
    <div class="container mt-5 ">
        <div class="jumbotron bg-dark">
            <div class="card card-body mx-5">
                <a class="btn btn-lg btn-info font-weight-bold text-dark" href="crud_2.php">Таблица машин</a>
            </div>
            <div class="card card-title mx-5 text-center text-dark">
                <h2>Личные данные пользователей:</h2>
            </div>
            <div class="card card-body mx-5">
                <button type="button" class="btn btn-lg btn-info font-weight-bold text-dark" data-toggle="modal" data-target="#exampleModal">Добавить</button>
                <!-- Modal -->
                <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить нового пользователя</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php include 'html/form.html'; ?>
                    </div>
                  </div>
                </div>

            </div>
            <script src="js/script.js"></script>

            <form name="form2" id="form2" method="POST" action="php/first_table_delete_and_update.php">
                <div class="card card-body mx-5">
                    <button type="submit" name="delete" value="true" class="btn btn-lg btn-info font-weight-bold text-dark">Удалить</button>
                </div>
                <div class="card card-body mx-5 text-dark">
                    <?php require_once 'php/fetch_tables.php' ?>
                </div>
            </form>

        </div>
  </div>


</body>
</html>