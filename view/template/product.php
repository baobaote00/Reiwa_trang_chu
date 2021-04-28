<?php
$data = setProduct();
$page = $data['page'];
$list = $data['list'];
$perPage = $data['perPage'];
getHeader();
?>

<div class="container-custom full_spmain">
	<!-- Tieu De -->
	<?php
	foreach ($list as $value) {
		if (empty($value['list'])) {
			continue;
		}
		if (!empty($_GET['id'])) {
			if ($_GET['id'] != $value['id']) {
				continue;
			}
		}
		$productList = $value['list'];
		$totalRow = $value['totalRow'];
	?>

		<div style="margin-top: 25px; margin-bottom: 25px;">
			<div class="uppercaseText" style="margin-bottom: 25px; text-align: center; text-transform: uppercase; font-weight: bold;">
				<h3><?php echo $value['name'] ?></h3>
			</div>
			<div class="mg-15 row">
				<!--San Pham-->

				<?php
				$i = 0;
				foreach ($productList as $item) {
					if (empty($_GET['id'])) {
						if ($i == 4) {
							break;
						}
					}
					$i++;
				?>

					<div class="col-md-3 pd-15">
						<div class="product-item">
							<div class="border-item">
								<div class="hover-item">
									<a href="<?php echo URL_PAGE . $_GET['type'] .  '&id=' . $item['id'] ?>" title="<?php echo $item['name'] ?>">
										<img style="max-width: 100%;" src="<?php if (empty($item['photo'])) {
																				echo DEFAULT_IMG;
																			} else {
																				echo $item['photo'];
																			} ?>" alt="<?php echo $item['name'] ?>">
									</a>
								</div>
							</div>
							<div class="ten_sptc">
								<a href="<?php echo URL_PAGE . $_GET['type'] .  '&id=' . $item['id']  ?>" title="<?php echo $item['name'] ?>">
									<?php echo $item['name'] ?>
								</a>
							</div>
							<div class="nd_sptc bg_w">
								<div class="ten_sptc"><?php
														$str = strip_tags($item['description']);
														if (strlen($str) > 100) {
															$str = substr($str, 0, 100) . '...';
														}
														echo $str; ?>
								</div>

							</div>

						</div>

					</div>

				<?php } ?>

			</div>
		</div>
		<?php
		if (empty($_GET['id'])) {
		?>

			<div class="btn-more-product2"><a href="<?php echo URL_PRODUCT . $_GET['type'] . '&id=' . $value['id'] ?>" style="padding-left: 20px; padding-right: 20px; padding-bottom: 5px;padding-top: 5px; background: #1a75bc
            ; color: white;">Xem
					thêm</a>
			</div>
	<?php
		}
	}
	?>
	<?php
	if (!empty($_GET['id'])) {
		if ($totalRow >= $perPage) {
			echo Pagination::createPageLink($totalRow, $perPage, $page);
		}
	}
	getFooter();
	?>