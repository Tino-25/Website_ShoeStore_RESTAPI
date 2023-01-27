<div id="main_home">
	<div id="body">
		<div class="body__header">
			<div id="banner">
				<div class="container banner__wrap">
					<!-- <img src="./assets/img/banner/AK-47_assault_rifle.png" alt="Banner"> -->
					<div class="container"> 
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<?php $num = 0; ?>
								<?php foreach($banner as $key=>$value){ ?>
									<?php if($value['active'] == 1){ ?>
										<li data-target="#myCarousel" data-slide-to="$num" class="active"></li>
									<?php }else{ ?>
										<li data-target="#myCarousel" data-slide-to="$num"></li>
									<?php } ?>
								<?php } ?>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<?php foreach($banner as $key=>$value){ ?>
									<?php if($value['active'] == 1){ ?>
										<div class="item active">
											<img src="./assets/img/banner/<?=$value['image']?>" alt="Los Angeles" style="width:100%;">
										</div>
									<?php }else{ ?>
										<div class="item">
											<img src="./assets/img/banner/<?=$value['image']?>" alt="Los Angeles" style="width:100%;">
										</div>
									<?php } ?>    
								<?php } ?>
							</div>

							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div id="body__show-category">
				<div class="container body__show-category__wrap">
					<!-- category item -->
					<?php foreach($allCategory as $key=>$value){ ?>
						<div class="category-item">
							<div class="category-item__img--wrap">
								<img class="category-item__img" src="./assets/img/category/<?php echo $value['categoryImage']; ?>" alt="">
							</div>
							<p class="category-item__name">
								<a class="link" href="?act=cuahang&category=<?php echo $value['idCategoryProduct']; ?>">
									<?php echo $value['categoryName']; ?>
								</a>
							</p>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
		<!-- body content -->
		<div class="body-content">
			<!-- best selling products -->
			<div class="body-content__item">
				<div class="container">
					<div class="body-content__item__header">
						<hr class="hr-dashed body-content__item__header__hr">
						<div class="body-content__item__header__text">
							<span>Sản phẩm bán chạy</span>
						</div>
					</div>
					<div class="show-product__home">
						<?php foreach($topSelling as $key=>$value){ ?>
							<div class="show-product__home__item">
								<img src="./assets/img/product/<?=$value['image']?>" alt="">
								<p class="name__product">
									<?=$value['productName'] ?>
								</p>
								<p class="price__product">
									<?=$value['productUnitPrice']?>
								</p>
								<a class="show-product__home__item--btn" href="?act=details&id=<?=$value['idProduct']?>">
									Xem chi tiết
								</a>
							</div>
						<?php } ?>
					</div>
					<a class="body-content__item--more" href="?act=cuahang&topSelling=1">
						Xem thêm 
						<i class="fas fa-angle-double-right"></i>
					</a>
				</div>
			</div>

			<!-- Tủ nhựa cao cấp -->
			<div class="body-content__item">
				<div class="container">
					<div class="body-content__item__header">
						<hr class="hr-dashed body-content__item__header__hr">
						<div class="body-content__item__header__text">
							<span>Sản phẩm mới</span>
						</div>
					</div>
					<div class="show-product__home">
						<?php foreach($newProduct as $key=>$value){ ?>    
							<div class="show-product__home__item">
								<img src="./assets/img/product/<?=$value['image']?>" alt="">
								<p class="name__product">
									<?= $value['productName']?>
								</p>
								<p class="price__product"><?= $value['productUnitPrice']?></p>
								<a class="show-product__home__item--btn" href="?act=details&id=<?= $value['idProduct']?>">Xem chi tiết</a>
							</div>
						<?php } ?>
					</div>
					<a class="body-content__item--more" href="?act=cuahang&latest=1">
						Xem thêm 
						<i class="fas fa-angle-double-right"></i>
					</a>
				</div>
			</div>


		</div>
	</div>
</div>