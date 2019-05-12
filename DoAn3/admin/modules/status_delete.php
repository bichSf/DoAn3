
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('statuses',$id);
if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
  redirectAdmin("status_index.php");
}

$num=$db->delete('statuses',$id);
if($num>0)
{
 $_SESSION["success"]="Xoá thành công.";
 redirectAdmin("status_index.php");
}
else
{
  $_SESSION["error"]="Xoá thất bại.";
  redirectAdmin("status_index.php");
}
?>

