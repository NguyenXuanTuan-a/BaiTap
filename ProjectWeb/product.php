<?php 
require('top.php');
require('rating.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$postID = 1; 

$query = "SELECT p.*, COUNT(r.rating_number) as rating_num, FORMAT((SUM(r.rating_number) / COUNT(r.rating_number)),1) as average_rating FROM posts as p LEFT JOIN rating as r ON r.post_id = p.id WHERE p.id = $postID GROUP BY (r.post_id)"; 
$result = mysqli_query($con,$query); 
$postData = mysqli_fetch_assoc($result);     
?>

 <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="categories.php?id=<?php echo $get_product['0']['id_categories']?>"><?php echo $get_product['0']['categories']?></a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $get_product['0']['name']?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo $img.$get_product['0']['image']?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $get_product['0']['name']?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize" style="text-decoration: line-through;">$<?php echo $get_product['0']['mrp']?></li>
                                    <li>$<?php echo $get_product['0']['price']?></li>
                                </ul>
                                <p class="pro__info"><?php echo $get_product['0']['short_desc']?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
										<?php
										$productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
										
										$pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;
										
										$cart_show='yes';
										if($get_product['0']['qty']>$productSoldQtyByProductId){
											$stock='Còn hàng';			
										}else{
											$stock='Đã hết hàng';
											$cart_show='';
										}
										?>
                                        <p style="font-size: 19px; color: red"><span>Availability:</span> <?php echo $stock?></p>
                                    </div>
									<div class="sin__desc">
										<?php
										if($cart_show!=''){
										?>
                                        <p><span>Qty:</span> 
										<select id="qty">
											<?php
											for($i=1;$i<=$pending_qty;$i++){
												echo "<option>$i</option>";
											}
											?>
										</select>
										</p>
										<?php } ?>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $get_product['0']['categories']?></a></li>
                                        </ul>
                                    </div>
                                    
                                    </div>
									
                                </div>
								<?php
								if($cart_show!=''){
								?>
								<a class="fr__btn" href="javascript:void(0)" style="margin-bottom: 30px" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to cart</a>
								<?php } ?>
                                <div class="container" style="padding-left: 0px" >
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rating" value="5" <?php echo ($postData['average_rating'] >= 5)?'checked="checked"':''; ?>>
                                        <label for="star5"></label>
                                        <input type="radio" id="star4" name="rating" value="4" <?php echo ($postData['average_rating'] >= 4)?'checked="checked"':''; ?>>
                                        <label for="star4"></label>
                                        <input type="radio" id="star3" name="rating" value="3" <?php echo ($postData['average_rating'] >= 3)?'checked="checked"':''; ?>>
                                        <label for="star3"></label>
                                        <input type="radio" id="star2" name="rating" value="2" <?php echo ($postData['average_rating'] >= 2)?'checked="checked"':''; ?>>
                                        <label for="star2"></label>
                                        <input type="radio" id="star1" name="rating" value="1" <?php echo ($postData['average_rating'] >= 1)?'checked="checked"':''; ?>>
                                        <label for="star1"></label>
                                    </div>
                                    <div class="overall-rating">
                                        (Average Rating <span id="avgrat"><?php echo $postData['average_rating']; ?></span>
                                        Based on <span id="totalrat"><?php echo $postData['rating_num']; ?></span> rating)</span>
                                    </div>
                                    
                                    <div class="content"><?php echo $postData['content']; ?></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area 
		<!-- Start Product Description -->
         <div class="between_mota">
            <ul class="menu_chon">
                <li class="muc_mo_ta" onclick="hien_thi()">                    
                    <h3>MÔ TẢ</h3>
                </li>
                <li class="muc_danh_gia" onclick="an()">                    
                    <h3>ĐÁNH GIÁ</h3>
                </li>
            </ul>
            <div class="khung_mota">
                <div class="mota">
                   <table class="content-table">
                    <tbody>
                        <tr>
                          <th>BỘ MÁY & NĂNG LƯỢNG</th>
                          <td>Cơ</td>
                        </tr>
                        <tr>
                          <th>CHẤT LIỆU DÂY</th>
                          <td>Dây Bạch Kim</td>
                        </tr>
                        <tr>
                          <th>CHẤT LIỆU MẶT KÍNH</th>
                          <td>Kính Tráng Kim Cương</td>
                        </tr>
                        <tr>
                          <th>HÌNH DẠNG MẶT SỐ</th>
                          <td>Tròn</td>
                        </tr>
                        <tr>
                          <th>KÍCH THƯỚC MẶT SỐ</th>
                          <td>40-50mm</td>
                        </tr>
                        <tr>
                          <th>MÀU MẶT SỐ</th>
                          <td>Giả Gỗ</td>
                        </tr>
                        <tr>
                          <th>MỨC CHỐNG NƯỚC</th>
                          <td>100%</td>
                        </tr>
                         <tr>
                          <th>XUẤT XỨ</th>
                          <td>Thụy Sĩ</td>
                        </tr>
                     </tbody>
                    </table>
                </div>
                <div class="trang_danh_gia">
                    <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=1178657312530849&autoLogAppEvents=1" nonce="d3hQj3D4"></script>
                        <div class="fb-comments" data-href="http://localhost/ProjectWeb/product.php" data-width="" data-numposts="5" >
                        </div>
                </div>
            </div>
        </div>
        <!-- End Product Description -->
        
										
<?php require('footer.php')?>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
     function hien_thi(){
            $(".mota").show();
            $(".trang_danh_gia").hide();
        }
        function an(){
            $(".mota").hide();
            $(".trang_danh_gia").show();
        }
</script>
<style type="text/css">
    .between_mota{
    width: 90%;
    height: 40%;
    margin: auto;
    text-align: left;
    margin-bottom: 20px;
}
.menu_chon{
    display:flex;
    margin-block-start: 1em;
    margin-block-end: 0em;
    padding-inline-start: 0px;
}
.menu_chon li{
    height: 45px;
    padding: 18px;
    list-style-type: none;
    margin-right: 3px;
    cursor: pointer;
    border: 1px solid #ddd;
}
.menu_chon li h3{
    margin: 0px 0px 0px 0px;
}
.khung_mota{
    padding: 30px 0;
    border: 1px solid #ececec;
}
.trang_danh_gia{
    width: 94%;
    height: 92%;
    padding: 2% 3% 6% 3%;
    font-size: 16px;
    display: none;
}
.phan_danh_gia{
    width: 95%;
    height: 95%;
    padding: 0% 3% 5% 2%;
    border: 2px solid black;
}
.phan_danh_gia h4{
    margin-block-start: 1em;
    margin-block-end: 0.5em;
}
.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  overflow: hidden;
  width: 80%;
  margin-left: 117px;

}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 15px 18px;
  font-size: 20px;
  color: black;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 1px solid #dddddd;
}
.rate {
    float: left;
    height: 46px;
    text-align: left;
}
.rate:not(:checked) > input {
    position:absolute;
    /*top:-9999px;*/
    display: none;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    white-space:nowrap;
    cursor:pointer;
    font-size:40px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    /*content: 'â˜… ';*/
    content: "\2605";
}
.rate > input:checked ~ label, .rate input[checked="checked"] ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

