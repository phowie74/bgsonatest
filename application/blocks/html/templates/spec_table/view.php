<?php defined('C5_EXECUTE') or die("Access Denied.");

// FIRST ROW ALWAYS THEAD
// ADD "YEL" TO START OF ROW TO HIGHLIGHT
// ADD COL# TO ANY CELL WHCIH SPANS COLUMNS e.g. COL2 FOR SPAN 2 or COL3 FOR SPAN 3

// convert html into array of rows
$table = explode("\n", $content);
// count separators in LAST row for column count
$cols = end($table);
$cols = substr_count($cols, '|') + 1;

echo '<div class="table-responsive"><table class="spec-table">';
$i = 0;
foreach ($table as $row) {
	$highlight = "";
	if(substr($row, 0, 3) === "YEL") {
		$highlight = ' class="highlight"';
		$row = substr($row, 3);
	}
	$r = explode(" | ", $row);

	if ($i == 0) {
		$rNum = count($r);
		//echo $rNum .' - '. $cols;
		if ($rNum < $cols) {
			echo '<colgroup>';
			foreach ($r as $cell) {
				//echo gettype($cell);
				//echo $cell .', ';
				if (strpos($cell, "COL") !== false) {
					//echo $cell;
					$span = substr($cell, 3, 1);
					echo '<col span="'.$span.'" />';
				} else {
					//echo $cell;
					echo '<col />';
				}
			}
			echo '<colgroup>';
		}
		echo '<thead><tr>';
			//if (strpos($row, " | ") !== false) {
			foreach ($r as $cell) {
				if (strpos($cell, "COL") !== false) {
					$span = substr($cell, 3, 1);
					echo '<th colspan="'.$span.'">'.substr($cell, 4).'</th>';
				} else {
					echo '<th>'.$cell.'</th>';
				}
			}
			//} else {
			//	echo '<th colspan="'.$cols.'">'.$cell.'</th>';
			//}
		echo '</tr></thead><tbody>';
	} else {
		echo '<tr'.$highlight.'>';
		//echo $row;
		if (strpos($row, " | ") !== false) {
		foreach ($r as $cell) {
			if (strpos($cell, "COL") !== false) {
				$span = substr($cell, 3, 1);
				echo '<td colspan="'.$span.'">'.substr($cell, 4).'</td>';
			} else {
				echo '<td>'.$cell.'</td>';
			}
		}
		} else {
			echo '<td colspan="'.$cols.'">'.$row.'</td>';
		}
		echo '</tr>';
	}
	$i++;
}

echo '</tbody></table></div>';
?>