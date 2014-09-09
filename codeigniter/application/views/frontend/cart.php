
<div class="col-lg-12">
	<div class="bs-example">
<?php
	if(!empty($this->session->userdata["cart_product"]) && isset($this->session->userdata["cart_product"])){
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Img</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
<?php
		$products = explode(",",$this->session->userdata["cart_product"]);
		foreach ($products as $key => $value) {
			$query = $this->db->select("*")->from("products")->where("id",$value)->get();
			$result = $query->result();
			$id = $result[0]->id;
			$title = $result[0]->title;
			$description = $result[0]->description;
			$price = $result[0]->price;
			$img = $result[0]->img;
?>
            <tr id="products_<?=$id?>">
                <td><?=$id?></td>
                <td><?=$title?></td>
                <td><?=$description?></td>
                <td><?=$price?></td>
                <td><img src="<?=base_url("assets/img/product_img/")."/".$img?>" alt="<?=$title?>" title="<?=$title?>" style="width: 75px;"/></td>
                <td><p class="btn btn-danger btn-circle delete_products_site" id="<?=$id?>"><i class="fa fa-times"></i></p></td>
            </tr>
<?php
		}
	}else{
		echo 'Ваша корзина пуста';
	}
?>
        </tbody>
    </table>
	</div>
</div>