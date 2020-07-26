<?php
/*
Template Name: delete
*/
global $theme; get_header(); 

    include("db.php");               
    
    if(isset($_GET['id'])){
        $borrar_id = $_GET['id'];
        $borrar = "DELETE FROM  formulario_registro WHERE id_registro = '$borrar_id'";
        $ejecutar = mysqli_query($con, $borrar);

        header('Location: form_alta');

        // if($ejecutar){
        //     echo "<script>alert('Datos Eliminado')</script>";
        //     echo "<script>window.open('form_alta','_self')</script>";
        // }
        
    }

?>
    <div id="main">

        <div class="container">                                
                
            
        </div>   
    
    </div><!-- #main -->
    
<?php get_footer(); ?>