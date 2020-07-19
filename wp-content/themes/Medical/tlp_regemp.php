<?php
/*
Template Name: forempresa
*/
global $theme; get_header(); 

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

if(isset($_POST['guardar'])){
    $especialidad = $_POST['especialidad'];
    $tipo = 'EMPRESAS';
    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $fono = $_POST['fono'];
    $direccion = $_POST['direccion'];
    $departamento = $_POST['departamento'];
    $web = $_POST['web'];
    if(isset($_POST['horario'])){
        $horario = $_POST['horario'];
    }else{
        $horario = '0';
    }
    $descripcion = $_POST['descripcion'];
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }    
    $dataTime = date("Y-m-d H:i:s");
    $estado = '0'; 

    $sql = "INSERT INTO formulario_registro (especialidad,tipo,nombre,nro_matricula,telefono,direccion,departamento,pagina_web,horario,descripcion,imagen,fecha_registro,estado) 
    VALUES ('".$especialidad."','".$tipo."','".$nombre."','".$matricula ."','".$fono."','".$direccion."','".$departamento."','".$web."','".$horario."','".$descripcion."','".$imgContent."','".$dataTime."','".$estado."');";
    
    if (mysqli_query($con, $sql)){
        echo "<script>alert('Estimado Usuario: Su publicación se activará por un periodo de un año por el costo de Bs. 365 (trecientos sesenta y cinco bolivianos) . Puede realizar su depósito bancario a nombre de Solstar S.R.L. en: Banco Nacional de Bolivia Nro. ……….. Banco FIE Nro…….. Banco Mercantil Santa Cruz Nro…….. Banco de Crédito de Bolivia Nro ….. Banco Bisa Nro ………  SE DARA DE ALTA PREVIO A CONFIRMACION DEL PAGO');</script>"; 
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
    //header('Location: http://localhost/saludbolivia/');
}
  
?>
    <div id="main">
        <?php $theme->hook('main_before'); ?>
        <div id="content"> 
        <?php $theme->hook('content_before'); ?>    
            <h1 class="widgettitle">REGISTRO DE EMPRESAS</h1>
            <div class="card">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo get_home_url();?>/form_empresa/">    
                        <table>                      
                            <tr>
                                <td><label for="inputState" class="title">Rubro</label>
                                <select name="especialidad" id="inputState" class="custom-select custom-select-sm text-uppercase">
                                    <option>CLINICA</option>
                                    <option>FARMACIAS</option>
                                    <option>MATERIAL MEDICO</option>
                                    <option>MATERIAL DENTAL</option>
                                    <option>LABORATORIO</option>
                                    <option>IMAGENOLOGÍA - RAYOS X</option>
                                    <option>PROTESIS</option>
                                    <option>EMPRESAS FARMACEUTICAS</option>
                                    <option>SEGUROS MÉDICOS</option>
                                    <option>SERVICIOS</option>                                                                        
                                </select>
                                </td>
                                <td><br>
                                    <div class="custom-control custom-switch">                                    
                                        <input type="checkbox" class="custom-control-input text-uppercase" id="customSwitch1" name="horario" value="1">                                    
                                        <label class="custom-control-label title" for="customSwitch1">Atención 24 Horas</label>
                                    </div>                                                      
                                </td>
                            </tr>
                            <tr>
                                <td><label for="validationDefault02" class="title">Nombre de la Empresa</label><input type="text" class="form-control form-control-sm" id="validationDefault02" placeholder="Empresa" name="nombre" required></td>
                                <td>
                                    <label for="exampleFormControlFile1">Seleccionar Logotipo</label>
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="UPLOAD">                            
                                </td>
                            </tr>
                            <tr>
                                <td><label for="validationDefault02" class="title">Numero de Identificación Triburaria</label><input type="text" class="form-control form-control-sm" id="validationDefault02" placeholder="NIT" name="matricula" required></td>
                                <td><label for="validationDefault02" class="title">Numero de Telefono</label> <input type="text" class="form-control form-control-sm" id="validationDefault02" placeholder="Telefono" name="fono" required></td>
                            </tr>
                            <tr>                                
                                <td><label for="validationDefault02" class="title">Pagina WEB</label><input type="text" class="form-control form-control-sm" id="validationDefault02" placeholder="Pagina Web" name="web" required></td>
                                <td><label for="inputState" class="title">Departamento</label>
                                    <select name="departamento" id="inputState" class="custom-select custom-select-sm">
                                        <option>LA PAZ</option>
                                        <option>CHUQUISACA</option>
                                        <option>COCHABAMABA</option>
                                        <option>SANTA CRUZ</option>
                                        <option>ORURO</option>
                                        <option>POTOSI</option>
                                        <option>TARIJA</option>
                                        <option>BENI</option>
                                        <option>PANDO</option>                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="validationDefault02" class="title">Direccion</label><input type="text" class="form-control form-control-sm" id="validationDefault02" placeholder="Direccion" name="direccion" required></td>                        
                            </tr>
                            <tr>
                                <td colspan="2"><label for="validationTextarea" class="title">Experiencia de la Empresa</label><textarea class="form-control is-invalid-sm" id="validationTextarea" placeholder="Breve Descripcion Perfil Profesional"  name="descripcion" required></textarea></td>                            
                            </tr>
                            <tr>
                                <!-- <td colspan="2"> <button type="submit" class="btn btn-primary">Registrar</button></td> -->
                                <td colspan="2" aling="center"> 
                                    <br>
                                    <input type="submit" class="btn btn-primary" name="guardar" value="Registrar">
                                    <a href="<?php echo get_home_url();?>/form/" class="btn btn-danger">Cancelar</a>
                                </td>
                            </tr>                                       
                        </table>               
                    </form>               
                </div>
            </div>                                  
            <?php $theme->hook('content_after'); ?>
        
        </div><!-- #content -->
    
        <?php get_sidebars(); ?>
        
        <?php $theme->hook('main_after'); ?>
        
    </div><!-- #main -->
    
<?php get_footer(); ?>