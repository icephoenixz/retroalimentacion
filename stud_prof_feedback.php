<?php 
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id'])){
        exit();
    }
    include_once "classes/Feedbacks.php";
    include_once 'common.php';
    $feedback = new Feedbacks();
    if(Session::get('role') == 'Student'){
        $result = $feedback->studentFeedback(Session::get('id'));
        $NAME = "Professor";
    }else if(Session::get('role') == 'Professor'){
        $result = $feedback->professorFeedback(Session::get('id'));
        $NAME = "Student";
    }else{
        exit();
    }
    $feedbacklist ="active";
    include  "header.php";
?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section">
            <div class="container">
                <div class="row" style="margin-top: 10px">
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome-section">
                                <h4 class="text-center"> Tus retroalimentaciones </h4> 
                                <?php if(Session::get('role') == "Student"){ ?>
                                <a href="addfeedback.php" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span> Agrega tu Retroalimentación</a>
                                <?php } ?>
                                <div class="border"></div>
                                <br/>
                                <?php Session::getMessage(); ?>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO Reg.</th>
                                            <th><?php echo $NAME ?></th>
                                            <th>Retroalimentación</th>
                                            <th>Grado</th>
                                            <th>Fecha</th>
                                            <th>Ver más</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO Reg.</th>
                                            <th><?php echo $NAME ?></th>
                                            <th>Retroalimentación</th>
                                            <th>Grado</th>
                                            <th>Fecha</th>
                                            <th>Ver más</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if($result->num_rows > 0) {
                                                $count=1;
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                            <td><?php echo $row['grade']; ?></td>
                                            <td><?php echo substr($row['msg'], 0, 40); ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($row['created'])); ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="viewfeedback.php?id=<?php echo $row['id']; ?>">
                                                    Ver más
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                                $count++;
                                                    }
                                            } ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12"></div>
                </div><!-- /.row -->
            </div>
        </section>
<?php include "footer.php"; ?>