<?php 

// Handles all output to HTML

// I had some issues with my existing CSS, to integrate
// striped rows using :nth-child(odd) and :nth-child(even).
// To prevent any more holdups, I resorted to doing it 
// a pre-CSS3 way. 


class View {

	public function createTable($data){

		$rowColourA = '#bfcadf';
		$rowColourB = '#bec6b0';
		$colour = $rowColourA;

?>
		<table id="striped">
		<tr><th>Name</th><th>Type</th><th>Strength</th>
		<th>Health</th><th>Special<br/>Power</th><th>Action</th></tr>
<?php

		for($count = 0; $count< count($data);$count++){

			($colour == $rowColourA)?$colour=$rowColourB : $colour=$rowColourA;
?>
			<tr style="background-color: <?= $colour ?>;">
			<td><?= $data[$count]['name'] ?></td>
			<td><img src="<?= $data[$count]['image'] ?>"></td>
			<td><?= $data[$count]['strength'] ?></td>
			<td><?= $data[$count]['health'] ?></td>
			<td><?= $data[$count]['power'] ?></td>
<?php			
			$buttons = self::generateButtons($count);

			echo '<td>'.$buttons.'</td>';
			echo "<tr>\n";
		}

		echo "</table>";
	}



	private function generateButtons($num){

		$num++;   // Offset by 1 as $_GET is not set if val is 0

		$inpClass = '<input class="btn" ';
		$typeVal =  ' type="image" value="" '; 

		$buttons = $inpClass.'name="del'.$num.'"'.$typeVal.'src="images/delete.png" onClick="javascript:alert_get(\'del\','.$num.');">' ;
		$buttons.= $inpClass.'name="inc'.$num.'"'.$typeVal.'src="images/heart_inc.png" onClick="javascript:alert_get(\'inc\','.$num.');">';
		$buttons.= $inpClass.'name="dec'.$num.'"'.$typeVal.'src="images/heart_dec.png" onClick="javascript:alert_get(\'dec\','.$num.');">' ;

		return $buttons;
	}


	public function generateRestAndRollButtons($roll, $reset) {

?>		<br/>
		<input class="btn2" name="roll" type="submit" value="Roll the Dice" onClick="<?= $roll ?>">
		<input class="btn2" name="reset" type="submit" value="Reset" onClick="<?= $reset ?>">
		<br/><br/>
<?php

	}


	public function outputDiagnosticData($text) {
		echo '<div id="diag-box">';
		$text = str_replace('\n','<br/>', $text);
		echo "<p>$text</p>";
		echo '</div>';
	}

}


