<?php
/*
Template Name: verefica
*/
global $theme; get_header(); 

    // include_once 'dbconnect.php';
    // if(isset($_GET['ver'])){
    //     $id_registro=(int) $_GET['ver'];
    //     $ver_id=$con->prepare('SELECT * FROM formulario_registro WHERE id_registro=:id_registro');
    //     $ver_id->execute(array(
    //         ':id_registro'=>$id_registro
    //     ));
    //     $resultado=$ver_id->fetch();
    // }else{
    //     header('Location: index.php');
    // }
?>
    <div id="main">
        
        <div id="content"> 
           
            <?php $theme->hook('content_after'); ?>

            <div class="container">                                
                <div class="card">
                    
                        <h5 class="widgettitle">DATOS: ESPECIALISTAS / EMPRESAS DE SALUD</h5>
                    
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title title">Nombre del Especialista / Empresa: </h6> <label class="card-text"><?php if($resultado) echo $resultado['nombre']; ?></label>
                                        <h6 class="card-title title">Especialidad: </h6> <label class="card-text"><?php if($resultado) echo $resultado['especialidad']; ?></label>
                                        <h6 class="card-title title">Numero de Matricula: </h6> <label class="card-text"><?php if($resultado) echo $resultado['nro_matricula']; ?></label>
                                        <h6 class="card-title title">Direccion: </h6> <label class="card-text"><?php if($resultado) echo $resultado['direccion']; ?></label>
                                        <h6 class="card-title title">Departamento:</h6> <label class="card-text"><?php if($resultado) echo $resultado['departamento']; ?></label>
                                        <h6 class="card-title title">Telefono: </h6> <label class="card-text"><?php if($resultado) echo $resultado['telefono']; ?></label>
                                        <h6 class="card-title title">Pagina Web: </h6> <label class="card-text"><a href="#" class="card-link"><?php if($resultado) echo $resultado['pagina_web']; ?></a></label>
                                        <h6 class="card-title title">Descripción: </h6> <label class="card-text"><?php if($resultado) echo $resultado['descripcion']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card mb-3">
                                            <img src="data:image/jpg;base64,<?php if($resultado) echo base64_encode($resultado['imagen']); ?>" class="card-img-top" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    <div class="card-footer text-muted">
                        <a href="http://localhost/saludbolivia" class="btn btn-primary">Buscar Nuevo</a>
                    </div>
                </div>
            </div>   

            <?php $theme->hook('content_after'); ?>
        
        </div><!-- #content -->
    
        <?php get_sidebars(); ?>
        
        <?php $theme->hook('main_after'); ?>
        
    </div><!-- #main -->
    
<?php get_footer(); ?>