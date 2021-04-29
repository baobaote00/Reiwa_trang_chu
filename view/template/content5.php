<?php
$content5 = setContent5();
?>
<div class="bg-user" style="height: 40%">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row" style="margin-right: 20px; margin-top: 10px;">
                    <span class="text-style-2">
                        <?php echo $content5 ?></span>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <span class="text-style-2 bottom-mg">Chúng tôi Đã làm Hài lòng <b style="font-size: 20pt;">500+</b> Khách Hàng.Hãy liên
                        hệ chúng tôi để được tư
                        vấn!</span><br>
                    <form action="?action=sendmail" method="post">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <input id="name" name="name" type="text" class="form-control is-valid" id="validationServer013" placeholder="Họ tên" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input id="phone" name="phone" type="text" class="form-control is-valid" id="validationServer023" placeholder="Số điện thoại" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="input-group">
                                    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">

                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="width: 100%;">
                            <input id="content" name="content" type="text" class="form-control is-valid" id="validationServerUsername33" placeholder="Nội dung" aria-describedby="inputGroupPrepend33" required="">
                        </div>
                        <div class="btn-more-product2 btn-trapanes">
                            <div onclick="getMailCustomer()" style="padding-left: 20px; padding-right: 20px; padding-bottom: 5px;padding-top: 5px; background: #1a75bc; color: white;">Gửi</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>