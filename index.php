<!DOCTYPE html>
<html lang="ru">
<head>
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="..\css\style-auth.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d506a1fa93.js" crossorigin="anonymous"></script>
    <title>Авторизация</title>
</head>
<body>
 
    <!-- <nav class="navbar navbar-dark bg-dark " style="height: 90px;">
        <h1 class="display-4 text-light">Мяу</h1>
    </nav> -->
    <div class="wrap">
        <div class="container">
            
        
            <div class="row justify-content-center align-items-center" style="height: 80vh;">
                <div class="col-md-offset-3 col-md-6 wrap_2">
                    <form  action="auth.php" method="post" class="form-horizontal shadow p-5 mb-5 bg-white rounded">
                        <h1 class="display-4 text-center">Авторизация</h1>
                        <label class="m-0">Логин</label>
                        <div class="input-group mb-3">
                            <input name="login" type="text" class="form-control">
                            <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                                <i class="fas fa-user-circle"></i>
                            </span>
                            </div>
                        </div>
                        <label>Пароль</label>
                        <div class="input-group mb-3">
                            <input name="password" type="password" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                if($_COOKIE['user'] == ''):
            ?> 
            <?php else:?>
            <?php
             
                //header('Location: main.php');
            ?>    
            <?php endif;?>           

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>