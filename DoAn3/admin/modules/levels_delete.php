
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('levels',$id);
if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
  redirectAdmin("levels_index.php");
}

$num=$db->delete('levels',$id);
if($num>0)
{
 $_SESSION["success"]="Xoá thành công.";
 redirectAdmin("levels_index.php");
}
else
{
  $_SESSION["error"]="Xoá thất bại.";
  redirectAdmin("levels_index.php");
}
?>

