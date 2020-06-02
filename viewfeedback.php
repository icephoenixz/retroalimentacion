<?php 
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id'])){
        exit();
    }
    include_once "classes/Feedbacks.php";
    include_once 'common.php';
    $feedback = new Feedbacks();
    if(isset($_GET['id'])){
        $feedback->setId($_GET['id']);
        if(Session::get('role') == 'Student'){
            $result = $feedback->viewStudentFeedback(Session::get('id'));
            $byto = "To";
        }else if(Session::get('role') == 'Professor'){
            $result = $feedback->viewProfessorFeedback(Session::get('id'));
            $byto = "By";
        }else{

        }
    }else{
        exit();
    }
    $feedbacklist = "active";
    include  "header.php";
?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section">
            <div class="container">
                <div class="row"></div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                        <?php if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            ?>
                        <div class="col-md-12 welcome-section">
                            <h4 class="text-center">Retroalimentación de <?php echo $row['fname']." ".$row['lname']; ?></h4>
                            <div class="border"></div>
                            <div class="col-md-3 col-xs-12">
                                Nivel de Satisfacción
                                <hr/>
                                <?php echo $row['grade']; ?>
                            </div>
                            <div class="col-md-9 col-xs-12">
                                Mensaje
                                <hr/>
                                <span class="text-justify"> 
                                    <?php echo $row['msg']; ?>
                                </span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
             
            </div>
        </section>
<?php include "footer.php"; ?>