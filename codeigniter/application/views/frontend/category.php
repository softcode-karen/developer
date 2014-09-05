
<div class="col-lg-">
	<?php 
		foreach ($products as $key => $value) {
	?>
	<div class="span3">
		<img src="<?=base_url("assets/img/product_img")."/".$value->img?>" class="img-polaroid" alt="<?=$value->title?>" title="<?=$value->title?>">
		<p class="description"><?=$value->description?></p>
		<p class="price">Цена`<?=$value->price?>руб.</p>
	</div>
	<?php
		}
	?>
	<div class="col-lg-12"><?=$pagination;?></div>
</div>