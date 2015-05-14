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

                        <!-- Paragraphs -->
                        <h3>Запись 1</h3>
                        <small>Автор: <a href="#">admin</a>. Опубликована 05.05.2015 15:23</small>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, in. Quas magnam voluptatum cupiditate labore dignissimos voluptate, consequuntur rerum alias consequatur eius, nobis dolore, numquam velit quaerat voluptatibus incidunt! Quis at illum doloribus quibusdam velit quidem laudantium architecto a saepe magni consequatur fugit dignissimos vel officia corporis dolore debitis, hic quam, ad esse quia aliquam voluptates voluptatibus veniam. Porro sit dolor nihil molestias inventore, iusto? Nulla nihil ea ut, quas at possimus molestias doloremque, saepe porro, consectetur mollitia ipsa quaerat ratione adipisci perspiciatis architecto, fugiat assumenda debitis dolore corporis illum facere magni hic suscipit. Fugiat voluptates corrupti itaque, dolorem veritatis!
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident facilis aliquam eos dolore neque eligendi odio obcaecati labore qui unde. Soluta repudiandae facere explicabo eius placeat quis, iure, nisi doloremque provident, ut animi ipsum autem porro earum non! Velit adipisci, impedit atque, commodi eum illo nisi est error dicta quidem.
                            <a href="#" class="more-link">Читать/смотреть далее →</a>
                        </p>

                        <hr>

                        <!-- Paragraphs -->
                        <h3>Запись 2</h3>
                        <small>Автор: <a href="#">Nick</a>. Опубликована 05.05.2015 11:12</small>                    
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat hic mollitia sed ex doloribus. Nesciunt accusantium laudantium, minus, numquam fugiat quas reprehenderit. Necessitatibus qui, consequatur quibusdam pariatur beatae doloremque, maxime commodi totam reiciendis? Obcaecati porro natus, enim quod! Sequi numquam exercitationem velit sit, minima earum eveniet. Ex quam perspiciatis cupiditate corrupti dolores laboriosam ab nam, iste ducimus mollitia. Praesentium eos, ut, a repudiandae debitis deserunt sint veritatis doloribus quisquam nostrum eius. Officia, quam consequatur vero distinctio voluptas impedit asperiores id aspernatur eveniet illo, illum expedita repudiandae et quae aut laborum iusto! Aspernatur aperiam repellendus quos, doloribus nobis maiores fuga recusandae.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati ad vero ratione molestiae perferendis! Voluptatibus explicabo tempora voluptatum aperiam reiciendis dolore nulla perferendis, neque necessitatibus deleniti officiis commodi non reprehenderit iure magni sit distinctio laudantium? Sunt praesentium et, ullam deleniti nostrum ut blanditiis rem officiis voluptas at nulla perferendis cumque?
                            <a href="#" class="more-link">Читать/смотреть далее →</a>
                        </p>
                        <hr>

                        <!-- Paragraphs -->
                        <h3>Запись 3</h3>
                        <small>Автор: <a href="#">Bob</a>. Опубликована 16.04.2015 9:15</small>                    
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat hic mollitia sed ex doloribus. Nesciunt accusantium laudantium, minus, numquam fugiat quas reprehenderit. Necessitatibus qui, consequatur quibusdam pariatur beatae doloremque, maxime commodi totam reiciendis? Obcaecati porro natus, enim quod! Sequi numquam exercitationem velit sit, minima earum eveniet. Ex quam perspiciatis cupiditate corrupti dolores laboriosam ab nam, iste ducimus mollitia. Praesentium eos, ut, a repudiandae debitis deserunt sint veritatis doloribus quisquam nostrum eius. Officia, quam consequatur vero distinctio voluptas impedit asperiores id aspernatur eveniet illo, illum expedita repudiandae et quae aut laborum iusto! Aspernatur aperiam repellendus quos, doloribus nobis maiores fuga recusandae.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati ad vero ratione molestiae perferendis! Voluptatibus explicabo tempora voluptatum aperiam reiciendis dolore nulla perferendis, neque necessitatibus deleniti officiis commodi non reprehenderit iure magni sit distinctio laudantium? Sunt praesentium et, ullam deleniti nostrum ut blanditiis rem officiis voluptas at nulla perferendis cumque?
                            <a href="#" class="more-link">Читать/смотреть далее →</a>
                        </p>
                        <hr>
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