<?php
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id']) && Session::get('role') != 'Professor'){
        exit();
    }
    include_once "classes/Professors.php";
    include_once "classes/Users.php";

if(isset($_POST['fname'])){
        $imgArr = $_FILES['profile']; 
        $user = new Users();
        $user->setFname($_POST['fname']);
        $user->setLname($_POST['lname']);
        $user->setDob(date('Y-m-d',strtotime($_POST['dob'])));
        $user->setGender($_POST['gender']);
        $user->setMobile($_POST['mobile']);
        $user->setAddress($_POST['address']);
        $user->setQuestion($_POST['question']);
        $user->setAnswer($_POST['answer']);
        $professor = new Professors();
        $professor->setId(Session::get('id'));
        $professor->setDepartment($_POST['department']);
        $professor->setDesignation($_POST['designation']);
        $professor->setSpecification($_POST['specification']);
        $professor->editByProfessor($imgArr,$user);
}
    $professor = new Professors();
    $professor->setId(Session::get('id'));
    $result = $professor->getProfessor();
    if($result->num_rows <= 0){
        $type = "warning";
            $msg = "<strong>Warning !</strong> No record found !";
            Session::setMessage($type, $msg);
    }
    include_once 'common.php';
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
                                <h4 class="text-center"> Edita tu Registro </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php echo Session::getMessage();?>
                                <?php if($result->num_rows > 0){ 
                                    ?>
                                    <form  enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type='text' name="fname" class="form-control" value='<?php echo $row['fname']; ?>' />
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input type='text' name="lname" class="form-control" value='<?php echo  $row['lname']; ?>' />
                                        </div>
                                    <div class="form-group">
                                        <label>Número Celular</label>
                                        <input type="text" name="mobile" class="form-control" name="mobile" value="<?php echo $row['mobile'] ?>" id="mobile" data-validate="required,mobileNumber" placeholder="Celular *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control date datepicker"  data-provide="datepicker" value="<?php echo date('d-m-Y' ,strtotime($row['dob'])); ?>" data-date-format="dd-mm-yyyy" name="dob" id="dob" data-validate="required" placeholder="Fecha de Nacimiento *">
                                    </div> 
                                    <div class="form-group">
                                        <label>Género</label>
                                        <input type="radio" name="gender"  value="Male"  <?php if($row['gender'] == "Male") echo "checked"; ?>> Hombre &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="gender"  value="Female"  <?php if($row['gender'] == "Female") echo "checked"; ?>> Mujer
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <textarea name="address" class="form-control" id="address" placeholder="Address"><?php echo $row['address'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <select class="form-control" name="department" data-validate="required">
                                            <option value="">-- Seleccionar --</option>
                                            <option value='CSE' <?php if($row['department'] == "CSE") echo "selected"?>>CSE</option>
                                            <option value='IT' <?php if($row['department'] == "IT") echo "selected"?>>IT</option>
                                            <option value='ME' <?php if($row['department'] == "ME") echo "selected"?>>ME</option>
                                            <option value='CIVIL' <?php if($row['department'] == "CIVIL") echo "selected"?>>CIVIL</option>
                                            <option value='EC' <?php if($row['department'] == "EC") echo "selected"?>>EC</option>                                            
                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label>Designación</label>
                                            <input type="text" class="form-control" name="designation" value="<?php echo $row['designation']; ?>" data-validate="required" placeholder="Designación *">
                                        </div>
                                        <div class="form-group">
                                            <label>Especificación</label>
                                            <input type="text" class="form-control" name="specification" value="<?php echo $row['specification']; ?>"  data-validate="required" placeholder="Especificación *">
                                        </div>
                                        <div class="form-group">
                                            <label>Selecciona Pregunta</label>
                                            <select class="form-control" name="question" data-validate="required">
                                                <option value="">-- Selecciona --</option>
                                                <option value='1' <?php if($row['question'] == 1) echo "selected"; ?>>Nombre de tu primera escuela</option>
                                                <option value='2' <?php if($row['question'] == 2) echo "selected"; ?>>Nombre de tu restaurante favorito</option>
                                                <option value='3' <?php if($row['question'] == 3) echo "selected"; ?>>Nombre de tu actor favorito</option>
                                                <option value='4' <?php if($row['question'] == 4) echo "selected"; ?>>Tu película favorita</option>
                                                <option value='5' <?php if($row['question'] == 5) echo "selected"; ?>>Nombre de la persona que admiras</option>>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Respuesta</label>
                                            <input type="text" class="form-control" name="answer" value="<?php echo $row['answer']; ?>" id="answer" data-validate="required" placeholder="Answer *">
                                        </div>
                                        <div class="form-group">
                                            <label>Selecciona Foto</label>
                                            <input type="file" class="form-control" name="profile" id="profile"  >
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="editstudent" class="btn btn-primary" id="editStudent" value="editstudent"><strong>Editar</strong></button>
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