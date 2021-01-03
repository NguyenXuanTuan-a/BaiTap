<?php
require('top.inc.php');
$id_categories='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_desc	='';
$meta_keyword='';
$best_seller='';
$sub_id_categories='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$id_categories=$row['id_categories'];
		$sub_id_categories=$row['sub_id_categories'];
		$name=$row['name'];
		$mrp=$row['mrp'];
		$price=$row['price'];
		$qty=$row['qty'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$best_seller=$row['best_seller'];
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$id_categories=get_safe_value($con,$_POST['id_categories']);
	$sub_id_categories=get_safe_value($con,$_POST['sub_id_categories']);
	$name=get_safe_value($con,$_POST['name']);
	$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
	$best_seller=get_safe_value($con,$_POST['best_seller']);
	
	$res=mysqli_query($con,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],$img.$image);
				$update_sql="update product set id_categories='$id_categories',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller',sub_id_categories='$sub_id_categories' where id='$id'";
			}else{
				$update_sql="update product set id_categories='$id_categories',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller',sub_id_categories='$sub_id_categories' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],$img.$image);
			$sql_insert =" insert into product(id_categories,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image,best_seller,sub_id_categories) values('$id_categories','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$best_seller','$sub_id_categories')";
			mysqli_query($con,$sql_insert);
		}
		header('location:product.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Danh Mục</label>
									<select class="form-control" name="id_categories" id="id_categories" onchange="get_sub_cat('')" required>
										<option>Chọn Danh Mục</option>
										<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$id_categories){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Chi Tiết Danh Mục</label>
									<select class="form-control" name="sub_id_categories" id="sub_id_categories">
										<option>Chọn Chi Tiết Danh Mục</option>
									</select>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Tên Sản Phẩm</label>
									<input type="text" name="name" placeholder="Tên Sản Phẩm" class="form-control" required value="<?php echo $name?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Bán Chạy</label>
									<select class="form-control" name="Bán Chạy" required>
										<option value=''>Chọn</option>
										<?php
										if($best_seller==1){
											echo '<option value="1" selected>Có</option>
												<option value="0">Không</option>';
										}elseif($best_seller==0){
											echo '<option value="1">Có</option>
												<option value="0" selected>Không</option>';
										}else{
											echo '<option value="1">Có</option>
												<option value="0">Không</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Giá Ảo</label>
									<input type="text" name="mrp" placeholder="Giá Ảo" class="form-control" required value="<?php echo $mrp?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Giá Thực</label>
									<input type="text" name="price" placeholder="Giá Thực" class="form-control" required value="<?php echo $price?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Số Lượng</label>
									<input type="text" name="qty" placeholder="Số Lượng" class="form-control" required value="<?php echo $qty?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Ảnh</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Mổ Tả </label>
									<textarea name="short_desc" placeholder="Mổ Tả" class="form-control" required><?php echo $short_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Chi Tiết Mô Tả</label>
									<textarea name="description" placeholder="Chi Tiết Mô Tả" class="form-control" required><?php echo $description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Đầu Đề Trang</label>
									<textarea name="meta_title" placeholder="Đầu Đề Trang" class="form-control"><?php echo $meta_title?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Gửi</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 <script>
			function get_sub_cat(sub_cat_id){
				var id_categories=jQuery('#id_categories').val();
				jQuery.ajax({
					url:'get_sub_cat.php',
					type:'post',
					data:'id_categories='+id_categories+'&sub_cat_id='+sub_cat_id,
					success:function(result){
						jQuery('#sub_id_categories').html(result);
					}
				});
			}
		 </script>
         
<?php
require('footer.inc.php');
?>
<script>
<?php
if(isset($_GET['id'])){
?>
get_sub_cat('<?php echo $sub_id_categories?>');
<?php } ?>
</script>