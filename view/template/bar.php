<?php
$bar = setBar();
?>
<div class="col-xs-12 col-md-4 col-lg-3">
    <!-- Sidebar -->
    <aside class="box sidebar s_post list_post m-b-15 clearfix">
        <div class="p-l-10 p-r-10">
            <!-- title -->
            <div class="block-title">
                <h3 class="title_text primary-color text-uppercase" style="text-align: center; margin-bottom:20px; font-weight: bold;">Bài Liên Quan</h3>
            </div>
            <hr>

            <!-- row -->
            <div class="inner">
                <?php
                foreach ($bar as $value) {
                    if(empty($value['final_time']))
                    {
                        if($value['id_classify'] == 6){
                            $url = URL_PAGE_MAU_THIET_KE;
                        }
                        else{
                            $url = URL_PAGE_DAU_AN_CONG_TRINH;
                        }
                    }
                    else{
                        if($value['id_classify'] == 1){
                            $url = URL_PAGE_TIN_TUC;
                        }
                        else{
                            $url = URL_PAGE_DU_AN;
                        }
                    }
                ?>
                    <div class="pull-left">
                        <a href="<?php echo $url.'&id='.$value['id'] ?>" title="<?php echo $value['name'] ?>" target="_self" class="">
                        <img src="<?php if (empty($value['photo'])) {
                                                    echo DEFAULT_IMG;
                                                } else {
                                                    echo $value['photo'];
                                                } ?>"  width="100%" height="200px" class="pull-left m-r-15">
                        </a>
                        <a href="<?php echo $url.'&id='.$value['id'] ?>" title="<?php echo $value['name'] ?>" target="_self" class="name font-bold"><?php echo $value['name'] ?></a>
                        <p class="sumary"><?php
											$str = strip_tags($value['description']);
											$str = substr($str, 0, 100) . '...';
											echo $str; ?>	</p>
                        <hr>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </aside> <!--  end .box -->
</div>
</aside> <!--  end .box -