<?php
	require './../php/getCategory2.php';
    $category_obj = new Category();
    $act = isset($_GET['act'])?$_GET['act']:'';
    if($act == 'add'){
    	$data = $_POST;
    	$res = $category_obj->addCat($data);
		if($res['code']) {
			echo "<script>
    				alert('$res[msg]');
					location.href='http://1810a.pro.com/admin/add_cat.php';
    				</script>";die;
		}
    	if($res){
    		echo "<script>
    				alert('添加成功');
					location.href='http://1810a.pro.com/admin/Category.php';
    			</script>";
    	}else{
    		echo "<script>
    				alert('添加失败');
    				location.href='http://1810a.pro.com/admin/add_cat.php';
    			</script>";
    	}
    }
    $data = $category_obj->getCategory();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加分类</title>
	</head>
	<body>
		<form action="./add_cat.php?act=add" method="post">
			<table align="center" border="1px solid black">
				<tr>
					<td colspan="2" align="center">添加分类</td>
				</tr>
				<tr>
					<td>分类名称</td>
					<td><input type="text" name="cat_name" /></td>
				</tr>
				<tr>
					<td>父级分类</td>
					<td>
						<select name="parent_id" id="" style="width:171px">
							<option value="0">无</option>
							<?php foreach($data as $k => $v){?>
								<option value="<?php echo $v['id'];?>">
									<?php echo $v['cat_name'];?>
								</option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td>显示状态</td>
					<td>
						<input type="radio" name="status" id="status" value="1" />显示
						<input type="radio" name="status" id="status" value="2" />隐藏
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>