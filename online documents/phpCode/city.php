<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/city.js"></script>
<?php require 'database.php'; ?> 
<p><select onclick="lookup_city(this.value)" class="btn btn-inverce">
<?php
if (!empty($_SESSION['city'])) {
echo '<option>'.$_SESSION['city'].'</option>';
}else
{
?>
<option value="0">Filter your search with city</option>
<?php
}

$citys=$_SESSION['city'];
$rpm=mysql_query("select city as ct from packages where city!='' AND city!='$citys' ")or die(mysql_error());
while ($pack=mysql_fetch_object($rpm)) {

?>

<option><?php echo  $pack->ct; ?></option>
<?php
}
?>
<!-- <option>All</option> -->
</select>

</p>