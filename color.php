<form method="post">
	<input type="color" name="color"> 
	<input type="submit" value="LIHAT">
</form>
<?php
if ($_POST) {
echo "$_POST[color]";
}
?>