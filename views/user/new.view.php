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