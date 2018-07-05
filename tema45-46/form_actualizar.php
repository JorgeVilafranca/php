<h1>Actualización de Artículos</h1>
<form name="form1" method="get" action="<?php echo $miPag; ?>">
    <table border="0" align="center">
        <tr>
            <td>Código Artículo</td>
            <td>
                <label for="c_art"></label>
                <input type="text" name="c_art" id="c_art" value="<?php echo $datos['CÓDIGOARTÍCULO']; ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>Sección</td>
            <td>
                <label for="seccion"></label>
                <input type="text" name="seccion" id="seccion" value="<?php echo $datos['SECCIÓN']; ?>">
            </td>
        </tr>
        <tr>
            <td>Nombre artículo</td>
            <td>
                <label for="n_art"></label>
                <input type="text" name="n_art" id="n_art" value="<?php echo $datos['NOMBREARTÍCULO']; ?>">
            </td>
        </tr>
        <tr>
            <td>Precio</td>
            <td>
                <label for="precio"></label>
                <input type="text" name="precio" id="precio" value="<?php echo $datos['PRECIO']; ?>">
            </td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td>
                <label for="fecha"></label>
                <input type="date" name="fecha" id="fecha" value="<?php echo $datos['FECHA']; ?>">
            </td>
        </tr>
        <tr>
            <td>Importado</td>
            <td>
                <label for="importado"></label>
                <input type="checkbox" name="importado" id="importado">
            </td>
        </tr>
        <tr>
            <td>País de Origen</td>
            <td>
                <label for="p_orig"></label>
                <input type="text" name="p_orig" id="p_orig" value="<?php echo $datos['PAÍSDEORIGEN']; ?>">
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" id="enviar" value="Enviar">
            </td>
            <td align="center">
                <input type="reset" id="Borrar" value="Borrar">
            </td>
        </tr>
    </table>
</form>