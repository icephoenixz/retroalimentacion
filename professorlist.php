<?php 
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id']) && Session::get('role') != 'Admin'){
        exit();
    }
    include_once "classes/Professors.php";
    include_once 'common.php';
    $professor = new Professors();
    if(isset($_POST['fname'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $start = $_POST['start']; //start date 
        $end = $_POST['end']; //end date
        $professor->setDepartment($_POST['department']);
        $result = $professor->searchProfessor($fname,$lname,$start,$end);
    }else{
        $result = $professor->selectAllProfessor();
    }
$professorlist = "active";
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
                            <div class='col-md-2'>
                                <input type='text' class="form-control" placeholder="First Name" name="fname">
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class="form-control" placeholder="Last Name" name="lname">
                            </div>
                            <div class='col-md-2'>
                                <select class="form-control" name="department" data-validate="required">
                                    <option value="">-- Selecciona Sección --</option>
                                    <option value='CSE'>CSE</option>
                                    <option value='IT'>IT</option>
                                    <option value='ME'>ME</option>
                                    <option value='CIVIL'>CIVIL</option>
                                    <option value='EC'>EC</option>                                    
                                </select>
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class="form-control date datepicker" placeholder="Start Date" name="start" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class="form-control date datepicker" placeholder="End Date" name="end" data-provide="datepicker" data-date-format="dd-mm-yyyy">
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
                                <h4 class="text-center"> Lista de Profesores </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php Session::getMessage(); ?>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO Registro</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Departmento</th>
                                            <th>Designación</th>
                                            <th>Creado</th>
                                            <th>Acción </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>NO Registro</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Departmento</th>
                                            <th>Designación</th>
                                            <th>Creado</th>
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
                                            <td><?php echo $row['fname']; ?></td>
                                            <td><?php echo $row['lname']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['designation']; ?></td>
                                            <td><?php echo date('d-m-Y H:i:s',strtotime($row['created'])); ?></td>
                                            <td>
                                                <a href="deleteprofessor.php?id=<?php echo $row['id']; ?>" title="eliminar"><span class='fa fa-trash sp'></span></a>&nbsp;&nbsp;
                                                <a href="editprofessor.php?id=<?php echo $row['id']; ?>" title="editar"><span class='fa fa-edit sp'></span></a>&nbsp;&nbsp;
                                                <a href="professorprofile.php?id=<?php echo $row['user_id']; ?>" title="ver"><span class='fa fa-user sp'></span></a>
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