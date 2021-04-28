<?php
$content2 = setContent2();
?>
<div class="container info-mg">
    <div class="row">
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9" style="margin-top: 20px;">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K3sSCMoTaK8" allow="autoplay;" allowfullscreen=""></iframe>
            </div>
        </div>
        <div class="col-md-6" style="margin-top: 20px;">
            <h1><?php echo $content2['name'] ?></h1>
            <div style="border-left: 4px solid; border-color: #1a75bc;  padding-left: 20px; margin-top: 20px;">
                <span>
                    <p><?php $str = strip_tags($content2['description']);
                            $str = substr($str, 0, 333) . '...';
                            echo $str; ?></p>
                </span>
            </div>
        </div>
    </div>

</div>