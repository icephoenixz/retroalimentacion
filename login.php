<?php
include_once 'classes/Session.php';
Session::start();
if(isset($_POST['email'])){ 
    include_once "classes/Users.php";
    $user = new Users();
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->userLogin();
}
include_once 'common.php';
$login="active";
include  "header.php" ?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section bg-login">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="welcome-section login-div">
                                <h4 class="text-center"> Ingresar </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php Session::getMessage(); ?>
                                <form name="login" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Correo" name="email" data-validate="required,emailAddress">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Contraseña" name="password" data-validate="required">
                                    </div>
                                    <div class="form-group">
                                            <button name="login" value="login" class="btn btn-primary"> 
                                                <strong><span class="fa fa-key"></span> &nbsp;Ingresar</strong>
                                            </button>
                                        <span class="pull-right"> <a href="forgot.php" >Olvidaste tu contraseña ? </a>&nbsp;&nbsp;
                                            <a href="registration.php" >Regístrate </a>
                                        </span>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        
                    </div>
                </div><!-- /.row -->
            </div>
        </section>
<?php include "footer.php"; ?>