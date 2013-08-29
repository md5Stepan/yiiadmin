<h1>Login</h1>
<div class="mws-login-lock"><i class="icon-lock"></i></div>
<div id="mws-login-form">
    <form class="mws-form" action="#" method="post">
        <div class="mws-form-row">
            <div class="mws-form-item">
                <input type="text" name="AdmLoginForm[username]" class="mws-login-username required" placeholder="E-mail">
            </div>
        </div>
        <div class="mws-form-row">
            <div class="mws-form-item">
                <input type="password" name="AdmLoginForm[password]" class="mws-login-password required" placeholder="password">
            </div>
        </div>
        <div id="mws-login-remember" class="mws-form-row mws-inset">
            <ul class="mws-form-list inline">
                <li>
                    <input id="remember" type="checkbox" name="AdmLoginForm[rememberMe]"> 
                    <label for="remember">Remember me</label>
                </li>
            </ul>
        </div>
        <div class="mws-form-row">
            <input type="submit" value="Login" class="btn btn-success mws-login-button">
        </div>
    </form>
</div>