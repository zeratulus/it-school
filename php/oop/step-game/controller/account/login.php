<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 26.02.18
 * Time: 18:21
 */


class ControllerAccountLogin {

    public function index() {

        echo '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="http://localhost:63342/it-school/php/oop/step-game/view/src/bootstrap/css/bootstrap.css">
    <script src="http://localhost:63342/it-school/php/oop/step-game/view/src/jquery-2.1.1.min.js"></script>
    <script src="http://localhost:63342/it-school/php/oop/step-game/view/src/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://localhost:63342/it-school/php/oop/step-game/view/styles/main.css">
</head>
<body>

    <div class="container">

        <div class="well">
            <form action="index.php?route=account/login" method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2" for="input-email">Введите Ваш E-mail</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" name="email" id="input-email" placeholder="Введите Ваш E-mail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="input-password">Введите Ваш пароль</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="password" id="input-password" placeholder="Введите Ваш Пароль">
                    </div>
                </div>
                <div class="flex-center">
                    <button type="submit" class="btn btp-primary text-uppercase">Вход</button>
                </div>
                <a href="forgotten.php">Забыли пароль?</a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>        
        
        ';
        //TODO: Add view .html
    }

}