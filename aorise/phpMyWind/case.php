<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 17 : intval($cid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,$cid); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
	<link rel="stylesheet" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/common.css">
	<link rel="stylesheet" href="CSS/case.css">
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header-->
<!-- banner-->
<?php $row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=17 and flag LIKE '%f%'");
			?>
<div class="photo">
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
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 c-title">
				<p><?php echo GetCatName($cid); ?></p>
			</div>
		</div>
	</div>
		<!-- 内容 -->
		<div class="container">
				<div class="row">
						<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=17 AND flag LIKE '%c%' AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,5");
						while($row = $dosql->GetArray())
						{
							//获取链接地址
							if($row['linkurl']=='' and $cfg_isreurl!='Y')
								$gourl = 'caseshow.php?cid='.$row['classid'].'&id='.$row['id'];
							else if($cfg_isreurl=='Y')
								$gourl = 'caseshow-'.$row['classid'].'-'.$row['id'].'-1.html';
							else
								$gourl = $row['linkurl'];
						?>
					<div class="col-lg-4 col-md-4 col-xs-4 c-cont">
							<a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" alt=""><p><?php echo $row['title']; ?></p></a>
					</div>
					<?php
					}
					?>
				</div>
			</div>

<?php require_once('footer.php'); ?>