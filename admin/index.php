<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css -->
    <link rel="stylesheet" href="../assets/css/admin/base.css">
    <link rel="stylesheet" href="../assets/css/admin/main.css">
    <title>Admin</title>

</head>

<body>
    <div class="admin_main">
        <div class="grid_row">
            <div class="admin_left">
                <a href="../">
                    <div class="left_head">
                        <img src="../assets/img/logo_giaphat.jpg" alt="">
                        <div class="left_head__text">
                            <span>MY FASHION</span>
                            <p>Cửa hàng thời trang </p>
                        </div>
                    </div>
                </a>
                <div class="left_body">
                    <ul class="nav-list">
                        <li class="nav-list__item">
                            <a href="?mod=dashboard">
                                Dashboard
                            </a>
                            <i class="fas fa-caret-right"></i>
                        </li>
                        <li class="nav-list__item" id="btn-user">
                            <a href="?mod=user&act=list">
                                Quản lý người dùng
                            </a>
                            <i class="fas fa-caret-right"></i>
                        </li>
                        <li class="nav-list__item">
                            <a href="?mod=banner&act=list">
                                Quản lý banner
                            </a>
                            <i class="fas fa-caret-right"></i>
                        </li>
                        <li class="nav-list__item">
                            <a href="?mod=brand&act=list">
                                Quản lý brand
                            </a>
                            <i class="fas fa-caret-right"></i>
                        </li>
                        <li class="nav-list__item">
                            <a href="?mod=category&act=list">
                                Quản lý loại sản phẩm
                            </a>
                            <i class="fas fa-caret-right"></i>
                        </li>
                        <li class="nav-list__item">
                            <a href="?mod=product&act=list">
                                Quản lý sản phẩm
                            </a>
                            <i class="fas fa-caret-right"></i>
                        </li>
                        <li class="nav-list__item">
                            <a href="?mod=order&act=list">
                                Quản lý đơn hàng
                            </a>
                            <i class="fas fa-caret-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="admin_right">
                <div class="right_head">
                    <i class="far fa-bell right_head--icon-bell"></i>
                    <div class="right_head__content">
                        <img src="../assets/img/logo_giaphat.jpg" alt="">
                        <h6>
                            <?php
                            if(isset($_SESSION['userName']) && $_SESSION['userName']!=null){
                                echo $_SESSION['userName'];
                                echo "<a href='../logout.php'>Logout</a>";
                            }else{
                                echo "Unidentified";
                            }
                            ?>
                        </h6>
                    </div>
                </div>
                <!-- Nội dung thay đổi ở đây -->
                <div class="right_body">


                	<?php 
                    if(isset($_SESSION['userName']) && $_SESSION['userName']!=null){
                        require "dieuhuong.php"; 
                    }else{
                        echo "Bạn chưa login";
                        echo " => ";
                        echo "<a href='../login.php'>login</a>";
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>

    <div id="error-message" class="messages"></div>
    <div id="success-message" class="messages"></div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>



    <!-- Jquery -->
    <script src="../assets/js/jquery/jquery.js"></script>
    <!-- JS -->
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/admin/main.js"></script>
    <script src="../assets/js/admin/user.js"></script>
    <script src="../assets/js/admin/banner.js"></script>
    <script src="../assets/js/admin/brand.js"></script>
    <script src="../assets/js/admin/category.js"></script>
    <script src="../assets/js/admin/product.js"></script>
    <script src="../assets/js/admin/order.js"></script>


</body>

</html>