
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('accounts',$id);
if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
  redirectLeader("acc_index.php");
}

$num=$db->updateState('accounts',2,$id);
if($num>0)
{
 $_SESSION["success"]="Xoá thành công.";
 redirectLeader("acc_index.php");
}
else
{
  $_SESSION["error"]="Xoá thất bại.";
  redirectLeader("acc_index.php");
}
?>

