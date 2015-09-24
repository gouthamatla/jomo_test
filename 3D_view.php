<html>
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
	jmolScript(load uploads/<?php echo pdb_ID()?>.pdb; wireframe 0; spacefill 100%; zoom 90; set defaultColors Rasmol; set spinX 20; set spinY 40; set spinFps 30; spin ON; frank ON;);
	var elem1, elem2, elem2a;	// control variables
	// write the proper elements to textBox
	textBox.innerHTML = "<br><br>This is a simple tutorial on <strong>manipulating Jmol 3D molecular models in web pages</strong>. <br><br> <span class=\"bold\">If you want to know how to use Jmol in your own web pages, you need to click on the logo!</span> <br><br> <form><input type=\"button\" onclick=\"Tutor1()\" value=\"On to the tutorial!\"></form>";
	}
	return; 
}

</script>
<table>
<tr>
<td valign="top">
<table>
<tr>
<td>
<script type="text/javascript">
jmolInitialize("jmol");
jmolApplet(800, "load uploads/<?php echo pdb_ID()?>.pdb;color background white;set frank off; select protein; hbonds off; spin off; wireframe off; spacefill off; trace off; set ambient 40; set specpower 40; slab off; ribbons off; cartoons ;color structure; label off; monitor off;");
</script>
</td>
</tr>
</table>
</td>
<td valign="top">
<table>
<tr>
<td>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form>
<td align="left">

<input type="button" onclick="jmolScript('cartoon OFF; trace OFF; color cpk; spacefill 20%; wireframe 0.2;')" value="ball-and-stick">
<input type="button" onclick="jmolScript('cartoon OFF; trace OFF; color cpk; spacefill 0; wireframe 0.01;')" value="wireframe">



<input type="button" onclick="jmolScript('trace OFF; cartoon ON; color structure; spacefill 0; wireframe 0;')" value="Default">
<br><br><br><br><br>

<br>
<input type="button" value="show disulfide bonds" onclick="jmolScript('ssbonds on; color ssbonds [x00ffff];')">
<input type="button" value="hide disulfide bonds" onclick="jmolScript('ssbonds off')">

</table>
</td>

<?php error_reporting( error_reporting() & ~E_NOTICE );?>
<?php

echo '<font color="blue">'.'<b>'."PDB ID : ",'</font>'.'<font color="black">',pdb_ID().'<br>'.'</b>'.'</font>';
echo '<font color="blue">'.'<b>'."Protein name : ",'</font>'.'<font color="black">',protein_name().'</b>'.'</font>'.'<br><br>';

function protein_name(){
$name=$_GET['pdbid'];
$name2=$name.'.pdb';
$fh=file("uploads/"."$name2");
foreach($fh as $item=>$lines){
if (preg_match('/^TITLE/',$lines)){
for($i=10;$i<=80;$i++){
echo $lines[$i];
}}}}

function pdb_ID(){
$name=$_GET['pdbid'];
$name2=$name.'.pdb';
$fh=file("uploads/"."$name2");
foreach($fh as $item=>$lines){
if (preg_match('/^HEADER/',$lines)){
for($i=62;$i<=65;$i++){
echo $lines[$i];
}}}}

?> 
