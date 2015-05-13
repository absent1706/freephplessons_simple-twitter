<ul class="nav">
    <li><a href="#">Главная</a></li>
    <li><a href="#">Все пользователи</a></li>
    <li><a href="#">О сайте</a></li>

    <?if ($authUser = get_authorized_user()): ?>
        <li class="navbar-right"><a href="#">Выйти</a></li>    
        <li class="navbar-right"><a href="#">Профиль</a></li>    
    <? else: ?>
        <li class="navbar-right"><a href="#">Вход</a></li>        
        <li class="navbar-right"><a href="#">Регистрация</a></li>    
    <? endif; ?>

</ul>