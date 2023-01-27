
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap để dùng slide show => 3 cái dưới -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="assets/css/client/base.css">
    <link rel="stylesheet" href="assets/css/client/main.css">
    <link rel="stylesheet" href="assets/css/client/cuahang.css">
    <link rel="stylesheet" href="assets/css/client/chitietsp.css">
    <link rel="stylesheet" href="assets/css/client/cart.css">
    <link rel="stylesheet" href="assets/css/client/pay.css">
    <link rel="stylesheet" href="assets/css/client/introduction.css">
    <!-- themify icons -->
    <!-- <link rel="stylesheet" href="assets/themify-icons/themify-icons.css"> -->
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Fashion</title>
</head>

<body>

    <?php 
    require "View/includes/header.php";
    ?>


    <?php
    require "dieuhuong.php"; 
    ?>


    <?php 
    require "View/includes/footer.php";
    ?>



<!-- bootstrap -->
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
<script src="assets/js/jquery/jquery.js"></script>
<!-- javascript -->
<script src="assets/js/common.js"></script>
<script src="assets/js/web/main.js"></script>
<script src="assets/js/web/pay.js"></script>
</body>

</html>