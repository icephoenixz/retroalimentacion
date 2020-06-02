<?php
    include_once 'common.php';
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id'])){
        exit();
    }
    include_once 'classes/Professors.php';
    include_once 'classes/Students.php';
    $student = new Students();
    $StudentData = $student->getStudentData(Session::get('id'));
    $professor = new Professors();
    $result = $professor->selectProfessorByDepartment($StudentData['branch']);
    
if(isset($_POST['msg'])){
    include_once "classes/Feedbacks.php";
    $feedback = new Feedbacks();
    $feedback->setUser_professor_id($_POST['user_professor_id']);
    $feedback->setUser_student_id(Session::get('id'));
    $feedback->setGrade($_POST['grade']);
    $feedback->setMsg($_POST['msg']);
    $feedback->saveFeedback();
}
include  "header.php" ?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="welcome-section">
                                <h4 class="text-center"> Deja tu Retroalimentación </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php echo Session::getMessage();?>
                                <form  enctype="multipart/form-data" method="post">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select class="form-control" data-validate="required" name="user_professor_id">
                                            <option value="">-- Selecciona Profesor --</option>
                                            <?php if($result->num_rows > 0){
                                              while($row = $result->fetch_assoc()){ ?>
                                                  <option value="<?php echo $row['user_id'] ?>"><?php echo $row['fname']." ".$row['lname']; ?></option>
                                            <?php  }  
                                            }?>
                                        </select>  
                                    </div>
                                </div>
                                 <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                         <select class="form-control" data-validate="required" name="grade">
                                            <option value="">-- Nivel de Satisfacción --</option>
                                            <option value="Excelente">Excelente</option>
                                            <option value="Muy bueno">Muy bueno</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Promedio">Promedio</option>
                                            <option value="Malo">Malo</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" name="msg"  required="" placeholder="Escribe tu retroalimentación"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" name="send" class="btn btn-primary" ><strong>Enviar</strong></button>
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