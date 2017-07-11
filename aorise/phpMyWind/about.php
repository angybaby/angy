<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 15 : intval($cid);
$id  = empty($id)  ? 0 : intval($id);
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
	<link rel="stylesheet" href="CSS/aboutUs.css">
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header-->
<!-- banner-->
<?php $row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=15 and flag LIKE '%f%'");
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
									<?php
					if(empty($id))
						$row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=15 AND id=60");
					else
						$row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=15 AND id=$id");
						?>
				<span>您当前所在位置：<?php echo GetPosStr($cid); ?>><?php echo $row['title']; ?>

				</span>
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
			<!-- 左边内容 -->
			<?php $row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=15 and id=59");
			?>
				<div class="col-lg-3 col-md-3 col-xs-3 side">
						<div class="s-top">
							<p><?php echo $row['title']; ?></p>
						</div>
						<div class="s-under">
						<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=15 and flag LIKE '%a%' AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,7");
						while($row = $dosql->GetArray())
						{
							//获取链接地址
							if($row['linkurl']=='' and $cfg_isreurl!='Y')
								$gourl = 'about.php?cid='.$row['classid'].'&id='.$row['id'];
							else if($cfg_isreurl=='Y')
								$gourl = 'about-'.$row['classid'].'-'.$row['id'].'-1.html';
							else
								$gourl = $row['linkurl'];
						?>
							<ul>
								<li><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a></li>
								<?php
								}
								?>
							</ul>
						</div>
				</div>
				<!-- 右边内容 -->

				<?php
				if(empty($id))
					$row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=15 AND id=60");
					else
				$row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=15 AND id=$id");
			?>
				<div class="col-lg-9 col-md-9 col-xs-9 right">
						<?php echo $row['content']; ?>
				</div>
			</div>
		</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>