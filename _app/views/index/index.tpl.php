<?php include APP_PATH.'/views/public/header.tpl.php';?>

<?php
$contact = C('','contact');
$i=1;
echo '班级所有成员：<br />';
echo '<p style="padding:8px 20px;">';
foreach ($contact as $k=>$v):
	echo Html::a('index/index/username/'.base64_encode(urlencode($k)),$k).'&nbsp;&nbsp;';
	if($i%8==0) echo '<br />';
$i++;
endforeach;
echo '</p>';
?>

<hr />

<table>
  <tr>
    <td align="right"><strong>姓名：</strong></td>
    <td><?php echo $this->username;?></td>
  </tr>
  <tr>
    <td align="right"><strong>电话：</strong></td>
    <td><?php echo C($this->username.'.phone', 'contact');?></td>
  </tr>
  <tr>
    <td align="right"><strong>Ta的照片：</strong></td>
    <td><img alt="" src="<?php echo SOURCE,'/images/',C($this->username.'.pic', 'contact');?>" /></td>
  </tr>
</table>

<hr />
<h3><a href="<?php echo U('index/viewlog');?>" target="_blank">查看访问日志</a></h3>

<?php include APP_PATH.'/views/public/footer.tpl.php';?>
