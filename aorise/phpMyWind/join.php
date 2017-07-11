<?php require_once(dirname(__FILE__).'/include/config.inc.php');
//初始化参数检测正确性
$cid = empty($cid) ? 18 : intval($cid);
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
	<link rel="stylesheet" href="CSS/joinUs.css">
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header-->
<!-- banner-->
<?php $row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=18 and flag LIKE '%f%'");
			?>
<div class="photo">
		<img src="<?php echo $row['picurl']; ?>" alt="">
	</div>
<!-- /banner-->
<!-- 面包屑导航 -->
<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 j-bread">
				<p><?php echo GetCatName($cid); ?></p>
				<span>您当前所在位置：<?php echo GetPosStr($cid); ?></span>
			</div>
		</div>
	</div>
		<!-- 内容 -->
	<div class="container">
		<div class="row">
		<?php $row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=18 and id=61");
			?>
			<div class="col-lg-12 col-md-12 col-xs-12 preface">
					<h1><?php echo $row['title']; ?></h1>
					<p>
					<?php echo $row['content']; ?>
					</p><br/>
					<span>请输入职位</span>
					<input type="text" name="" value="关键字...">
					<input type="button" name="" value="搜索">
			</div>
		</div>
		<div class="row">
		<?php
		$row=$dopage->GetPage("SELECT * FROM `#@__job` ORDER BY orderid DESC",6);
						while($row = $dosql->GetArray())
						{
							//获取链接地址
							if($cfg_isreurl='Y')
								$gourl = 'joinshow.php?id='.$row['id'];
							else
								$gourl = 'joinshow-'.$row['id'].'-1.html';
						?>
			<div class="col-lg-12 col-md-12 col-xs-12 j-cont">

					<div class="j-title">
						<a href="<?php echo $gourl; ?>"><p><?php echo $row['title']; ?></p></a>
					</div>
					<div class="j-content">
						<p>职位描述：</p>
						<span>
						<?php echo $row['workdesc']; ?>
						</span>
					</div>
					<div class="j-time">
						<span>发布时间:</span>
						<time datetime=""><?php echo GetDateMK($row['posttime']); ?></time>
						有效时间：<p><?php echo $row['usefullife']; ?></p>
					</div>
			</div>

			<?php
			}
			?>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 j-under">
					<p>共1页7条记录</p>
			</div>
		</div>
	</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>