<?php
/**
 * Template Name: Archives
*/
?>

<h1> publicar articulo</h1>
<form name="publicar_articulo" id="publicar_articulo" method="post">
    <p>
        <input type="text" name="titulo_post" placeholder="Escriba el titulo del Articulo">
    </p>
    <p>
        wp_editor{
            $post_obj -> post_content,
            'userpostcontent',
            array{'textarea_name' => 'contenido'}
        };
    </p>
    <p>
        <input type="submit" value="enviar">
    </p>

</form>

