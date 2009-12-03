    <div id="principal">
        <div class="post" align="center">
            <h2>CALENDARIO</h2>
            <div align="right" id="form">
                <form name="frm" method="post" action="<?=base_url()?>index.php/usuario/logout">
                    <input class="btn" type="submit" name="Salir" value="Salir"/>
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br>
       <form name="testform">

	<!--calendar attaches to existing form element -->
	<input type="text" name="testinput"/>
        <!--input type="button" name="tasput" Onclick="tcal('testform','testinput');"/-->
	<script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'testform',
		// input name
		'controlname': 'testinput'
	});

	</script>
        <!--img id="tcalico_0" class="tcalIcon" alt="Open Calendar" onclick="A_TCALS['0'].f_toggle()" src="../../teatro_app/views/images/img/cal.gif"/-->
        </form>
   </div>
</div>
