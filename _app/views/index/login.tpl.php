<?php include APP_PATH.'/views/public/header.tpl.php';?>

<p>由于通讯录为内部系统，需要认证你是否是本班成员，验证后才能查看本班其他人的通信录，请提供以下信息：</p>

<form action="" method="post">
<table>
  <tr>
    <td align="right">你的名字：</td>
    <td><input type="text" name="username" style="width:300px;" /></td>
  </tr>
  <tr>
    <td align="right">你的电话：</td>
    <td><input type="text" name="phone" style="width:300px;" /></td>
  </tr>
  <tr>
    <td align="right"></td>
    <td><input type="submit" name="submit" value="验证" /></td>
  </tr>
</table>
</form>

<?php include APP_PATH.'/views/public/footer.tpl.php';?>
