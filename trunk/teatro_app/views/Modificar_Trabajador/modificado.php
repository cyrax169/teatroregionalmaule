    <div id="principal">
        <div class="post" align="center">
            <h2>TRABAJADOR MODIFICADO</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br>
   
        <br><br><br><br><br><br>
        <table align="center" border="0" cellpadding="0" cellspacing="0">
                <?php foreach($result as $row):?>
            <tr>
                <td width="100" align="left">NOMBRE:</td>
                <td width="100" align="left"><?=$row->Nombre?></td>
                 </tr>
            <tr>
                <td width="100" align="left">RUT:</td>
                <td width="100" align="left"><?=$row->Rut?></td>
                </tr>
            
            <tr>
                <td width="100" align="left">FECHA DE NACIMIENTO:</td>
                <td width="100" align="left"><?=$row->FechaNacimiento?></td>
                </tr>
            <tr>
                <td width="100" align="left">DIRECCION:</td>
                <td width="100" align="left"><?=$row->Direccion?></td>
            <tr>
                <td width="100" align="left">TELEFONO:</td>
                <td width="100" align="left"><?=$row->Telefono?></td>
                </tr>
            <tr>
                <td width="100" align="left">TIPO CONTRATO:</td>
                <td width="100" align="left"><?=$row->TipoContrato?></td>
                </tr>
            <tr>
                <td width="100" align="left">CARGO/FUNCION:</td>
                <td width="100" align="left"><?=$row->Cargo?></td>

                <tr>
                <td width="100" align="left">FECHA INICIO CONTRATO:</td>
                <td width="100" align="left"><?=$row->FechaInicioContrato?></td>
                </tr>
                <tr>
                <td width="100" align="left">FECHA TERMINO CONTRATO:</td>
                <td width="100" align="left"><?=$row->FechaTerminoContrato?></td>
                </tr>
                <tr>
                <td width="100" align="left">AFC:</td>
                <td width="100" align="left"><?=$row->Afc?></td>
                </tr>
                <tr>
                <td width="100" align="left">REMUNERACION:</td>
                <td width="100" align="left"><?=$row->Salario?></td>
                </tr>
                 <tr>
                <td width="100" align="left">CAJA:</td>
                <td width="100" align="left"><?=$row->Acaja?></td>
                </tr>
                <tr>
                <td width="100" align="left">MOVILIZACION:</td>
                <td width="100" align="left"><?=$row->Amovilizacion?></td>
                </tr>
                <tr>
                <td width="100" align="left">COLACION:</td>
                <td width="100" align="left"><?=$row->Acolacion?></td>
                </tr>
                 <tr>
                <td width="100" align="left">AFP:</td>
                <td width="100" align="left"><?=$row->NombreAfp?></td>
                </tr>
                 <tr>
                <td width="100" align="left">MONTO AFP:</td>
                <td width="100" align="left"><?=$row->PorcentajeAfp?></td>
                </tr>
                 <td width="100" align="left">FONASA:</td>
                <td width="100" align="left"><?=$row->Fonasa?></td>
                </tr>
                 <tr>
                <td width="100" align="left">ISAPRE:</td>
                <td width="100" align="left"><?=$row->NombreIsapre?></td>
                </tr>
                 <tr>
                <td width="100" align="left">MONTO ISAPRE:</td>
                <td width="100" align="left"><?=$row->MontoIsapre?></td>
                </tr>
                 <tr>
                <td width="100" align="left">DIAS TRABAJADOS:</td>
                <td width="100" align="left"><?=$row->DiasTrabajados?></td>
                </tr>
                <tr>
                <td width="100" align="left">BONOS:</td>
                <td width="100" align="left"><?=$row->Bonos?></td>
                 </tr>
                     <tr>
                <td width="100" align="left">RUT CARGA:</td>
                <td width="100" align="left"><?=$row->Rut?></td>
                </tr>
                 <tr>
                <td width="100" align="left">NOMBRE CARGA:</td>
                <td width="100" align="left"><?=$row->Nombres?></td>
                </tr>
                 <tr>
                <td width="100" align="left">TIPO CARGA:</td>
                <td width="100" align="left"><?=$row->DiasTrabajados?></td>
                </tr>
                <tr>
                <td width="100" align="left">FECHA VENCIMIENTO:</td>
                <td width="100" align="left"><?=$row->Fechavencimiento?></td>

                <?php endforeach;?>
                   </tr>
        </table>
<br><br><br><br><br><br>
<div id="form" align="center">
            <form name="frm" method="post" action="../welcome/Modifica_Trabajador">
                <input class="btn" type="submit" name="Continuar" value="Continuar"/>
            </form>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
</div>
