<?php
/*
Template Name: form
*/
global $theme; get_header(); 
?>
    <div id="main">
        <?php $theme->hook('main_before'); ?>
        <div id="content"> 
            <?php $theme->hook('content_before'); ?>    

            <h1 class="widgettitle">REGISTRO DE PROFESIONALES / EMPRESAS DE SALUD</h1>
            <?php
                include("db.php");
                if(isset($_GET['id'])){
                    $editar_id = $_GET['id'];
                    $editar_id = $_GET['id'];
                    $sql = "SELECT * FROM  wp_users WHERE ID = '$editar_id'";
                    $ejecutar = mysqli_query($con, $sql);
                    $fila = mysqli_fetch_array($ejecutar);
                    $iduser = $fila['ID'];
                    echo $iduser;
                }
            ?>
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">PUBLICIDAD PARA PROFESIONALES</h5>                        
                    </div>
                    <div class="card-body">
                        <p class="card-text">Registro Gratuito por un Año.</p>
                        <p class="card-text">Activación de cuenta en 24 Hrs. </p>
                        <p class="card-text">Atención 24 Horas, le permite a sus pacientes saber que esta de turno.</P>
                        <p class="card-text"><a href="#">Políticas de Uso</a></p>                   
                    </div>
                    <div class="card-footer">
                        <small class="text-muted text-center"><a href="<?php echo get_home_url();?>/form_registro/" class="btn btn-danger">REGISTRAR</a></small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">PUBLICIDAD PARA EMPRESAS</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Registro de Pago</p>
                        <p class="card-text">Bs. 365 (1 Boliviano por Día)</P>
                        <p class="card-text">Activación de cuenta por el administrador por un año</p>
                        <p class="card-text"><a href="#">Políticas de Uso</a></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted text-center"><a href="<?php echo get_home_url();?>/form_empresa/" class="btn btn-danger">REGISTRAR</a></small>
                    </div>
                </div>
            </div>


            <?php $theme->hook('content_after'); ?>
        
        </div><!-- #content -->
    
        <?php get_sidebars(); ?>
        
        <?php $theme->hook('main_after'); ?>
        
    </div><!-- #main -->
    
<?php get_footer(); ?>