<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 18 : intval($cid);
$id  = empty($id)  ? 0 : intval($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,0,0,'人才招聘'); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<link rel="stylesheet" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/common.css">
	<link rel="stylesheet" href="CSS/s-details.css">
</head>
<body>
<!-- banner-->
<?php $row=$dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=13 and flag LIKE '%f%'");
			?>
	<div class="show-photo">
		<img src="<?php echo $row['picurl']; ?>" alt="">
	</div>
<!-- /banner-->

	<!-- 面包屑导航 -->
<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 bread">
				<p><?php echo GetCatName($cid); ?></p>
				<span>您当前所在位置：<?php echo GetPosStr($cid); ?></span>
			</div>

			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="jobConts">
					<?php

					$row = $dosql->GetOne("SELECT * FROM `#@__job` WHERE id=$id");
					if(@$row)
					{
					?>
					<strong>职位名称：</strong><br />
					<span style="font-size:14px;"><?php echo $row['title']; ?></span>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="20%" height="25"><strong>工作地点：</strong></td>
							<td width="20%"><strong>工作性质：</strong></td>
							<td width="20%"><strong>招聘人数：</strong></td>
							<td width="20%"><strong>性别要求：</strong></td>
							<td width="20%"><strong>工资待遇：</strong></td>
						</tr>
						<tr>
							<td height="25"><?php echo $row['jobplace']; ?></td>
							<td><?php echo $row['jobdescription']; ?></td>
							<td><?php echo $row['employ']; ?></td>
							<td><?php if($row['jobsex']==0){echo '不限制';}else if($row['jobsex']==1){echo '男';}else if($row['jobsex']==2){echo '女';} ?></td>
							<td><?php echo $row['treatment']; ?></td>
						</tr>
						<tr>
							<td height="25"><strong>有效期限：</strong></td>
							<td><strong>工作经验：</strong></td>
							<td><strong>学历要求：</strong></td>
							<td><strong>语言能力：</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td height="25"><?php echo $row['usefullife']; ?></td>
							<td><?php echo $row['experience']; ?></td>
							<td><?php echo $row['education']; ?></td>
							<td><?php echo $row['joblang']; ?></td>
							<td>&nbsp;</td>
						</tr>
					</table>
					<strong>职位描述：</strong>
					<div class="jobdesc"><?php if(isset($row['workdesc'])){echo $row['workdesc'];}else{echo '暂无职位描述';} ?></div>
					<strong>职位要求：</strong>
					<div class="jobdesc"><?php if(isset($row['content'])){echo $row['content'];}else{echo '暂无职位要求';} ?></div>
					<?php
					}
					?>
					</div>
			</div>
		</div>
	</div>

<!-- /mainbody-->
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>