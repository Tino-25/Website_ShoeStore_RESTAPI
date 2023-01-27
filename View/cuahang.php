
<div id="body_cuahang">
    <div class="wrap">
        <div class="row">
            <div class="col-2">
                <div class="cuahang__subnav">
                    <div class="subnav__header">
                        <h3 class="subnav__header__text">Lọc Sản Phẩm</h3>
                    </div>
                    <form action="" method="GET">
                        <input type="hidden" name="act" value="cuahang">
                        <ul class="subnav__list">
                            <li class="subnav__list-item">
                                <span class="sufmbnav__list-item__text">Giá (VND)</span>
                                <div class="subnav__filter-price">
                                    <ul class="subnav__filter-price__list">
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price1" value="0-100000">
                                            <label for="filter-price1">Dưới 100.000</label>
                                        </li>
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price2" value="100000-200000">
                                            <label for="filter-price2">100.000 - 200.000</label>
                                        </li>
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price3" value="200000-300000">
                                            <label for="filter-price3">200.000 - 300.000</label>
                                        </li>
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price4" value="300000-500000">
                                            <label for="filter-price4">300.000 - 500.000</label>
                                        </li>
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price5" value="500000-1000000000000000000000">
                                            <label for="filter-price5">Trên 500.000</label>
                                        </li>
                                    </ul>
                                </div>                                    
                            </li>
                        </ul>

                        <div class="col-12 subnav__filter-colorsize">
                            <span class="subnav__list-item__text">Màu</span>
                            <div class="subnav__filter-colorsize">
                                <select name="filter-color" class="filter-colorsize">
                                    <option value="">--chose--</option>
                                    <?php foreach($allColor as $key=>$value){ ?> 
                                        <option value="<?=$value['color']?>">
                                            <?=$value['color']?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 subnav__filter-colorsize">
                            <span class="subnav__list-item__text">Size</span>
                            <div class="subnav__filter-colorsize">
                                <select name="filter-size" class="filter-colorsize">
                                    <option value="">--chose--</option>
                                    <?php foreach($allSize as $key=>$value){ ?> 
                                        <option value="<?=$value['size']?>">
                                            <?=$value['size']?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="subnav__list-item__btn--wrap">
                            <button type="submit" class="subnav__list-item__btn">
                                Lọc
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="cuahang__product">
                   <div class="cuahang__product__header">
                    <span class="cuahang__product__header__text">Sắp xếp theo: </span>
                    <a href="#" class="cuahang__product__header__btn active" data-toggle="modal" data-target="#exampleModal">
                        Suggestion
                    </a>
                    <a href="?act=cuahang&latest=1" class="cuahang__product__header__btn">
                        Mới nhất
                    </a>
                    <a href="?act=cuahang&topSelling=1" class="cuahang__product__header__btn">
                        bán chạy
                    </a>
                    <div class="cuahang__product__header__btn cuahang__product__header__btn--wrap">
                        Loại Sản phẩm 
                        <i class="fas fa-chevron-down"></i>
                        <ul class="filter__sort">
                            <!-- <li class="filter__sort-item">
                                <a href="#">Giá: từ thấp đến cao</a>
                            </li>
                            <li class="filter__sort-item">
                                <a href="#">Giá: từ cao đến thấp</a>
                            </li> -->
                            <?php foreach($allCategory as $key=>$value){ ?>
                                <li class="filter__sort-item">
                                    <a href="?act=cuahang&category=<?=$value['idCategoryProduct'];?>">
                                        <?php echo $value['categoryName']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="cuahang__product__header__btn cuahang__product__header__btn--wrap">
                        Thương hiệu
                        <i class="fas fa-chevron-down"></i>
                        <ul class="filter__sort">
                            <?php foreach($allBrand as $key=>$value){ ?>
                                <li class="filter__sort-item">
                                    <a href="?act=cuahang&filter-brand=<?=$value['idBrand'];?>">
                                        <?php echo $value['brandName']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                   <!--  
                    Giao diện - Phân trang
                   <div class="devide__page">
                        <div class="devide__page__text">
                            <span class="devide__page__text--page">1</span>
                            <span class="devide__page__text--sumpage">/25</span>
                        </div>
                        <div class="devide__page__btn">
                            <div class="devide__page__btn__item devide__page__btn--left">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <div class="devide__page__btn__item devide__page__btn--right active">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>   --> 
                </div>
                <?php 
                    if(isset($_GET['topSelling'])){
                        echo "<center>Sắp xếp sản phẩm từ bán chạy nhất đến bán chậm nhất</center>";
                    }elseif (isset($_GET['latest'])) {
                        echo "<center>Sắp xếp sản phẩm từ mới nhất đến cũ nhất</center>";
                    }
                ?>
                <div class="cuahang_show-product">
                    <div class="grid_row">
                        <!-- item product -->
                        <?php foreach($allProduct as $key=>$value){ ?>
                            <div class="grid_column-2">
                                <div class="cuahang_show-product__item">
                                    <div class="image__wrap">
                                        <img class="cuahang_show-product__item__img" src="./assets/img/product/<?=$value['image']?>" alt="">
                                    </div>
                                    <p class="cuahang_show-product__item__name">
                                        <?=$value['productName']?>
                                    </p>
                                    <div class="cuahang_show-product__item__name__price">
                                        <!-- 
                                        <span class="cuahang_show-product__item__name--old">
                                            1,000.000đ 
                                        </span> 
                                    -->
                                    <span class="cuahang_show-product__item__name--curent">
                                     <?=$value['productUnitPrice']?>
                                 </span>
                                 <p class="size-color">
                                    size: <?=$value['size']?>
                                    -
                                    color: <?=$value['color']?>
                                    -
                                    brand: <?=$value['brandName']?>
                                    <br>
                                    Đã bán: <?=$value['productSold']?>
                                    -
                                    Ngày nhập: <?=$value['dateIn']?>
                                </p>
                            </div>
                            <div class="cuahang_show-product__item__name__btn">
                                <a href="?act=details&id=<?=$value['idProduct']?>">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- phân trang -->
            <!-- <div class="grid_row cuahang_product__paging--wrap">
                <div class="cuahang_product__paging">
                    <a href="#" class="cuahang_product__paging__btn-left">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <ul class="cuahang_product__paging-list">
                        <li class="cuahang_product__paging-item active">
                            <a href="#">1</a>
                        </li>
                        <li class="cuahang_product__paging-item">
                            <a href="#">2</a>
                        </li>
                        <li class="cuahang_product__paging-item">
                            <a href="#">3</a>
                        </li>
                        <li class="cuahang_product__paging-item">
                            <a href="#">...</a>
                        </li>
                        <li class="cuahang_product__paging-item">
                            <a href="#">50</a>
                        </li>
                    </ul>
                    <a href="#" class="cuahang_product__paging__btn-right">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div> -->
        </div>
    </div>
</div>
</div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Dress suggestions for you - Hãy nhập thông tin của bạn
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_suggest" class="modal-body">
                <form action="" method="get">
                    <input type="hidden" name="act" value="cuahang">
                    <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10 padding-top--10">
                            <!--
                            < ? php foreach($allCategory as $key=>$value){ ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="< ?php echo $value['idCategoryProduct']; ?>" value="< ?php echo $value['idCategoryProduct']; ?>" name="category">
                                    <label class="form-check-label" for="< ?php echo $value['idCategoryProduct']; ?>">
                                        < ?php echo $value['categoryName']; ?>
                                    </label>
                                </div>
                            < ? ưphp } ? >
                        -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="nam" value="50" name="category">
                            <label class="form-check-label" for="nam">Nam</label>
                            &emsp;
                            <input class="form-check-input" type="radio" id="nu" value="51" name="category">
                            <label class="form-check-label" for="nu">Nữ</label>
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputWeight" class="col-sm-2 col-form-label">Weight(Kg)</label>
                    <div class="col-sm-10">
                        <input type="text" name="weight" class="form-control" id="inputWeight" placeholder="Cân nặng">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputHeight" class="col-sm-2 col-form-label">Height(Cm)</label>
                    <div class="col-sm-10">
                        <input type="text" name="height" class="form-control" id="inputHeight" placeholder="Chiều cao">
                    </div>
                </div>
                <h5>Nội dung</h5>
                <p>
                    Loại: <span id="text-gender"></span>
                    &emsp; || &emsp;
                    Cân nặng: <span id="text-weight"></span>
                    &emsp; || &emsp;
                    Chiều cao: <span id="text-height"></span>
                </p>
                <span>Gợi ý size cho bạn:</span>
                <input type="text" id="suggest-size" name="filter-size">
                <div class="modal-footer">
                    <button type="button" id="btnClose-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Xem sản phẩm</button>
                    <!-- Trigger the Modal - kích hoạt modal (nhấn vào để kích hoạt) -->
                    <img id="myImg" src="./assets/img/bangsize.png" alt="Bảng Size" style="width:40px; border: solid 1px rgba(0, 0, 0, 0.6);">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- The Modal Image - modal ảnh size trong phần gợi ý -->
<div id="myModal" class="modalImg">

  <!-- The Close Button -->
  <span id="modalImg-close" class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modalImg-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
