<div class="row">
    <div class="msg msg-error visi">
        <p><span>Error</span> <?php echo $_SESSION['Error'];?></p>
    </div>
    <form method="post" action="" class="login-form">
        <div class="row">
            <div class="col span-1-of-3">
                <label for="username">Username</label>
            </div>
            <div class="col span-1-of-3">
                <input type="text" name="username" id="username">
            </div>
        </div>
        <div class="row">
            <div class="col span-1-of-3">
                <label for="password">Password</label>
            </div>
            <div class="col span-1-of-3">
                <input type="password" name="password" id="password">
            </div>
        </div>
        <div class="row">
            <div class="col span-1-of-3">
                <label>&nbsp;</label>
            </div>
            <div class="col span-2-of-3">
                <input class="btn-login" type="submit" name="login" value="Log In">
            </div>
        </div>
    </form>
</div>