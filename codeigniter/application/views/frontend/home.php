
<!-- Small modal -->
<button class="btn btn-primary br_pop" data-toggle="modal" data-target=".bs-example-modal-sm" style="display:none;"></button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <p class="pr_pop_p">Товар добавлен в вашу корзину</p> 
    </div>
  </div>
</div>
<!-- /Small modal -->
<div class="col-lg-">
	<?php 
		foreach ($products as $key => $value) {
	?>
	<div class="span3">
		<div class="pr_bb" id="<?=$value->id?>">
			<span class="buy_pr col-lg-12">
				<p class="pr_disamble">Купить`<?=$value->title?> <i class="fa fa-rub"></i><?=$value->price?></p>
				<p class="pr_active"><i class="fa fa-rub"></i><?=$value->price?></p>
			</span>
		</div>
		<img src="<?=base_url("assets/img/product_img")."/".$value->img?>" class="img-polaroid" alt="<?=$value->title?>" title="<?=$value->title?>">
		<p class="description"><?=$value->description?></p>
		<p class="price">Цена`<?=$value->price?>руб.</p>
	</div>
	<?php
		}
	?>
	<div class="col-lg-12"><?=$pagination;?></div>
</div>
