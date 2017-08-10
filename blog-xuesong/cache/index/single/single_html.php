<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="public/css/font-awesome/css/font-awesome.min.css">

    <!-- Google Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600|PT+Serif:400,400italic' rel='stylesheet' type='text/css'>

    <!-- Styles -->
   <link rel="stylesheet" href="public/css/style.css" id="theme-styles">

    <!--[if lt IE 9]>
        <script src="js/vendor/google/html5-3.6-respond-1.1.0.min.js"></script>
    <![endif]-->


</head>
<body>
    <header>
        <div class="widewrapper masthead">
            <div class="container">
                <a href="index.php?m=index&c=index&a=index" id="logo">
                    <img src="public/images/logo2.png" height="150" width="350" alt="clean Blog">
                </a>

                <div id="mobile-nav-toggle" class="pull-right">
                    <a href="#" data-toggle="collapse" data-target=".clean-nav .navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>

                <nav class="pull-right clean-nav">
                    <div class="collapse navbar-collapse">
                        <ul class="nav nav-pills navbar-nav">
							<li>
								<a href="index.php?m=index&c=index&a=index">Home</a>
							</li>
							<?php if(!empty($_SESSION['username'])):?>
								<li>
									<a><?=$_SESSION['username'];?></a>
								</li>
								<?php if((!empty($_SESSION['usertype']) && $_SESSION['usertype'] == 1)):?>
									<li>
										<a href="index.php?m=admin&c=book&a=login">Center</a>
									</li>
								<?php endif;?>
								<li>
									<a href="index.php?m=index&c=user&a=out">Quit</a>
								</li>
							<?php else: ?>
								<li>
									<a href="index.php?m=index&c=user&a=login">Login</a>
								</li>
								<li>
									<a href="index.php?m=index&c=user&a=register">Register</a>
								</li>
							<?php endif;?>
						</ul>
                    </div>
                </nav>

            </div>
        </div>

        <div class="widewrapper subheader">
            <div class="container">
                <div class="clean-breadcrumb">
                    <?php if((!empty($_SESSION['usertype']) && $_SESSION['usertype'] == 1)):?>
                    <a href="index.php?m=index&c=index&a=index">Home</a>
                    <span class="separator">&#x2F;</span>
                    <a href="index.php?m=index&c=posts&a=posts">Posting</a>
                    <?php else: ?>
                    <a href="index.php?m=index&c=index&a=index">Home</a>
                    <?php endif;?>
                </div>
                <div class="clean-searchbox">
                    <form action="#" method="get" accept-charset="utf-8">
                        <input class="searchfield" id="searchbox" type="text" placeholder="<?=$web['Signature'];?>">
                         <!-- <button class="searchbutton" type="submit">
                            <i class="fa fa-search"></i>
                        </button> -->
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
					<?php if(!empty($blog_post)):?>
						<?php foreach($blog_post as $value):?>
							<article class="blog-post">
								<header>
									<div class="lead-image">
										<img src="<?=$value['photo'];?>" style="width:680px;height:380px" alt="" class="img-responsive">
									</div>
								</header>
								<div class="body">
									<h1><?=$value['title'];?></h1>
									<div class="meta">
										<i class="fa fa-user"></i>
										&nbsp;<?=$value['zid'];?>&nbsp;
										<i class="fa fa-calendar"></i>
										&nbsp;<?php  echo date('Y-m-d',$value['createtime']);?>&nbsp;
										<i class="fa fa-comments"></i>
										<span class="data" style="font-weight:700;color:#CCCCCC">
											<a href="#comments"><?=$count;?>&nbsp;Comments</a>
										</span>
									</div>
									<?=$value['content'];?>
								</div>
							</article>
						<?php endforeach;?>
					<?php endif;?>
                    <aside class="social-icons clearfix">
                        <h3>Share on</h3>
                        <a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-google"></i></a>
                    </aside>

					<aside class="comments" id="comments">
						<hr>

						<h2><i class="fa fa-comments"></i>&nbsp;&nbsp;<?=$count;?>&nbsp;Comments</h2>
						<?php if(!empty($comment)):?>
							<?php foreach($comment as $values):?>
								<article class="comment">
									<div class="meta">
										<p>
											<span style="font-size:18px;font-weight:700;color:#6666CC">
												<a href="#"><?=$values['zid'];?></a>
											</span>&nbsp;&nbsp;
											<span style="color:#CCCCCC">
												<?php  echo date('Y-m-d',$values['createtime']);?>
											</span>
											<span>
												-
											</span>
											<span>
												<a href="#create-comment" class="reply-link">Reply</a>
											</span>
										</p>
									</div>
									<div class="body">
										<?=$values['content'];?>
									</div>
								</article>
							<?php endforeach;?>
						<?php endif;?>

								<!-- <article class="comment reply">
									<div class="meta">
										<p>
											<span style="font-size:18px;font-weight:700;color:#6666CC">
												<a href="#"><?=$values['zid'];?></a>
											</span>&nbsp;&nbsp;
											<span style="color:#CCCCCC">
												<?php  echo date('Y-m-d',$values['createtime']);?>
											</span>
											<span>
												-
											</span>
											<span>
												<a href="#create-comment" class="reply-link">Reply</a>
											</span>
										</p>
									</div>
									<div class="body">
										<?=$values['content'];?>
									</div>
								</article> -->
					</aside>

                    <aside class="create-comment" id="create-comment">
                        <hr>
                        <h2><i class="fa fa-pencil"></i> Add Comment</h2>

                        <form action="index.php?m=index&c=single&a=addcomment&pid=<?=$pid;?>" method="post" accept-charset="utf-8">
                            <textarea rows="10" name="message" id="comment-body" placeholder="Your Message" class="form-control input-lg"></textarea>
                            <div class="buttons clearfix">
                                <button type="submit" class="btn btn-xlarge btn-clean-one">Submit</button>
                            </div>
                        </form>
                    </aside>
                </div>
				<aside class="col-md-4 blog-aside">
                    <div class="aside-widget">
                        <header>
                            <h3>Omnibus</h3>
                        </header>
                        <div class="body">
                            <ul class="clean-list">
							<?php if(!empty($resu)):?>
								<?php foreach($resu as $val):?>
									<li><a href="index.php?m=index&c=single&a=single&pid=<?=$val['pid'];?>"><?=$val['title'];?></a></li>
								<?php endforeach;?>
							<?php endif;?>
                            </ul>
                        </div>
                    </div>

                    <div class="aside-widget">
                        <header>
                            <h3>NewestUser</h3>
                        </header>
                        <div class="body clearfix">
                            <ul class="tags">
							<?php if(!empty($visit)):?>
                                <?php foreach($visit as $values):?>
									<li><a href="#"><?=$values['username'];?></a></li>
								<?php endforeach;?>
							<?php endif;?>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <footer>
        <div class="widewrapper footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-widget">
                        <h3> <i class="fa fa-user"></i>About me</h3>

                            <table style="width:300px;height:170px;">
                                <tr>
                                    <td>name</td>
                                    <td><?=$web['Owner'];?></td>
                                </tr>
                                <tr>
                                    <td>Signature</td>
                                    <td><?=$web['Signature'];?></td>
                                </tr>
                                <tr>
                                    <td>School</td>
                                    <td><?=$web['School'];?></td>
                                </tr>
                                <tr>
                                    <td>Job</td>
                                    <td><?=$web['Job'];?></td>
                                </tr>
                                <tr>
                                    <td>Hobby</td>
                                    <td><?=$web['Hobby'];?></td>
                                </tr>
                                 <tr>
                                    <td>Nickname</td>
                                    <td><?=$web['Nickname'];?></td>
                                </tr>
                                 <tr>
                                    <td>Tel</td>
                                    <td><?=$web['Tel'];?></td>
                                </tr>
                                 <tr>
                                    <td>Email</td>
                                    <td><?=$web['Email'];?></td>
                                </tr>
                                 <tr>
                                    <td>Postcode</td>
                                    <td><?=$web['Postcode'];?></td>
                                </tr>
                                 <tr>
                                    <td>Address</td>
                                    <td><?=$web['Address'];?></td>
                                </tr>
                            </table>
                    </div>

                    <div class="col-md-4 footer-widget">
                        <h3> <i class="fa fa-pencil"></i>Recent Articles</h3>
                        <ul class="clean-list">
                            <?php if(!empty($re)):?>
                                <?php foreach($re as $val):?>
                                    <li><a href="index.php?m=index&c=single&a=single&pid=<?=$val['pid'];?>"><?=$val['title'];?></a></li>
                                <?php endforeach;?>
                            <?php endif;?>

                        </ul>
                    </div>

                    <div class="col-md-4 footer-widget">
                        <h3> <i class="fa fa-envelope"></i>Contact Me</h3>

                            <table style="width:300px;height:170px;">
                                <tr>
                                    <td>Nickname</td>
                                    <td><?=$web['Nickname'];?></td>
                                </tr>
                                <tr>
                                    <td>Tel</td>
                                    <td><?=$web['Tel'];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?=$web['Email'];?></td>
                                </tr>
                                <tr>
                                    <td>Postcode</td>
                                    <td><?=$web['Postcode'];?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?=$web['Address'];?></td>
                                </tr>
                            </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="widewrapper copyright">
            Copyright 2017 . 你 是 这 世 界 写 给 我 的 情 书 , 我 还 能 见 到 你 吗</div>
    </footer>

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/modernizr.js"></script>
</body>
</html>