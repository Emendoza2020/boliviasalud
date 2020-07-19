<?php global $theme; get_header(); ?>

    <div id="main">

        <div id="content">
        
            <?php $theme->hook('content_before'); ?>
            
            <?php 
                $is_post_wrap = 0;
                    if (have_posts()) : while (have_posts()) : the_post();
                    /**
                     * The default post formatting from the post.php template file will be used.
                     * If you want to customize the post formatting for your homepage:
                     * 
                     *   - Create a new file: post-homepage.php
                     *   - Copy/Paste the content of post.php to post-homepage.php
                     *   - Edit and customize the post-homepage.php file for your needs.
                     * 
                     * Learn more about the get_template_part() function: http://codex.wordpress.org/Function_Reference/get_template_part
                     */

                    $is_post_wrap++;
                        if($is_post_wrap == '1') {
                            ?><div class="post-wrap clearfix"><?php
                        }
                        get_template_part('post', 'homepage');
                        
                        if($is_post_wrap == '2') {
                            $is_post_wrap = 0;
                            ?></div><?php
                        }
                    
                endwhile;
                
                else :
                    get_template_part('post', 'noresults');
                endif; 
                    
                    if($is_post_wrap == '1') {
                        ?></div><?php
                    } 
                
                get_template_part('navigation');
            ?>
            
            <?php $theme->hook('content_after'); ?>            
                                     
        </div><!-- #content -->
        
        <?php get_sidebars(); ?>            
        
        <?php $theme->hook('main_after'); ?>

        <?php
        include("db.php"); 
       //////////VARIABLES DE CONSULTA //////////////////////
        $where ="";
        $estado =1;
        $especialidad = $_POST['xespecialidad'];
        $departamento = $_POST['xdepartamento'];
        $tipo = $_POST['xtipo'];

        //////////BUTTON BUSCAR ////////////////////////
        
        if(isset($_POST['buscar']))
        {
            if ($_POST['xespecialidad'])
            {
                $where = "and especialidad='".$especialidad."'";
            }
            if ($_POST['xdepartamento'])
            {
                $where = "and departamento='".$departamento."'";
            }
            if ($_POST['xtipo'])
            {
                $where = "and tipo='".$tipo."'";
            }

        }

        //////////cosnsulta a la base de datos///////
        
        $listar = "SELECT * FROM formulario_registro where estado=1 $where";
        $resListar = $con->query($listar);
        $resEspecialidad = $con->query($listar);
        $resDepartamento = $con->query($listar);

        if(mysqli_num_rows($resDepartamento)==0)
        {
            $mensaje="<div class='alert alert-danger' role='alert' align='center'><strong>No existe registro que coincidan con su criterio de busqueda...</strong></div>";
        }

        ?> 
        
        <div class="container">
            <div class="table-responsive-sm">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-info" role="alert">
                                <strong>CLASIFICADOS >>> BUSCA Y PUBLICA PROFESIONALES Y EMPRESAS DE SALUD EN BOLIVIA</strong>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <form method="post">
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control" id="myInput" type="text" placeholder="Busqueda Avanzada...">
                                    </div>
                                    <div class="col">
                                        <select name="xtipo" class="form-control" id="exampleFormControlSelect1">
                                            <option value="">Tipo</option>
                                            <option value="PROFESIONALES">PROFESIONALES</option>
                                            <option value="EMPRESAS">EMPRESAS</option>

                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="xespecialidad" class="form-control" id="exampleFormControlSelect1">
                                            <option value="">Especialidad/Rubro</option>
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
                                            <?php                                                 
                                                // while($filaEsp = $resEspecialidad->fetch_array(MYSQLI_BOTH))
                                                // {
                                                //     echo '<option value="'.$filaEsp['especialidad'].'">'.$filaEsp['especialidad'].'</option>';
                                                // }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="xdepartamento" class="form-control" id="exampleFormControlSelect1">
                                            <option value="">Departamento</option>
                                            <option value="LA PAZ">LA PAZ</option>
                                            <option value="ORURO">ORURO</option>
                                            <option value="POTOSI">POTOSI</option>
                                            <option value="COCHABAMBA">COCHABAMBA</option>
                                            <option value="CHUQUISACA">CHUQUISACA</option>
                                            <option value="TARIJA">TARIJA</option>
                                            <option value="PANDO">PANDO</option>
                                            <option value="BENI">BENI</option>
                                            <option value="SANTA CRUZ">SANTA CRUZ</option>
                                                                                        
                                            <?php 
                                                // while($filaDep = $resDepartamento->fetch_array(MYSQLI_BOTH))
                                                // {
                                                //     echo '<option value="'.$filaDep['departamento'].'">'.$filaDep['departamento'].'</option>';
                                                // }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button name="buscar" type="submit" class="btn btn-primary mb-2">Buscar</button>           
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr class="table-info">
                        <td class="title"></td> 
                        <td class="title">ESPECIALIDAD / RUBRO</td>
                        <td class="title">DEPARTAMENTO</td>                                                
                        <td class="title">NOMBRE /  RAZÓN SOCIAL</td>                                                          
                    </tr>
                </thead>           
                <tbody id="myTable">
                    <?php   
                        $i = 0;
                        while($fila = $resListar->fetch_array(MYSQLI_BOTH))
                        {
                            $id = $fila['id_registro'];
                            $especialidad = $fila['especialidad'];
                            $departamento = $fila['departamento'];
                            $nombre = $fila['nombre'];
                        $i++;
                    ?>  
                        <tr>
                            <td>
                                <div class="btn-group" role="group" aria-label="First group">
                                     <a href="detalle?ver=<?php echo $fila['id_registro']; ?>" title="Detalle de Datos" class="badge badge-success" name="ver">VER</span></a>
                                </div>
                            </td>
                            <td><?php echo $especialidad; ?> </td>
                            <td><?php echo $departamento; ?> </td>
                            <td><?php echo $nombre; ?> </td>                            
                                                    
                        </tr>
                    <?php } ?>
                        <tr>
                            <td colspan=4>
                            <?php
                                echo $mensaje;
                            ?>
                            </td>
                        </tr>    
                </table>
                
            </div>
        </div>
            
            <script>
                 $('#mytable').ddTableFilter();
            </script>
                
            <script>
                $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script> 


    </div><!-- #main -->            

<?php get_footer(); ?>