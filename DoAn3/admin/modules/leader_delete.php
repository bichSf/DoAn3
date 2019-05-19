
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('accounts',$id);
if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
  redirectAdmin("leader_index.php");
}

$num=$db->updateState('accounts',1,$id);
if($num>0)
{
 $_SESSION["success"]="Xoá thành công.";
 redirectAdmin("leader_index.php");
}
else
{
  $_SESSION["error"]="Xoá thất bại.";
  redirectAdmin("leader_index.php");
}
?>

