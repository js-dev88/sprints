
<h2>Liste des brasseries</h2>

<table>
<?php
foreach($data as $brewery) {
	echo "<tr>";
	echo "<td><a href='?r=brewery/view&id=".$brewery->idbrewery."'>".$brewery->name."</a></td>";
	echo "<td>".$brewery->country."</td>";
	echo "</tr>";
}
?>
</table>
