
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('schools',$id);
if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
  redirectAdmin("schools_index.php");
}

$num=$db->delete('schools',$id);
if($num>0)
{
 $_SESSION["success"]="Xoá thành công.";
 redirectAdmin("schools_index.php");
}
else
{
  $_SESSION["error"]="Xoá thất bại.";
  redirectAdmin("schools_index.php");
}
?>

