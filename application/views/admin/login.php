<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/') ?>css/main.css">
    <title>FYM Login</title>
    
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Login Page.</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" name="email" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>
          
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block">SIGN IN <i class="fa fa-sign-in fa-lg"></i></button>
          </div>
          <div class="form-control">
              
          <a href="<?= base_url('admin/SecurityController/sign_up')?>">Sign up and start your career right away</a>
          </div>
        </form>
          
      </div>
    </section>
  </body>
  <script src="<?= base_url('assets/admin/') ?>js/jquery-2.1.4.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/essential-plugins.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/plugins/pace.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/main.js"></script>
</html>