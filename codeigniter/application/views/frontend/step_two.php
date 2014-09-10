<?php
	$products = explode(",",$this->session->userdata["cart_product"]);
	foreach ($products as $key => $value) {
		$query = $this->db->select("*")->from("products")->where("id",$value)->get();
		$result = $query->result();
		$price = $result[0]->price;
		if(@$all_price == $price ){
			$all_price = $price;
		}else{
			@$all_price += $price;
		}
	}
	$all_price = $all_price +150;
?>
<div class="col-lg-10 nopadding_margin">
	<form class="form-horizontal" role="form" method="post" action="">
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">*Доставка</label>
	    <div class="col-sm-3">
        	<select class="form-control dostavka" name="dostavka">
				<option value="150">По почте</option>
				<option value="220">Курьером</option>
				<option value="500">Экспресс</option>
			</select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">*Имя и фамилия</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" placeholder="Имя и фамилия" name="full_name" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">*Адрес</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" placeholder="Адрес" name="address" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">*Индекс</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputPassword3" placeholder="Индекс" name="indeks" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">*Телефон</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputPassword3" placeholder="Телефон" name="number" required>
	    </div>
	    <input type="submit" id="order_fn" style="display:none;" >
	  </div>
	</form>
</div>
<div class="col-lg-2 obsh_pr">
	<p>Тип доставки`<span class="delevery">По почте</span></p>
	<p>Цена доставки`<span class="delevery_pice">150</span> руб.</p>
	<p>Общая сумма`<span class="all_pice"><?=$all_price?></span> руб.</p>
</div>
<div class="col-lg-2 sted_tw nopadding_margin">
	<?php
		if(!empty($this->session->userdata["0"])){
			echo '<a class="btn btn-warning order_fn">Купить</a>';
		}else{
			echo '<a class="btn btn-warning pop_error" >Купить</a>';
		}
	?>
</div>
<script type="text/javascript">
	$(".dostavka").change(function(){
		var price = parseInt($(this).val());
		var all = parseInt($(".all_pice").html()) + price;
		if(price == 150){
			$(".delevery").html("По почте");
			$(".delevery_pice").html("150");
		}else if(price == 220){
			$(".delevery").html("Курьером");
			$(".delevery_pice").html("220");
		}else if(price == 500){
			$(".delevery").html("Экспресс");
			$(".delevery_pice").html("500");
		}
		$(".all_pice").html(all);
	});
	$(".order_fn").click(function(){
		$("#order_fn").click();
	});
</script>