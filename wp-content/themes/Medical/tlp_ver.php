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
        header('Location: http://localhost/saludbolivia/form_alta/');
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
                            <h5 class="card-title"><?php if($resultado) echo $resultado['nombre']; ?></h5>
                            <p class="card-text">
                                <strong>ESPECIALIDAD / RUBRO:</strong>  <?php if($resultado) echo $resultado['especialidad']; ?><BR>
                                <strong>N° MATRICULA / NIT :</strong>  <?php if($resultado) echo $resultado['nro_matricula']; ?><BR>
                                <strong>TELEFONO : </strong>  <?php if($resultado) echo $resultado['telefono']; ?><BR>
                                <strong>DIRECCION : </strong>  <?php if($resultado) echo $resultado['direccion']; ?><BR>
                                <strong>DEPARTAMENTO : </strong>  <?php if($resultado) echo $resultado['departamento']; ?><BR>
                                <strong>PAGINA WEB : </strong>  <?php if($resultado) echo $resultado['pagina_web']; ?><BR>
                                <strong>EXPERIENCIA: </strong>  <?php if($resultado) echo $resultado['descripcion']; ?><BR>
                                <strong>FECHA DE REGISTRO: </strong>  <?php if($resultado) echo $resultado['fecha_registro']; ?><BR>
                                <strong>ESTADO: </strong>  <?php if($resultado) echo $resultado['estado']; ?><BR>
                                <strong>ATENCION 24 HRS: </strong>  <?php if($resultado) echo $resultado['horario']; ?><BR>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="http://localhost/saludbolivia/form_alta/" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>   
    </div><!-- #main -->   
    
<?php get_footer(); ?>