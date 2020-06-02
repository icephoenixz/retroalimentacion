<?php
    include_once 'classes/Session.php';
    Session::start();
if(isset($_POST['fname'])){
        include_once "classes/Users.php";
        $user = new Users();
        $imgArr = $_FILES['profile'];
        $user->setFname($_POST['fname']);
        $user->setLname($_POST['lname']);
        $user->setMobile($_POST['mobile']);
        $user->setDob(date('Y-m-d',  strtotime($_POST['dob'])));
        $user->setGender($_POST['gender']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->setQuestion($_POST['question']);
        $user->setAnswer($_POST['answer']);
        $user->setAddress($_POST['address']);
        $user->setStatus(1);
        $user->setRole("Student");
        echo $user->saveUser($imgArr);
}
include_once 'common.php';
$registration="active";
include  "header.php" ?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="welcome-section">
                                <h4 class="text-center"> Registro </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php echo Session::getMessage();?>
                                <form  enctype="multipart/form-data" method="post">
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fname" id="fname" data-validate="required,nameValidate" placeholder="Nombre *">
                                    </div>
                                </div>
                                 <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lname" id="lname" data-validate="required,nameValidate" placeholder="Apellido *">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mobile" id="mobile" data-validate="required,mobileNumber" placeholder="Número Celular *">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control date datepicker"  data-provide="datepicker" data-date-format="dd-mm-yyyy" name="dob" id="dob" data-validate="required" placeholder="Fecha de Nacimiento *">
                                    </div>
                                </div>
                                 <div class="col-md-12 col-xs-12">
                                         Género<br/>
                                    <div class="form-group">
                                        <input type="radio" name="gender"  value="Hombre" checked> Hombre &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="gender"  value="Mujer" > Mujer 
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email" data-validate="required,emailAddress,emailExistUser" placeholder="Correo Electrónico *">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="passwords" data-validate="required" placeholder="Contraseña *">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" data-validate="required,confirmPassword" placeholder="Confirmar Contraseña *">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea name="address" class="form-control" id="address" placeholder="Dirección"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <select class="form-control" name="question" data-validate="required">
                                            <option value="">-- Selecciona Pregunta --</option>
                                            <option value='1'>Nombre de tu primera escuela</option>
                                            <option value='2'>Nombre de tu restaurante favorito</option>
                                            <option value='3'>Nombre de tu actor favorito</option>
                                            <option value='4'>Tu película favorita</option>
                                            <option value='5'>Nombre de una persona que admires</option>>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="answer" class="form-control" name="answer" id="answer" data-validate="required" placeholder="Tu respuesta privada *">
                                    </div>
                                </div>
                                 <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Selecciona tu perfil</label>
                                        <input type="file" class="form-control" name="profile" id="profile"  >
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" name="register" class="btn btn-primary" id="register" value="register"><strong>Enviar</strong></button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12"></div>
                </div><!-- /.row -->
            </div>
        </section>
<?php include "footer.php"; ?>