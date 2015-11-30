            <?php
$iam="";
if(!empty($_SESSION['usertype']))
{

if ($_SESSION['usertype']=='doc') {

 $iam= $_SESSION['username'];
echo '<a style="color:#F00 !important; margin-top: 20px;margin-right: -125px;font-size:15px; font-weight:bold; text-decoration:none; text-shadow:#000 1px 1px 1px;" href="Login.php">

     logged in as ' . $iam.'</a><a class="btn btn-danger" style="margin-left: 135px;" href="logout.php">LogOut</a>';



  # code...
}elseif ($_SESSION['usertype']=='admin') {
 $iam= $_SESSION['ausername'];
echo '<a style="color:#F00 !important;margin-top: 20px;margin-right: -125px; font-size:15px; font-weight:bold; text-decoration:none; text-shadow:#000 1px 1px 1px;" href="Login.php">

     logged in as ' . $iam.'</a><a  class="btn btn-danger" style="margin-left: 135px;" href="logout.php">LogOut</a>';

  # code...
}elseif ($_SESSION['usertype']=='cli') {
 $iam= $_SESSION['cusername'];
echo '<a style="color:#F00 !important;margin-top: 20px;margin-right: -125px; font-size:15px; font-weight:bold; text-decoration:none; text-shadow:#000 1px 1px 1px;" href="Login.php">

     logged in as ' . $iam.'</a><a class="btn btn-danger" style="margin-left: 135px;" href="logout.php">LogOut</a>';

}


}
else
{
  echo '   <a style="color:#F00 !important; font-size:15px; font-weight:bold; text-decoration:none; text-shadow:#000 1px 1px 1px;" href="Login.php"> 
     Login</a>';
}
     ?>
