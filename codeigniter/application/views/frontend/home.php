
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
	<script type="text/javascript">
		$(".buy_pr").hover(function(){
			$(this).stop().animate({"max-width":"100%"},1500,function(){
				$(this).find(".pr_active").fadeOut("fast",function(){
					$(this).parent().find(".pr_disamble").fadeIn("fast");
				})
			});
		},function(){
			$(this).find(".pr_disamble").fadeOut("fast",function(){
				$(this).parent().find(".pr_active").fadeIn("fast",function(){
					$(this).parent().stop().animate({"max-width":"25%"},1500);
				});
			})
		});
		$(".pr_bb").click(function(){
			var id_product = $(this).attr("id");
			$(".br_pop").click().delay(1000).queue(function(){
				$(this).click();
			});
		});
	</script>
</div>
