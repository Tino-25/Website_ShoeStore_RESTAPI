<?php foreach($productDetails as $key=>$value){ ?>
	<div id="body_chitietsp">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="chitietsp_layout_main">
						<div class="row">
							<div class="col-4">
								<div class="chitietsp__img">
									<div class="chitietsp__img-main">
										<img src="./assets/img/product/<?=$value['image']?>" alt="">
									</div>
									<div class="chitietsp__img-mini">
										<?php foreach($productImages as $key2=>$value2){ ?>
											<img src="./assets/img/product/<?=$value2['image']?>" alt="">
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-7">
								<form action="?act=cart" method="GET">
									<input type="hidden" name="act" value="cart">
									<input type="hidden" name="mod" value="add">
									<input type="hidden" name="idProduct" value="<?=$value['idProduct']?>">
									<div class="chitietsp_wrap">
										<div class="chitietsp--item chitietsp_namesp">
											<h2><?=$value['productName']?></h2>
										</div>
										<div class="chitietsp--item chitietsp_status">
											<span class="chitietsp_status--title">Tình trạng: </span>
											<span class="chitietsp_status--content">
												<?php 
													if($value['quantity'] > 0){
														echo "Còn trong kho";
													}else{
														echo "Đã hết hàng";
													}
												?>
											</span>
										</div>
										<div class="chitietsp--item chitietsp_price">
											<span class="chitietsp_price--curent">
												<?=$value['productUnitPrice']?>đ
											</span>
											<!-- <span class="chitietsp_price--old">1,000.000đ</span> -->
										</div>
										<div class="chitietsp--item chitietsp_quantity">
											<a href="#" class="chitietsp_quantity--minus">-</a>
											<input type="hidden" name="" id="quantity_main" value="<?=$value['quantity']?>">
											<input type="text" name="quantity" id="get_quantity" value="1" class="get_quantity">
											<a href="#" class="chitietsp_quantity--plus">+</a>
										</div>
										<div class="chitietsp--item chitietsp_btn">
											<button class="btn chitietsp_btn__add-cart <?php 
													if($value['quantity'] <= 0){
														echo "disaple";
													}
												?>" type="submit">
												Thêm vào giỏ
											</button>
											<!-- <button type="submit" class="btn chitietsp_btn__buy-now">
												Mua Ngay
											</button> -->

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- mô tả -->
					<div class="chitietsp_describe">
						<div class="chitietsp_describe__top">
							<h3>Mô tả</h3>
						</div>
						<div class="chitietsp_describe__content">
							<?=$value['productDescription']?>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="chitietsp__layout-right">
						<!-- địa chỉ -->
						<div class="chitietsp__layout-right__content">
							<div class="chitietsp__layout-right__content__top">
								<h4>Sản phẩm có tại</h4>
							</div>
							<div class="chitietsp__layout-right__content__body">
								<ul class="chitietsp__layout-right__content__body__list">
									<li class="chitietsp__layout-right__content__body__item">
										<i class="fas fa-circle"></i>
										Cơ sở 1, số nhà, tên đường, tỉnh, thành phố
									</li>
								</ul>
							</div>
						</div>
						<!-- Sản phẩm tương tự -->
						<div class="similar-product">
							<div class="similar-product__top">
								<h3>Sản phẩm tương tự</h3>
							</div>
							<!-- item similar product -->
							<?php foreach($productSimilar as $key3=>$value3){ ?>
								<div class="similar-product__content">
									<img class="similar-product__img" src="./assets/img/product/<?=$value3['image']?>" alt="">
									<div class="similar-product__content_text">
										<span class="name">
											<?=$value3['productName']?>
										</span>
										<p class="price">330.000đ</p>
										<span class="price-old">330.000đ</span>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php } ?>