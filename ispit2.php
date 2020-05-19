<h1>Upišite željenu riječ!</h1>
<br>
<form action = "" method = "post">
<header>Upišite riječ:</header>
	<input type="text" name="text"/>
<br>
<br>
	<button type = "submit" name="submit">Pošalji</button>
</form>
<br>

<?php
/*pokušaj da se ne trebaju mijenjati permissioni jer inače ne prolazi zapisivanje u json ali mi ne radi, ne znam zašto
if(!file_exists(__DIR__ . 'words.json')) 
	{fopen('words.json', "w");}
chmod(__DIR__, 0777);
chmod(__DIR__ . 'words.json', 0777);
*/

$rijec=$_POST['text'];

$rijec= strtolower($rijec);

function znakovi($str){
	$counter=strlen($str);
	$samoglasnici= 0;
	
	
	for($i=0;$i<$counter;$i++){

		if(($str[$i]=='a')||($str[$i]=='e')||($str[$i]=='i')||($str[$i]=='o')||($str[$i]=='u')){
		
		$samoglasnici++;
		
		
		
	}

}


$suglasnici= $counter - $samoglasnici;


$wordsJson = file_get_contents(__DIR__ . '/words.json');
$wordsstr = json_decode($wordsJson, true);
$wordsstr[] = [
		"Riječ" => $str,
		"Broj slova" => $counter,
		"Broj suglasnika" => $suglasnici,
		"Broj samoglasnika" => $samoglasnici,
				]; 
$wordsJson = json_encode($wordsstr, true);
file_put_contents(__DIR__ . '/words.json' , $wordsJson);

//json decode nakon upisa nove riječi
$wordsJson = file_get_contents(__DIR__ . '/words.json');
$wordsstr = json_decode($wordsJson, true);
//pocinje tablica

?>
<table border="1" cellpadding="10">

<tr>

<th>Riječ</th>
<th>Broj slova</th>
<th>Broj suglasnika</th>
<th>Broj samoglasnika</th>


</tr>
<?php

foreach($wordsstr as $ws){

	echo '<tr>';

	echo '<td>' . $ws['Riječ'] . '</td>';
	echo '<td>' . $ws['Broj slova'] . '</td>';
	echo '<td>' . $ws['Broj suglasnika'] . '</td>';
	echo '<td>' . $ws['Broj samoglasnika'] . '</td>';
	

	echo '</tr>';
	
}
?>
</table>





<?php

}







 if
(!isset($_POST['submit'])){echo "";}
 elseif
(isset($_POST['submit']) && empty($_POST['text'])) {echo "Polje ne smije biti prazno!";}
 elseif
//dodao ctype
(isset($_POST['submit']) && !empty($_POST['text']) && !ctype_alpha($rijec)) {echo "Dozvoljen samo unos znakova A-Z i a-z !";}
//dodao ctype
elseif
(isset($_POST['submit']) && !empty($_POST['text']))
{

znakovi($rijec);



}



?>

