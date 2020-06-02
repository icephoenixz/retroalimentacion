<?php 
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id']) && Session::get('role') != 'Admin'){
        exit();
    }
    include_once "classes/Feedbacks.php";
    include_once "classes/Users.php";
    include_once 'common.php';
    $feedback = new Feedbacks();
    if(isset($_GET['id'])){
        $feedback->setId($_GET['id']);
        //$result = $feedback->viewAdminFeedback();
        if(Session::get('role') == 'Admin'){
            $result = $feedback->viewAdminFeedback();
        }else{
               exit();
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
                                <b>Nombre del Estudiante</b>
                                <hr/>
                                <?php 
                                    $user = new Users();
                                    $user->setId($row['user_student_id']);
                                    $userResult = $user->getUserById();
                                    $userrow = $userResult->fetch_assoc();
                                ?>
                                <?php echo $userrow['fname']." ".$userrow['lname']; ?><br/><br/>
                                <b> Grado</b>
                                <hr/>
                                <?php echo $row['grade']; ?>
                            </div>
                            <div class="col-md-9 col-xs-12">
                                <b> Mensaje</b>
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