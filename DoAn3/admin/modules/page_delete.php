
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('team_pages',$id);
if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
  redirectAdmin("page_index.php");
}

$num=$db->updateState('team_pages',1,$id);
if($num>0)
{
 $_SESSION["success"]="Xoá thành công.";
 redirectAdmin("page_index.php");
}
else
{
  $_SESSION["error"]="Xoá thất bại.";
  redirectAdmin("page_index.php");
}
?>

