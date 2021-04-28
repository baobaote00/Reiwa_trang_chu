<?php
$data = setPost();
$page = $data['page'];
$list = $data['list'];
$perPage = $data['perPage'];
$totalRow = $data['totalRow'];
getHeader();
?>
<div class="container-custom full_spmain">
    <!-- title -->
    <div class="uppercaseText" style="margin-bottom: 25px; text-align: center; text-transform: uppercase; font-weight: bold;">
        <h3><?php switch ($_GET['type']) {
                case 'du_an':
                    echo 'Dự Án';
                    break;
                case 'tin_tuc':
                    echo 'Tin Tức';
                    break;
                case 'search':
                    echo 'Tìm kiếm';
                    break;
            } ?></h3>
    </div>
    <div class="mg-15 row" style="margin-left: 160px;">
        <?php
        foreach ($list as $item) {
            if (!empty($item['final_time'])) {
                if ($item['id_classify'] == 6) {
                    $url = URL_PAGE_MAU_THIET_KE;
                } else {
                    $url = URL_PAGE_DAU_AN_CONG_TRINH;
                }
            } else {
                if ($item['id_classify'] == 1) {
                    $url = URL_PAGE_TIN_TUC;
                } else {
                    $url = URL_PAGE_DU_AN;
                }
            }
        ?>
            <div class="col-md-6 col-sm-12 col-xs-12 pd-15" style="margin-bottom: 25px;">
                <div class="box_news">
                    <div class="mg-10 row">
                        <div class="fix_img col-md-5 col-sm-5 col-xs-4 pd-10">
                            <div class="img_tt_tt"><a href="<?php echo $url . '&id=' . $item['id'] ?>" title="<?php echo $item['name'] ?>">
                                    <img src="<?php if (empty($item['photo'])) {
                                                    echo DEFAULT_IMG;
                                                } else {
                                                    echo $item['photo'];
                                                } ?>" alt="<?php echo $item['name'] ?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-8 pd-10">
                            <div class="ten_tt_tt"><a href="<?php echo $url . '&id=' . $item['id'] ?>">
                                    <?php echo $item['name'] ?>
                                </a>
                            </div>
                            <div class="tieude_tt_tt">Ngày đăng - <?php echo $item['date'] ?>
                            </div>
                            <div class="mota_tt_tt">
                                <?php
                                $str = strip_tags($item['description']);
                                if (strlen($str) > 100) {
                                    $str = substr($str, 0, 100) . '...';
                                }
                                echo $str; ?>
                            </div>
                        </div>
                    </div>
                    <div class="clear"> </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <?php
    if ($totalRow > $perPage) {
        echo Pagination::createPageLink($totalRow, $perPage, $page);
    }
    ?>
</div>
<?php
getFooter();
?>