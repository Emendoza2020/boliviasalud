<?php
/*
Template Name: formulario
*/
global $theme; get_header(); 

    //include_once 'dbconnect.php';
    include("db.php");
    if(isset($_POST['guardar'])){
        $especialidad = $_POST['especialidad'];
        $tipo = 'PROFESIONALES';
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
            echo "<script>alert('Estimado Usuario: Su publicación se activará por un periodo de un año, SE DARA DE ALTA PREVIO CONFIRMACION DE DATOS');</script>"; 
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
    }
    
?>
    <div id="main">
        <?php $theme->hook('main_before'); ?>
        <div id="content"> 
        <?php $theme->hook('content_before'); ?>    
            <h1 class="widgettitle">REGISTRO DE PROFESIONALES</h1>
            <div class="card">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo get_home_url();?>/form_registro/">    
                        <table>                      
                            <tr>
                                <td><label for="inputState" class="title">Especialidad</label>
                                <select name="especialidad" id="inputState" class="custom-select custom-select-sm text-uppercase">
                                    <option>ALERGÓLOGOS</option>
                                    <option>ANATOMOPATÓLOGOS</option>
                                    <option>ANESTESIÓLOGOS</option>
                                    <option>CARDIÓLOGOS</option>
                                    <option>CIRUJANOS CARDIOVASCULARES Y TORÁCICOS</option>
                                    <option>CIRUJANOS DE LA MANO</option>
                                    <option>CIRUJANOS ESTÉTICOS Y COSMÉTICOS</option>
                                    <option>CIRUJANOS GENERALES</option>
                                    <option>CIRUJANOS MAXILOFACIALES</option>
                                    <option>CIRUJANOS ONCÓLOGOS</option>
                                    <option>CIRUJANOS PEDIÁTRICOS</option>
                                    <option>CIRUJANOS PLÁSTICOS</option>
                                    <option>DENTISTAS - ODONTÓLOGOS</option>
                                    <option>DERMATÓLOGOS</option>
                                    <option>ENDOCRINÓLOGOS</option>
                                    <option>ENDOSCOPISTAS</option>
                                    <option>ENFERMER@S</option>
                                    <option>ENFERMERAS AUXILIARES</option>
                                    <option>ESPECIALISTAS EN MEDICINA CRÍTICA Y TERAPIA INTENSIVA</option>
                                    <option>ESPECIALISTAS EN MEDICINA DEL DEPORTE</option>
                                    <option>ESPECIALISTAS EN MEDICINA DEL TRABAJO</option>
                                    <option>ESPECIALISTAS EN MEDICINA INTEGRADA</option>
                                    <option>ESPECIALISTAS EN MEDICINA NUCLEAR</option>
                                    <option>ESPECIALISTAS EN MEDICINA PREVENTIVA</option>
                                    <option>ESPECIALISTAS EN REHABILITACIÓN Y MEDICINA FÍSICA</option>
                                    <option>ESPECIALISTAS DE LAS DISCAPACIDADES</option>
                                    <option>FISIOTERAPEUTAS</option>
                                    <option>FONOAUDIÓLOGO</option>
                                    <option>GASTROENTERÓLOGOS</option>
                                    <option>GENETISTAS</option>
                                    <option>GERIATRAS</option>
                                    <option>GINECÓLOGOS</option>
                                    <option>HEMATÓLOGOS</option>
                                    <option>HOMEÓPATAS</option>
                                    <option>INFECTÓLOGOS</option>
                                    <option>INMUNÓLOGOS</option>
                                    <option>INSTRUMENTADORA</option>
                                    <option>MÉDICOS DE FAMILIA</option>
                                    <option>MÉDICOS ESTÉTICOS</option>
                                    <option>MÉDICOS GENERALES</option>
                                    <option>MEDICINA INTERNA</option>
                                    <option>MEDICINA ALTERNATIVA</option>
                                    <option>NATURISTAS</option>
                                    <option>NEFRÓLOGOS</option>
                                    <option>NEONATÓLOGOS</option>
                                    <option>NEUMÓLOGOS</option>
                                    <option>NEUROCIRUJANOS</option>
                                    <option>NEUROFISIÓLOGOS</option>
                                    <option>NEURÓLOGOS</option>
                                    <option>NUTRICIONISTAS</option>
                                    <option>OFTALMÓLOGOS</option>
                                    <option>ONCÓLOGOS</option>
                                    <option>OPTOMETRISTAS</option>
                                    <option>ORTOPEDISTAS</option>
                                    <option>ORTOPEDISTAS INFANTILES</option>
                                    <option>OTORRINOLARINGÓLOGOS</option>
                                    <option>PATÓLOGOS</option>
                                    <option>PEDIATRAS</option>
                                    <option>PODÓLOGOS</option>
                                    <option>PROCTÓLOGOS</option>
                                    <option>PSICOANALISTAS</option>
                                    <option>PSICÓLOGOS</option>
                                    <option>PSICOPEDAGOGOS</option>
                                    <option>PSIQUIATRAS</option>
                                    <option>QUIROPRÁCTICOS</option>
                                    <option>RADIÓLOGOS</option>
                                    <option>REUMATÓLOGOS</option>
                                    <option>SALUD PÚBLICA</option>
                                    <option>SEXÓLOGOS</option>
                                    <option>TERAPEUTAS OCUPACIONALES</option>
                                    <option>TRAUMATÓLOGOS</option>
                                    <option>URÓLOGOS</option>
                                </select></td>
                                <td><br>
                                    <div class="custom-control custom-switch">                                    
                                        <input type="checkbox" class="custom-control-input text-uppercase" id="customSwitch1" name="horario" value="1">                                    
                                        <label class="custom-control-label title" for="customSwitch1">Atención 24 Horas</label>
                                    </div>                                                      
                                </td>
                            </tr>
                            <tr>
                                <td><label for="validationDefault02" class="title">Nombre del Profesional</label><input type="text" class="form-control form-control-sm" id="validationDefault02" placeholder="Especialista" name="nombre" required></td>
                                <td>
                                    <label for="exampleFormControlFile1">Seleccionar Fotografia</label>
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="UPLOAD">                            
                                </td>
                            </tr>
                            <tr>
                                <td><label for="validationDefault02" class="title">Numero de Matricula Profesional</label><input type="text" class="form-control form-control-sm" id="validationDefault02" placeholder="Matricula Profesional" name="matricula" required></td>
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
                                <td colspan="2"><label for="validationTextarea" class="title">Experiencia Profesional</label><textarea class="form-control is-invalid-sm" id="validationTextarea" placeholder="Breve Descripcion Perfil Profesional"  name="descripcion" required></textarea></td>                            
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