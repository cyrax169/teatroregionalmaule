<div id="content">
    <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/login">
        <fieldset id="form">
            <legend>Sistema de Remuneraciones</legend>
            <ol>
                <li>
                    <label>Usuario</label>
                    <input type="text" name="nombre" id="nombre"/></li>
                <li>
                    <label>Contraseña</label>
                    <input type="password" name="password" id="password"/></li>
            </ol>
                <p align="center"><input type="submit" name="submit" class="btn" value="Enviar" /></p>
        </fieldset>
    </form>
</div>
<!--Fin Header-->