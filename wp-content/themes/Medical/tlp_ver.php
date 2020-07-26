<?php
/*
Template Name: ver_detalle
*/
global $theme; get_header(); 

include_once 'dbconnect.php';
    if(isset($_GET['id'])){
        $id_registro=(int) $_GET['id'];
        $ver_id=$con->prepare('SELECT * FROM formulario_registro WHERE id_registro=:id_registro');
        $ver_id->execute(array(
            ':id_registro'=>$id_registro
        ));
        $resultado=$ver_id->fetch();
    }else{
        header('Location: form_alta');
    }

?>
    <div id="main">
        <div class="container">                                     
    
            <h5 class="widgettitle">DETALLE DE USUARIO REGISTRADO</h5>

            <div class="card mb-4" style="max-width: 1540px;">

            <div class="card-header title"><?php if($resultado) echo $resultado['tipo']; ?> DE BOLIVIA</div>

                <div class="row no-gutters">
                    <div class="col-md-3"> <BR>
                        <img src="data:image/jpg;base64,<?php if($resultado) echo base64_encode($resultado['imagen']); ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong><?php if($resultado) echo $resultado['nombre']; ?></strong></h5>
                            <p class="card-text">
                                <strong>ESPECIALIDAD / RUBRO:</strong>  <?php if($resultado) echo $resultado['especialidad']; ?><BR>
                                <strong>N° MATRÍCULA / NIT :</strong>  <?php if($resultado) echo $resultado['nro_matricula']; ?><BR>
                                <strong>TELÉFONO : </strong>  <?php if($resultado) echo $resultado['telefono']; ?><BR>
                                <strong>DIRECCIÓN : </strong>  <?php if($resultado) echo $resultado['direccion']; ?><BR>
                                <strong>DEPARTAMENTO : </strong>  <?php if($resultado) echo $resultado['departamento']; ?><BR>
                                <strong>PÁGINA WEB : </strong>  <?php if($resultado) echo $resultado['pagina_web']; ?><BR>
                                <strong>EXPERIENCIA: </strong>  <?php if($resultado) echo $resultado['descripcion']; ?><BR>
                                <strong>FECHA DE REGISTRO: </strong>  <?php if($resultado) echo $resultado['fecha_registro']; ?><BR>
                                <strong>ESTADO: </strong>  <?php if($resultado['estado']==1) echo 'VIGENTE'; if($resultado['estado']==0) echo 'NO VIGENTE';  ?><BR>
                                <strong>ATENCIÓN 24 HRS: </strong>  <?php if($resultado['horario']==1) echo 'SI'; if($resultado['horario']==0) echo 'NO'; ?><BR>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo get_home_url();?>/form_alta/" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>   
    </div><!-- #main -->   
    
<?php get_footer(); ?>