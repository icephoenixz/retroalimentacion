<?php 
 include_once 'classes/Session.php';
 Session::start();
if(isset($_POST['email'])){ 
        include_once "classes/Users.php";
        $user = new Users();
        $user->setEmail($_POST['email']);
        $user->setQuestion($_POST['question']);
        $user->setAnswer($_POST['answer']);
        $user->forgotPassword();
}
include  "header.php"  ?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section bg-login">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="welcome-section login-div">
                                <h4 class="text-center"> Recuperar Contraseña </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php Session::getMessage(); ?>
                                <form name="forgot" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Correo" name="email" data-validate="required,emailAddress">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="question" data-validate="required">
                                            <option value="">-- Selecciona Pregunta --</option>
                                            <option value='1'>Nombre de tu primera escuela</option>
                                            <option value='2'>Nombre de tu restaurante favorito</option>
                                            <option value='3'>Nombre de tu actor favorito</option>
                                            <option value='4'>Tu pelicula favorita</option>
                                            <option value='5'>Nombre de la persona que admiras</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Respuesta" name="answer" data-validate="required">
                                    </div>
                                    <div class="form-group">
                                            <button name="login" value="login" class="btn btn-primary"> 
                                                <strong> Conseguir Contraseña </strong>
                                            </button>
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