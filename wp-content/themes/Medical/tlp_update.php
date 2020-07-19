<?php
/*
Template Name: update
*/
global $theme; get_header(); 

    include("db.php");
    if(isset($_GET['id'])){
        $editar_id = $_GET['id'];
        $sql = "SELECT * FROM  formulario_registro WHERE id_registro = '$editar_id'";
        $ejecutar = mysqli_query($con, $sql);
        $fila = mysqli_fetch_array($ejecutar);

        $especialidad = $fila['especialidad'];
        $tipo = $fila['tipo'];
        $nombre = $fila['nombre'];
        $matricula = $fila['nro_matricula'];
        $direccion = $fila['direccion'];
        $departamento = $fila['departamento'];
        $web = $fila['pagina_web'];
        $fono = $fila['telefono'];
        $estado = $fila['estado'];
        $descripcion = $fila['descripcion'];
        $imagen = $fila['imagen'];
        $atencion = $fila['horario'];
    }
?>
    <div id="main">
        <div class="container">                                
            <h5 class="widgettitle">DAR DE ALTA AL REGISTRO</h5>
            <div class="card mb-4" style="max-width: 1540px;">
                <div class="row no-gutters">
                    <div class="col-md-3"> <BR>
                        <img src="data:image/jpg;base64,<?php if($resultado) echo base64_encode($resultado['imagen']); ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="">
                                <table borde="1">
                                    <tr>
                                        <td><label for="validationDefault02" class="title">ESPECIALIDAD / RUBRO:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="especialidad" value="<?php echo $especialidad; ?>" disabled></td>
                                    </tr> 
                                    <tr>
                                        <td><label for="validationDefault02" class="title">TIPO DE PUBLICACION:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="tipo" value="<?php echo $tipo; ?>" disabled></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">NOMBRE / RAZON SOCIAL:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="nombre" value="<?php echo $nombre; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">N° MATRICULA / NIT:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="matricula" value="<?php echo $matricula; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">DIRECCION:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="direccion" value="<?php echo $direccion; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">DEPARTAMENTO:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="departamento" value="<?php echo $departamento; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">N° TELEFONO:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="fono" value="<?php echo $fono; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">PAGINA WEB:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="web" value="<?php echo $web; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">EXPERIENCIA PROFESIONAL:</label></td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="descripcion" value="<?php echo $descripcion; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">ESTADO:</label> </td>
                                        <td><input type="text" class="form-control form-control-sm" id="validationDefault02" name="estado" value="<?php echo $estado; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="validationDefault02" class="title">ATENCION 24 HORAS:</label></td>
                                        <td>
                                            
                                            <input type="text" class="form-control form-control-sm" id="validationDefault02" name="atencion"  value="<?php echo $atencion; ?>">
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td colspan ="2">
                                            <input type="submit" class="btn btn-primary" name="actualizar" value="Actualizar">
                                            <a href="<?php echo get_home_url();?>/form_alta/" class="btn btn-danger">Cancelar</a>
                                        </td>
                                    </tr>
                                </table>                                                                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div><!-- #main -->

    <?php 
        if(isset($_POST['actualizar'])){
            $actualizar_nombre = $_POST['nombre'];
            $actualizar_matricula = $_POST['matricula'];
            $actualizar_direccion = $_POST['direccion'];
            $actualizar_departamento = $_POST['departamento'];
            $actualizar_fono = $_POST['fono'];
            $actualizar_web = $_POST['web'];
            $actualizar_descripcion = $_POST['descripcion'];
            $actualizar_estado = $_POST['estado'];
            $actualizar_atencion = $_POST['atencion'];

            $actualizar = "UPDATE formulario_registro 
            SET nombre='$actualizar_nombre', nro_matricula='$actualizar_matricula', direccion='$actualizar_direccion', 
            departamento='$actualizar_departamento', telefono='$actualizar_fono', pagina_web='$actualizar_web', 
            descripcion='$actualizar_descripcion',estado='$actualizar_estado', horario='$actualizar_atencion'
            WHERE id_registro = '$editar_id'";
            
            $ejecutar = mysqli_query($con, $actualizar);

            if($ejecutar){
                echo "<script>alert('Datos Actualizados')</script>";
                echo "<script>window.open('form_alta','_self')</script>";
            }
        }
    ?>
    
<?php get_footer(); ?>