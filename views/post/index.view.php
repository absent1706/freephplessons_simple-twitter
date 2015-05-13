<?if ($authUser = get_authorized_user()): ?>
    <div class="main">
        <h1>Последние записи</h1>
        <hr>

        <?php 
            $query = "SELECT posts.*, users.name as username FROM posts,users WHERE users.id=posts.user_id";
            $posts = db()->query($query);
            while ($post = $posts->fetch()):
        ?>
                <h3><?= $post['title']; ?></h3>
                <small>Автор: <a href="#"><?= $post['username'] ?></a>. Опубликована <?= $post['created_at']; ?></small>
                <p>
                    <?= $post['body']; ?>
                    <a href="#" class="more-link">Читать/смотреть далее →</a>
                </p>
                <hr>
            <?php endwhile; ?>
    </div>
    <div class="aside">
         Привет,<?= $authUser['name'] ?>!
    </div>
<? else: ?>
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
                <input type="submit" id="loginSubmit" value="Войти!" />
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
                    <!-- <a class="block" href="#">Регистрация</a> -->
                </small>
            </div>
            <div class="form-group">
                <input type="submit" id="registerSubmit" value="Зарегистрироваться!" />
            </div>
        </form>   
<? endif; ?>