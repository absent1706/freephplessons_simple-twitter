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
    <h1>Добро пожаловать на наш простой Твиттер!</h1>
    Для начала <a href="session_new.php">войдите</a> или <a href="user_new.php">зарегистрируйтесь</a>
<? endif; ?>