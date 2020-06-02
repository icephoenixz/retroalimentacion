<?php
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id']) && Session::get('role') != 'Student'){
        exit();
    }
    include_once "classes/Students.php";
    $student = new Students();
if(isset($_POST['branch'])){
        $student->setRoll_no($_POST['roll_no']);
        $student->setBranch($_POST['branch']);
        $student->setSemester($_POST['semester']);
        $student->setStart_year($_POST['start_year']);
        $student->setEnd_year($_POST['end_year']);
        $student->setStatus(1);
        $student->saveStudent();
}
if($student->studentExist()){
        header("location:stud_prof_feedback.php");
    }
include_once 'common.php';
$show="hidden";
include  "header.php" ?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="welcome-section">
                                <h4 class="text-center"> Información del Estudiante </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php echo Session::getMessage();?>
                                <form  enctype="multipart/form-data" method="post">
                                     <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <input type='text' readonly="" class="form-control" value='<?php echo Session::get('fname'); ?>' />
                                        </div>
                                     </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <input type='text' readonly="" class="form-control" value='<?php echo  Session::get('lname'); ?>' />
                                        </div>
                                     </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <input type='text' readonly="" class="form-control" value='<?php echo Session::get('email'); ?>' />
                                        </div>
                                     </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="roll_no"  class="form-control" placeholder="Ingrese número de matrícula" data-validate="required" >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <select class="form-control" name="branch" data-validate="required">
                                                <option value="">-- Área de Estudio --</option>
                                                <option value='CSE'>CSE</option>
                                                <option value='IT'>IT</option>
                                                <option value='ME'>ME</option>
                                                <option value='CIVIL'>CIVIL</option>
                                                <option value='EC'>EC</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <select class="form-control" name="semester" data-validate="required">
                                                <option value="">-- Seleccione Semestre --</option>
                                                <option value='Primero'>Primer Semestre</option>
                                                <option value='Segundo'>Segundo Semestre</option>
                                                <option value='Tercero'>Tercer Semestre</option>
                                                <option value='Cuarto'>Cuarto Semestre</option>
                                                <option value='Quinto'>Quinto Semestre</option>
                                                <option value='Sexto'>Sexto Semestre</option>
                                                <option value='Séptimo'>Séptimo Semestre</option>
                                                <option value='Octavo'>Octavo Semestre</option>
                                                <option value='Noveno'>Noveno Semestre</option>
                                                <option value='Decimo'>Décimo Semestre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <select class="form-control" name="start_year" data-validate="required">
                                                <option value="">-- Año de Inicio --</option>
                                                <?php for($i=2015;$i <= 2025;$i++){ ?>
                                                        <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <select class="form-control" name="end_year" data-validate="required">
                                                <option value="">-- Año de Finalización --</option>
                                                <?php for($i=2015;$i <= 2025;$i++){ ?>
                                                        <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <button type="submit" name="addstudent" class="btn btn-primary" id="addStudent" ><strong>Enviar</strong></button>
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