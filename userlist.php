<?php 
    include_once 'classes/Session.php';
    Session::start();
    if(!isset($_SESSION['id']) && Session::get('role') != 'Admin'){
        exit();
    }
    include_once "classes/Users.php";
    $user = new Users();
    if(isset($_POST['fname'])){
        $user->setFname($_POST['fname']);
        $user->setLname($_POST['lname']);
        $user->setMobile($_POST['mobile']);
        $start = $_POST['start']; //start date 
        $end = $_POST['end']; //end date
        $result = $user->selectUserByDate($start,$end);
        
    }else{
        $result = $user->selectAllUser();
    }
include_once 'common.php';
$userlist="active";
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
                                <input type='text' class="form-control" placeholder="Nombre" name="fname">
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class="form-control" placeholder="Apellido" name="lname">
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class="form-control" placeholder="Celular" name="mobile">
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class="form-control date datepicker" placeholder="Fecha Ingreso" name="start" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class="form-control date datepicker" placeholder="Fecha Salida" name="end" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                            </div>
                            <div class='col-md-2'>
                                <button type="submit" name="search" class="btn btn-primary"><strong><span class="fa fa-search"></span> &nbsp;&nbsp;Búsqueda</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome-section">
                                <h4 class="text-center"> Lista de Usuarios </h4> 
                                <div class="border"></div>
                                <br/>
                                <?php Session::getMessage(); ?>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No Registro</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Móvil</th>
                                            <th>Creado desde</th>
                                            <th>Acción </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No Registro</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Móvil</th>
                                            <th>Creado desde</th>
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
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['mobile']; ?></td>
                                            <td><?php echo date('d-m-Y H:i:s',strtotime($row['created'])); ?></td>
                                            <td>
                                                <a href="deleteuser.php?id=<?php echo $row['id']; ?>" title="eliminar"><span class='fa fa-trash sp'></span></a>&nbsp;&nbsp;
                                                <a href="edituser.php?id=<?php echo $row['id']; ?>" title="editar"><span class='fa fa-edit sp'></span></a>&nbsp;&nbsp;
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