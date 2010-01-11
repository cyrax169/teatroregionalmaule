    <div id="principal">
        <div align="right"><?php echo "Bienvenido ".$username." - ". anchor('usuario/logout','Salir del Sistema');?></div>
        <div class="post" align="center">
            <h2>PLANILLA DE REMUNERACIONES</h2>
        </div>
        <br><br><br><br>
            <form name="frm1" method="post" action="<?=base_url()?>index.php/planilla_controlador/BuscaRutPlanilla">
             <div align="center">
               <select name="mes">
                   <option selected>...</option>)
                    <option>Enero</option>
                    <option>Febrero</option>
                    <option>Marzo</option>
                    <option>Abril</option>
                    <option>Mayo</option>
                    <option>Junio</option>
                    <option>Julio</option>
                    <option>Agosto</option>
                    <option>Septiembre</option>
                    <option>Octubre</option>
                    <option>Noviembre</option>
                    <option>Dicioembre</option>
                </select>
                <select name="anio">
                    <option selected><?echo $anio?></option>
                     <? for($i=2008;$i<2030;$i++):?>
                        <? if ($anio != $i):?>
                         <option> <? echo $i;?> </option>
                        <? endif;?>
                    <? endfor; ?>
                </select>
                </div>
                <br>
            <div id="form" align="center">
                <input class="btn" type="submit" name="Continuar" value="Buscar"/>
            </div>
            <br><br>
            <from>
            <br><br><br><br><br>
            <br>
        </form>
        <br><br><br>
    </div>
</div>
