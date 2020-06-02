<?php
    if((!isset($_POST['id']) && (!isset($_GET['id'])))){
        exit();
    }
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id']) && Session::get('role') != 'Admin'){
        exit();
    }
    include_once "classes/Users.php";

if(isset($_POST['fname'])){
        $user = new Users();
        $imgArr = $_FILES['profile'];
        $user->setId($_POST['id']);
        $user->setFname($_POST['fname']);
        $user->setLname($_POST['lname']);
        $user->setMobile($_POST['mobile']);
        $user->setDob(date('Y-m-d',  strtotime($_POST['dob'])));
        $user->setGender($_POST['gender']);
        $user->setQuestion($_POST['question']);
        $user->setAnswer($_POST['answer']);
        $user->setAddress($_POST['address']);
        if(Session::get('role')=="Admin"){
            $user->setStatus($_POST['status']);
            $user->setRole($_POST['role']);
        }
        echo $user->editUser($imgArr);
}
if(isset($_GET['id'])){
    $user = new Users();
    $user->setId($_GET['id']);
    $result = $user->getUserById();
    if($result->num_rows <= 0){
        $type = "warning";
        $msg = "<strong>Warning !</strong> No record found !";
        Session::setMessage($type, $msg);
    }
}
    include_once 'common.php';
    $userlist="active";
include  "header.php" ?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <?php if($result->num_rows > 0){
                             $row = $result->fetch_assoc();
                             if($row['imgurl'] != ""){
                                 $imgurl = "profile/".$row['imgurl'];
                             }else{
                                 $imgurl = "profile/profile.png";
                             }
                            ?>
                        <div class="welcome-section">
                            <img class="img-circle" src="<?php echo $imgurl; ?>" >
                            <h4 class="text-center">
                                <?php echo $row['fname']." ".$row['lname']; ?>
                            </h4>
                            <div class="border"></div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="welcome-section">
                                <h4 class="text-center"> Editar Usuario </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php echo Session::getMessage();?>
                                <?php if($result->num_rows > 0){ 
                                    ?>
                                    <form  enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="fname">Nombre</label>
                                            <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $row['fname']; ?>" data-validate="required,nameValidate" >
                                        </div>
                                    </div>
                                     <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="lname">Apellido</label>
                                            <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $row['lname']; ?>"  data-validate="required,nameValidate" >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="mobile">Teléfono Celular</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row['mobile'] ?>" data-validate="required,mobileNumber" >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="dob">Fecha de Nacimiento</label>
                                            <input type="text" class="form-control date datepicker"  data-provide="datepicker" value="<?php echo date('d-m-Y',  strtotime($row['dob'])); ?>" data-date-format="dd-mm-yyyy" name="dob" id="dob" data-validate="required" >
                                        </div>
                                    </div>
                                     <div class="col-md-12 col-xs-12">
                                            <label >Género</label>
                                        <div class="form-group">
                                            <input type="radio" name="gender"  value="Hombre" <?php if($row['gender'] == "Male") echo "checked"; ?> > Hombre &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="gender"  value="Mujer" <?php if($row['gender'] == "Female") echo "checked"; ?> > Mujer 
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="email">Correo</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" id="email" readonly="" >
                                        </div>
                                    </div>
                                <?php  if(Session::get('role')=="Admin"){ ?>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="role">Rol de Usuario</label>
                                        <select class="form-control" name="role" id="role" data-validate="required">
                                            <option value="" >-- Seleccionar Rol --</option>
                                            <option value='Student' <?php  if($row['role']=="Student") echo "selected" ?>>Estudiante</option>
                                            <option value='Professor' <?php  if($row['role']=="Professor") echo "selected" ?> >Profesor</option>
                                            <option value='Admin' <?php  if($row['role']=="Admin") echo "selected" ?>>Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="status">Estado</label>
                                        <select class="form-control" name="status" id="status" data-validate="required">
                                            <option value='1' <?php  if($row['status']==1) echo "selected" ?>>Activo</option>
                                            <option value='0' <?php  if($row['status']==0) echo "selected" ?> >Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                    <div class="col-md-12 col-xs-12">
                                        <label for="address">Dirección</label>
                                        <div class="form-group">
                                            <textarea name="address" class="form-control" id="address" ><?php echo $row['address']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="question">Pregunta</label>
                                            <select class="form-control" name="question" data-validate="required">
                                                <option value="">-- Seleccionar --</option>
                                                <option value='1' <?php if($row['question'] == 1) echo "selected"; ?>>Nombre de tu primera escuela</option>
                                                <option value='2' <?php if($row['question'] == 2) echo "selected"; ?>>Nombre de tu restaurante favorito</option>
                                                <option value='3' <?php if($row['question'] == 3) echo "selected"; ?>>Nombre de tu actor favorito</option>
                                                <option value='4' <?php if($row['question'] == 4) echo "selected"; ?>>Tu película favorita</option>
                                                <option value='5' <?php if($row['question'] == 5) echo "selected"; ?>>Nombre de una persona que admiras</option>>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <label for="answer">Respuesta</label>
                                        <div class="form-group">
                                            <input type="answer" class="form-control" name="answer" id="answer" value="<?php echo $row['answer']; ?>" data-validate="required" >
                                        </div>
                                    </div>
                                     <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Selecciona Foto de Perfil</label>
                                            <input type="file" class="form-control" name="profile" id="profile"  >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <button type="submit" name="register" class="btn btn-primary pull-right" id="register" value="register"><strong>Enviar</strong></button>
                                           <br/><br/>
                                        </div>
                                    </div>
                                </form>
                                <br/>
                                <?php } ?>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
        </section>
<?php include "footer.php"; ?>