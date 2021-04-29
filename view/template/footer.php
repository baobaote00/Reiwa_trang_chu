<style>
    .col-footer {
        padding-bottom: 20px;
    }
</style>
<?php
$contactModel = new ContactModel();
$contact = $contactModel->getContact();
?>
<!-- Bottom -->
<div class="bg-bottom" style="margin-top: 50px; padding: 50px; height: 40%;">
    <div class="container-custom">

        <div class="row">
            <div class="col-sm-3 col-footer">
                <div><a class="navbar-brand" href="#">
                        <img src="./public/images/Logo2.svg" alt="logo" width="150x" height="100px" class="img-fluid" style="margin-top: 15px;"></a>
                </div>

            </div>
            <div class="col-md-3 col-footer">

                <span class="text-style-3"><i class="fas fa-home"></i>:<?php echo $contact[5]['link'] ?></span><br>
                <span class="text-style-3"><i class="fas fa-phone"></i>:Hotline: <?php echo $contact[4]['link'] ?></span><br>

            </div>
            <div class="col-md-3 text-style-3 col-footer">
                <h5><a href="<?php echo URL_CHINH_SACH_BAO_HANH ?>" style="color: white;">CHÍNH SÁCH BẢO HÀNH</a></h5>
                <ul>

                </ul>
            </div>
            <div class="col-sm-3 text-style-3 col-footer">
                <h5>FANPAGE</h5>
            </div>

        </div>
    </div>
</div>
<script src="./public/js/myjs/index.js"></script>
</body>

</html>