.overall-rating{
    width: 100%;
    float: left;
    font-size: 14px;
    margin-top: 5px;
    color: #8e8d8d;
}

.statusMsg{
    font-size: 16px;
    padding: 10px !important;
    border: 1.5px dashed;
}
.statusMsg.errordiv{
    color: #ff4040;
}
.statusMsg.succdiv{
    color: #00bf6f;
}
.rate label{
    margin-bottom: 0;
}
</style>  

<script>
$(function() {
    $('.rate input').on('click', function(){
        var postID = <?php echo $postData['id']; ?>;
        var ratingNum = $(this).val();
        
        $.ajax({
            type: 'POST',
            url: 'rating.php',
            data: 'postID='+postID+'&ratingNum='+ratingNum,
            dataType: 'json',
            success : function(resp) {
                if(resp.status == 1){
                    $('#avgrat').text(resp.data.average_rating);
                    $('#totalrat').text(resp.data.rating_num);
                    
                    alert('Thanks! You have rated '+ratingNum+' to "<?php echo $postData['title']; ?>"');
                }else if(resp.status == 2){
                    alert('You have already rated to "<?php echo $postData['title']; ?>"');
                }
                
                $( ".rate input" ).each(function() {
                    if($(this).val() <= parseInt(resp.data.average_rating)){
                        $(this).attr('checked', 'checked');
                    }else{
                        $(this).prop( "checked", false );
                    }
                });
            }
        });
    });
});
</script>   
<!-- <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <!-- <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                  <!--       <!-- End List And Grid View -->
                  <!--   </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                          <!--   <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <?php echo $get_product['0']['description']?>
                                </div>
                            </div> -->
                            <!-- End Single Content -->
                            
                 <!--        </div>
                    </div>
                </div>
            </div>
        </section> --> --> --> --> -->