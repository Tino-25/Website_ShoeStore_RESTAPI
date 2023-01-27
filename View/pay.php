<?php foreach($user as $key => $value) { ?>
    <div id="body_pay">
        <div class="container">
            <form method="POST" action="?act=order&idUser=<?=$value['idUser']?>" id="formSave__Order">
                <div class="row">
                    <div class="col-6">
                        <div class="body-content">
                            <div class="body-content__top">
                                <h2>Thông tin thanh toán</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">First name</label>
                                    <input type="firstname" class="form-control" id="firstname"
                                    placeholder="First name" value="<?=$value['firstName']?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Last name</label>
                                    <input type="text" class="form-control" id="lastname"
                                    placeholder="Last name" value="<?=$value['lastName']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress"
                                placeholder="Nhập địa chỉ" value="<?=$value['address']?>">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="sex">Sex</label>
                                    <input type="text" class="form-control" id="sex" value="<?=$value['sex']?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" value="<?=$value['email']?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" value="<?=$value['phone']?>">
                                </div>
                            </div>
                            <button class="form__btn" id="btnSave__order" type="submit" class="btn btn-primary">Gửi</button>

                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-5">
                        <div class="body-content__top">
                            <h2>Thông tin thanh toán</h2>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php foreach ($_SESSION["cart_item"] as $item){ ?>
                                    <!-- data to send action form -->
                                    <input type="hidden" name="idUser" value="<?=$value['idUser']?>">
                                    <input type="hidden" name="idProduct" value="<?=$item['idProduct']?>">
                                    <input type="hidden" name="quantityOrder" value="<?=$item['quantity']?>">
                                    <tr>
                                        <td>
                                            <?php echo $item["productName"]." x ".$item["quantity"]; ?>    
                                        </td>
                                        <td>
                                            <?php
                                            $total += $item["quantity"] * $item["productUnitPrice"]; 
                                            echo $item["quantity"] * $item["productUnitPrice"]; 
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Tổng đơn hàng</td>
                                    <td><?=$total;?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php } ?>