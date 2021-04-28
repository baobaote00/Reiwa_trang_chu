<?php
$page = setPage();
if($page['id_classify']==1 || $page['id_classify']==2 || $page['id_classify']==3|| $page['id_classify']==4|| $page['id_classify']==5|| $page['id_classify']==9){
    Model::updatePostView($page['id'],$page['view_count']+1);
}
else{
    Model::updateProductView($page['id'],$page['view']+1);
}
getHeader();
?>
<div id="content" class="full_width posts">
    <div class="container detail_post">
        <div class="row fix-safari">
            <div class="col-xs-12 col-md-8 col-lg-9">
                <article class="box_content read bg_white m-t-12">
                    <header class="title col-xs-12">
                        <div class="title_right">
                            <div class="title_center">
                                <span class="uppercaseText" style="font-weight: bold; text-transform: uppercase;"><?php echo $page['name'] ?></span>
                            </div> <!--  end .title_center -->
                        </div> <!--  end .title_right -->
                    </header> <!--  end .title -->
                    <div class="des col-xs-12 text-justify" style="margin-top: 20px;">
                        <!-- content -->
                        <?php echo $page['description'] ?>
                    </div> <!--  end .des -->
                    <?php
                    getRelate();
                    ?>
                </article> <!--  end .box_content -->
            </div>
            <?php
            getBar();
            ?>
        </div>
    </div> <!--  end .container -->
</div>
<?php
getFooter();
?>