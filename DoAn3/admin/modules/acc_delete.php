
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('accounts',$id);
if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
  redirectAdmin("acc_index.php");
}

$num=$db->delete('accounts',$id);
if($num>0)
{
 $_SESSION["success"]="Xoá thành công.";
 redirectAdmin("acc_index.php");
}
else
{
  $_SESSION["error"]="Xoá thất bại.";
  redirectAdmin("acc_index.php");
}
?>

