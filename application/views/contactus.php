<!DOCTYPE html>
<html>
<head>
	<?php include "includes/head.php"; ?>
</head>
<body>
	<?php include "includes/nav.php"; ?>
	<table border = "solid thin black">
		<?php for ($x = 0; $x < 50; $x++): ?>
			<tr>
				<?php for ($y = 0; $y < 50; $y++): ?>
	        		<td align = "center"><?="POGI NI FEPS"?></td>
				<?php endfor; ?>
	        </tr>
		<?php endfor; ?>
	</table>
	<?php include "includes/footer.php"; ?>
	<?php include "includes/js.php"; ?>
</body>
</html>