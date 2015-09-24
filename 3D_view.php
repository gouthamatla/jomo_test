<html>
<head>
<script src="jmol/Jmol.js" type="text/javascript"></script>
<script type="text/javascript">
function Wireframe() {
	jmolScript("wireframe 0.01; spacefill 0;");
	return;
}

function Sticks() {
	jmolScript("wireframe 0.3; spacefill 0;");
	return;
}

function BallStick() {
	jmolScript("wireframe 0.15; spacefill 20%;");
	return;
}

function Spacefill() {
	jmolScript("wireframe 0; spacefill 100%;");
	return;
}

function DotSurfaceOn() {
	// turns ON the dot surface at the vdW distance
	jmolScript("dots VANDERWAALS");
	return;
}

function DotSurfaceOff() {
	// turns OFF the dot surface
	jmolScript("dots OFF");
	return;
}

function Initialize() {
	if (document.getElementById) { // make sure the DOM is followed!
	// find the proper element
	var textBox = document.getElementById("mainText");
	// first clear the text box and initialize the Jmol applet.
	clearTextBox(textBox);
	jmolScript("load ligand.pdb; wireframe 0; spacefill 100%; zoom 90; set defaultColors Rasmol; set spinX 20; set spinY 40; set spinFps 30; spin ON; frank ON;");
	var elem1, elem2, elem2a;	// control variables
	// write the proper elements to textBox
	textBox.innerHTML = "<br><br>This is a simple tutorial on <strong>manipulating Jmol 3D molecular models in web pages</strong>. <br><br> <span class=\"bold\">If you want to know how to use Jmol in your own web pages, you need to click on the logo!</span> <br><br> <form><input type=\"button\" onclick=\"Tutor1()\" value=\"On to the tutorial!\"></form>";
	}
	return; 
}

</script>

</head>

<body onLoad="Initialize()">
<table width="90%" align="CENTER" border="0" cellpadding="10">
<tr>
	<td width="1000" align="left" valign="top">
	<noscript>Without JavaScript enabled, you will <strong>not</strong> see the applet here!</noscript>
<a href="ligand.pdb"></a>
<script type="text/javascript">
jmolInitialize("jmol");
jmolApplet(900, "load ligand.pdb; wireframe 100; zoom 100; set defaultColors Rasmol; set spinX 20; set spinY 40; frank ON;");
</script>
	
<form>

<input type="button" onclick="jmolScript('spin ON;')" value="start spin">
<input type="button" onclick="jmolScript('spin OFF;')" value="stop spin">
<h4>Menu renderings</h4>
<input type="button" onclick="jmolScript('cartoon OFF; trace OFF; color cpk; spacefill 100%; wireframe 0;')" value="space-filling">
<input type="button" onclick="jmolScript('cartoon OFF; trace OFF; color cpk; spacefill 20%; wireframe 0.2;')" value="ball-and-stick">
<input type="button" onclick="jmolScript('cartoon OFF; trace OFF; color cpk; spacefill 0; wireframe 0.3;')" value="sticks">
<input type="button" onclick="jmolScript('cartoon OFF; trace OFF; color cpk; spacefill 0; wireframe 0.01;')" value="wireframe">
<br>
<input type="button" onclick="jmolScript('trace OFF; cartoon ON; color structure; spacefill 0; wireframe 0;')" value="cartoon">
<input type="button" onclick="jmolScript('cartoon OFF; trace ON; color structure; spacefill 0; wireframe 0;')" value="trace">
<br>
<input type="button" value="show hydrogen bonds" onclick="jmolScript('hbonds calculate; color hbonds [x00ff00];')">
<input type="button" value="hide hydrogen bonds" onclick="jmolScript('hbonds off')">
<br>
<input type="button" value="show disulfide bonds" onclick="jmolScript('ssbonds on; color ssbonds [x00ffff];')">
<input type="button" value="hide disulfide bonds" onclick="jmolScript('ssbonds off')">
</table>
</td>
</tr>
</table>
</form>


</body>
</html>
