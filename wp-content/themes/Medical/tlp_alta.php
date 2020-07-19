<?php
/*
Template Name: alta
*/
global $theme; get_header(); 

?>
    <div id="main">

        <div class="container">                                
                
            <h5 class="widgettitle">DATOS ESPECIALISTAS / EMPRESAS DE SALUD</h5>
        
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td colspan="3"> <input class="form-control" id="myInput" type="text" placeholder="Buscar..."></h3></td>
                        <td colspan="3"> </td>
                    </tr>
                    <tr class="table-info">
                        <td class="title">N°</td> 
                        <td class="title">TIPO</td> 
                        <td class="title">ESPECIALIDAD</td>
                        <td class="title">NOMBRE</td>                                                
                        <td class="title">ESTADO</td>
                        <td class="title">ACCION</td>                                                          
                    </tr>
                </thead>
                <tbody id="myTable">
                <?php   
                    include("db.php");                    
                    $sql = "SELECT * FROM formulario_registro";
                    $ejecutar = mysqli_query($con, $sql);
                    $i = 0;
                    while($fila = mysqli_fetch_array($ejecutar)){
                        $id = $fila['id_registro'];
                        $tipo = $fila['tipo'];
                        $especialidad = $fila['especialidad'];
                        $nombre = $fila['nombre'];
                        $estado = $fila['estado'];
                    $i++;
                ?>  
                    <tr>
                        <td><?php echo $i; ?> </td>
                        <td><?php echo $tipo; ?> </td>
                        <td><?php echo $especialidad; ?> </td>
                        <td><?php echo $nombre; ?> </td>                            
                        <td><?php echo $estado; ?> </td> 
                        <td >
                            <div class="btn-group" role="group" aria-label="First group">
                                <a href="ver_detalle?id=<?php echo $id; ?>" title="Detalle de Datos" class="badge badge-success" name="ver">VER</span></a>
                                <a href="update?id=<?php echo $id; ?>" title="Alta Datos" class="badge badge-warning" name="update">ALTA</span></a>
                                <a href="delete?id=<?php echo $id; ?>" title="Eliminar Datos" class="badge badge-danger" name="delete">ELIMINAR</span></a>
                            </div>
                        </td>
                                                  
                    </tr>
                <?php } ?>

            </table>
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
            
        </div>   
    
    </div><!-- #main -->
    
<?php get_footer(); ?>