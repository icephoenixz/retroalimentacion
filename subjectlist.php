<?php 
    include_once 'common.php';
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id']) && Session::get('role') != 'Admin'){
        exit();
    }
    include_once "classes/Subjects.php";
    $subjects = new Subjects();
    if(isset($_POST['name'])){
        $subjects->setName($_POST['name']);
        $result = $subjects->searchSubject($_POST['fname']);
    }else{
        $result = $subjects->selectAllSubject();
        
    }
    $subjectlist ="active";
    include  "header.php";
?>
<link rel="stylesheet" href="css/header.css" >
<!-- Start Feature Section -->
        <section id="feature" class="feature-section first-section">
            <div class="container">
                <div class="row"></div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                        <form method="post">
                            <div class='col-md-5'>
                                <input type='text' class="form-control" placeholder="Subject Name" name="name">
                            </div>
                            <div class='col-md-5'>
                                <input type='text' class="form-control" placeholder="Professor First Name" name="fname">
                            </div>
                            <div class='col-md-2'>
                                <button type="submit" name="search" class="btn btn-primary"><strong><span class="fa fa-search"></span> &nbsp;&nbsp;Search</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome-section">
                            <br/>
                            <br/>
                            <a href="addsubject.php" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span> Agregar Tema</a>
                                <h4 class="text-center"> Lista de Temas </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php Session::getMessage(); ?>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO Reg</th>
                                            <th>Título del Tema</th>
                                            <th>Nombre Profesor</th>
                                            <th>Apellido Profesor</th>
                                            <th>Acción </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>NO Reg</th>
                                            <th>Título del Tema</th>
                                            <th>Nombre Profesor</th>
                                            <th>Apellido Profesor</th>
                                            <th>Acción </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if($result->num_rows > 0) {
                                                $count=1;
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['fname']; ?></td>
                                            <td><?php echo $row['lname']; ?></td>
                                            <td>
                                                <a href="deletesubject.php?id=<?php echo $row['id']; ?>" title="delete"><span class='fa fa-trash sp'></span></a>&nbsp;&nbsp;
                                                <a href="editsubject.php?id=<?php echo $row['id']; ?>" title="edit"><span class='fa fa-edit sp'></span></a>
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