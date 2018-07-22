<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/') ?>css/main.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/') ?>css/sub_main.css">
        <title>Find Your Music</title>

        <!--Form validator-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--if lt IE 9
        script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
        script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
        -->
    </head>
    <body class="sidebar-mini fixed" id="main_body">
        <div class="wrapper">
            <!-- Navbar-->


            <div class="content-wrapper">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="well bs-component">
                                        <form class="form-horizontal" method="post" action="<?= base_url('sign-up') ?>">
                                            <fieldset>
                                                <legend>Register</legend>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="inputEmail">Name</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="inputEmail" name="name" type="text" placeholder="Name" max="9" min="5">
                                                        <div><?php echo form_error('name');?></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="inputEmail" name="email" type="email" placeholder="Email" max="15" min="5" required>
                                                         <div><?php echo form_error('email');?></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="inputEmail">Phone</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="inputEmail" name="phone" type="tel" placeholder="Phone">
                                                         <div><?php echo form_error('phone');?></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="inputPassword">Password</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" min="8" required>
                                                         <div><?php echo form_error('password');?></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Role</label>
                                                    <div class="col-lg-10">
                                                        <div class="radio">
                                                            <label>
                                                                <input id="optionsRadios1" type="radio" name="role" value="2" checked="">Artist
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input id="optionsRadios2" type="radio" name="role" value="3">Listener
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-10 col-lg-offset-2">
                                                        <button class="btn btn-default" type="reset">Cancel</button>
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a href="<?= base_url('admin/SecurityController') ?>">Already have an account?</a>
                                                </div>
                                            </fieldset>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Javascripts-->

        <script src="<?= base_url('assets/admin/') ?>js/essential-plugins.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/bootstrap.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/plugins/pace.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/main.js"></script>

        <script>
            name
            email
            phone
        </script>
    </body>
</html>