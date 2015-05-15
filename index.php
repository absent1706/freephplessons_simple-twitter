<?php
const DB_USER          =  'root';
const DB_PASSWORD      =  '';
const DB_DATABASE_NAME =  'simple_twitter';

try {
    $pdo = new \PDO('mysql:host=localhost;dbname=' . DB_DATABASE_NAME, DB_USER,DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch(Exception $e) {
    die('Cannot connect to DB: ' . $e->getMessage());
}


$authUser = $pdo->query("SELECT * FROM users")->fetch();
// $authUser = null; // закомментируйте эту строку, чтобы страница отобразилась как для неавторизованного пользователя
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Указываем браузеру кодировку документа, а то ещё кракозябры вместо русских букв нарисует -->
        <meta charset="utf-8">

        <!-- Раскомментируйте тег ниже, и страница будет сама обновляться. Очень удобно, когда кодишь: сразу видишь, что получилось, не нажимая F5 -->
        <!-- <meta http-equiv="refresh" content="1"> -->

        <title>Simple-twitter | Занятие 2 | Html, CSS</title>

        <!-- иконка сайта -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="assets/css/styles.css">
        <!-- <link rel="stylesheet" href="assets/css/styles_step_by_step.css"> -->
        <script src="assets/js/external/jquery-1.11.2.js"></script>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <h1>Simple-twitter </h1>
            </div>
        </div>
        <div class="nav-bar">
            <div class="container">
                <ul class="nav">
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Все пользователи</a></li>
                    <li><a href="#">О сайте</a></li>
                    <?php if ($authUser): ?>
                        <li class="navbar-right"><a href="#">Выйти</a></li>    
                        <li class="navbar-right"><a href="#">Профиль</a></li>    
                    <?php else: ?>
                        <li class="navbar-right"><a href="#">Вход</a></li>        
                        <li class="navbar-right"><a href="#">Регистрация</a></li>    
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <?php if ($authUser): ?>
                    <div class="main">
                        <h1>Последние записи</h1>
                        <hr>

                        <?php 
                            $query = "SELECT * FROM posts";
                            $posts = $pdo->query($query);
                            while ($post = $posts->fetch()):
                        ?>

                            <?php 
                                $query = "SELECT * FROM users WHERE id=" . $post['user_id'];
                                $user = $pdo->query($query)->fetch();
                            ?>                        
                                <h3><?= $post['title']; ?></h3>
                                <small>Автор: <a href="#"><?= $user['name'] ?></a>. Опубликована <?= $post['created_at']; ?></small>
                                <p>
                                    <?= substr($post['body'],0,100); ?> ...
                                    <small><a href="#" class="more-link">на страницу твита →</a></small>
                                </p>
                                <hr>
                            <?php endwhile; ?>
                    </div>
                    <div class="aside">
                        <img src="<?= $authUser['avatar_path'] ?>" width="128" height="128"/>
                        <a class="block" href="#"><?= $authUser['name'] ?></a>
                        <form action="" method="post" id="new_post">
                            <div class="form-group">
                                <textarea id="post_content" name="post_content" class="form-control" placeholder="Введите новый твит ..."></textarea>
                            </div>
                            <div class="form-group">
                                <input name="commit" value="Твитнуть!" class="btn" type="submit">
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <!-- Формы авторизации и регистрации -->
                        <h3>Войти</h3>
                        <form id="login-form" action="" method="post">
                            <div class="form-group">
                                <input type="email" placeholder="Email" id="login-email" name="login-email" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" id="login-password" name="login-password" class="form-control" data-min-length="8" />
                            </div>
                            <div class="form-group">
                                <small>
                                    <a class="block" href="#">Забыли пароль?</a>
                                    <a class="block" href="#">Регистрация</a>
                                </small>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="loginSubmit" class="btn" value="Войти!" />
                            </div>
                        </form>

                        <h3>Регистрация</h3>
                        <form id="register-form" action="" method="post">
                            <div class="form-group">
                                <input type="text" placeholder="Username" id="username" name="username" class="form-control" data-min-length="5" />
                                <small class="block hint" id="username-hint"></small>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" id="password" name="password" class="form-control" data-min-length="8" />
                                <small class="block hint" id="password-hint"></small>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="email" id="email" name="email" class="form-control"  />
                                <small class="block hint" id="email-hint"></small>
                            </div>                        
                            <div class="form-group">
                                <small>
                                    <a class="block" href="#">Забыли пароль?</a>
                                    <a class="block" href="#">Регистрация</a>
                                </small>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="registerSubmit" class="btn" value="Зарегистрироваться!" />
                            </div>
                        </form> 
                <?php endif; ?>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                &copy; Copyright 2015
            </div>
        </div>

        <script src="assets/js/main.js"></script>
    </body>
</html>