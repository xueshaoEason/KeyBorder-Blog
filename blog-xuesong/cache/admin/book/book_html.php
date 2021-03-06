<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="renderer" content="webkit">
		<title></title>  
		<link rel="stylesheet" href="public/css/pintuer.css">
		<link rel="stylesheet" href="public/css/admin.css">
		<script src="public/js/jquery.js"></script>
		<script src="public/js/pintuer.js"></script>  
	</head>
	<body>
		<form method="post" action="index.php?m=admin&c=book&a=member">
			<div class="panel admin-panel">
				<div class="panel-head">
					<strong class="icon-reorder"> 
						用户管理
					</strong>
				</div>
				<div class="padding border-bottom">
					<ul class="search">
						<li>
							<button type="button"  class="button border-green" id="checkall">
								<span class="icon-check"></span> 全选
							</button>
							<button type="submit" class="button border-red">
								<span class="icon-trash-o"></span> 批量删除
							</button>
						</li>
					</ul>
				</div>
				<table class="table table-hover text-center">
					<tr>
						<th width="120"></th>
						<th width="160">姓名</th>       
						<th width="540">邮箱</th>
						<th width="120">留言时间</th>
						<!-- <th width="340">操作</th> -->       
					</tr>   
					<?php foreach($result as $key => $value):?>   
					<tr>
						<td>
							<?php if($value['usertype'] == 1):?>

							<?php else: ?>
							<input type="checkbox" name="id[]" value="<?=$value['uid'];?>" />
							<?php endif;?>
						</td>
						<td><?=$value['username'];?></td>
						<td><?=$value['email'];?></td>
						<td><?=$value['regtime'];?></td>
						<td>
							<div class="button-group"> 
								<?php if($value['usertype'] == 1):?>

								<?php else: ?>
								<a class="button border-red" href="index.php?m=admin&c=book&a=member&id=<?=$value['uid'];?>" onclick="return del(1)">
								<span class="icon-trash-o"></span> 删除</a> 
								<?php endif;?>
							</div>
						</td>
					</tr>
					<?php endforeach;?>
				</table>
			</div>
		</form>
		<script type="text/javascript">

			function del(id){
				if(confirm("您确定要删除吗?")){
					
				}
			}

			$("#checkall").click(function(){ 
			  $("input[name='id[]']").each(function(){
				  if (this.checked) {
					  this.checked = false;
				  }
				  else {
					  this.checked = true;
				  }
			  });
			})

			function DelSelect(){
				var Checkbox=false;
				 $("input[name='id[]']").each(function(){
				  if (this.checked==true) {		
					Checkbox=true;	
				  }
				});
				if (Checkbox){
					var t=confirm("您确认要删除选中的内容吗？");
					if (t==false) return false; 		
				}
				else{
					alert("请选择您要删除的内容!");
					return false;
				}
			}

		</script>
	</body>
</html>