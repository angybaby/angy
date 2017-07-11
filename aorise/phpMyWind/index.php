<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/slideplay.js"></script>
<script type="text/javascript" src="templates/default/js/srcollimg.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<link rel="stylesheet" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/common.css">
	<link rel="stylesheet" href="CSS/index.css">
	<script src="JS/jquery.min.js"></script>
	<script src="JS/bootstrap.min.js"></script>
	<script src="JS/index.js"></script>
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header-->
<!-- banner-->
<!-- 轮播大图 -->
<div id="myCarousel" class="carousel slide">
	<!-- 轮播（Carousel）指标 -->
		<ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
	    <div class="item active">
	        <img src="images/banner1.jpg" alt="First slide">
	    </div>
	    <div class="item">
	        <img src="images/banner2.jpg" alt="Second slide">
	    </div>
	    <div class="item">
	        <img src="images/banner3.jpg" alt="Third slide">
	    </div>
	</div>
	<!-- 轮播（Carousel）导航 -->
		<a class="carousel-control left" href="#myCarousel"
		    data-slide="prev">&lsaquo;
		</a>
		<a class="carousel-control right" href="#myCarousel"
		    data-slide="next">&rsaquo;
		</a>
</div>
<!-- /banner-->
		<!-- 解决方案 -->
		<div class="container">
			<div class="row" >
			<?php $row=$dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE orderid=14");
			?>
				<div class="col-lg-4 col-md-4 col-xs-4 title">
					<a href="<?php echo $row['linkurl']; ?>"><?php echo $row['description']; ?></a>
				</div>
			</div>
			<div class="row" >
				<div class="col-lg-6 col-md-6 col-xs-6 line">
				</div>
			</div>
			<div class="row" >
			<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=14 AND flag LIKE '%c%' AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,3");
						while($row = $dosql->GetArray())
						{
							//获取链接地址
							if($row['linkurl']=='' and $cfg_isreurl!='Y')
								$gourl = 'solutionshow.php?cid='.$row['classid'].'&id='.$row['id'];
							else if($cfg_isreurl=='Y')
								$gourl = 'solutionshow-'.$row['classid'].'-'.$row['id'].'-1.html';
							else
								$gourl = $row['linkurl'];
			?>
				<div class="col-lg-4 col-md-4 col-xs-4">
					 <div class="s-content">
					    <a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" alt=""><p><?php echo $row['title']; ?></p></a>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
<!-- 关于我们 -->
		<div class="container">
			<div class="row" >
			<?php $row=$dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE orderid=15");
			?>
					    <div class="col-lg-4 col-md-4 col-xs-4 title">
					    	<a href="<?php echo $row['linkurl']; ?>"><?php echo $row['description']; ?></a>
					    </div>
				</div>
				<div class="row" >
					    <div class="col-lg-6 col-md-6 col-xs-6 line">
					    </div>
				</div>
			    <div class="row" >
				<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=15 AND flag LIKE '%h%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,4");
						while($row = $dosql->GetArray())
						{
							//获取链接地址
							if($row['linkurl']=='' and $cfg_isreurl!='Y')
								$gourl = 'about.php?cid='.$row['classid'].'&id='.$row['id'];
							else if($cfg_isreurl=='Y')
								$gourl = 'abuot-'.$row['classid'].'-'.$row['id'].'-1.html';
							else
								$gourl = $row['linkurl'];
			?>
			        <div class="col-md-3">
			        	<div class="a-content">
			        		<a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" alt=""><p><?php echo $row['title']; ?></p></a>
			        	</div>
			        </div>
					<?php
					}
					?>

			    </div>
			</div>
		<!-- 新闻资讯 -->
		<div class="container">
			<div class="row" >
			<?php $row=$dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE orderid=16");
			?>
					    <div class="col-lg-4 col-md-4 col-xs-4 title">
					    	<a href="<?php echo $row['linkurl']; ?>"><?php echo $row['description']; ?></a>
					    </div>
				</div>
				<div class="row" >
					    <div class="col-lg-6 col-md-6 col-xs-6 line">
					    </div>
				</div>
			    <div class="row" >
			    <!-- 左边 -->
			    <?php
			    	$row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE flag LIKE '%a%' AND classid=16");
			    ?>
			        <div class="col-md-5">
			        	<div class="n-left">
							<a href="<?php echo $row['linkurl']; ?>"><img src="<?php echo $row['picurl']; ?>" alt=""></a>
								<p>
								<?php echo $row['description']; ?>
								</p>
						</div>
			        </div>

			         <div class="col-md-5 col-md-offset-2">
			        	<div class="n-right">
			        	<!-- 右边 -->
			    <?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=16 AND flag LIKE '%a%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,7");
				while($row = $dosql->GetArray())
				{
					//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
				?>
							<ul>
								<li><span></span><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a><time datetime=""><?php echo GetDateMK($row['posttime']); ?></time></li>
								<?php
								}
								?>
							</ul>
						</div>
			        </div>
			    </div>
			</div>

<?php require_once('footer.php'); ?>
</body>
</html>
