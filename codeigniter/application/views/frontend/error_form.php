
				<!-- Login -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">Авторизация</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" role="form" method="post" action="<?=base_url("index.php/login/auth")?>">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Е-майл</label>
								    <div class="col-sm-10">
								      <input type="email" class="form-control" id="inputEmail3" placeholder="Е-майл" name="email">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
								    <div class="col-sm-10">
								      <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль" name="password">
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <div class="checkbox">
								        <label>
								          <input type="checkbox"> Запомнить
								        </label>
								      </div>
								    </div>
								  </div>
								  	<div class="modal-footer">
									  <div class="form_button">
									    <div class="col-sm-offset-2 ">
									      <button type="submit" class="btn btn-success">Войти</button>
									    </div>
									  </div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Login -->

				<!-- Registracia -->
				<div class="modal fade in" id="regs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">Регистрация</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" role="form" method="post" action="<?=base_url("index.php/registracia/reg_user")?>" enctype="multipart/form-data">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail3" placeholder="Имя" name="name" value="<?php echo set_value('name', '0'); ?>">
								      <?php echo form_error('name', '<div class="error">*', '</div>'); ?>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Фамилия</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail3" placeholder="Фамилия" name="last_name" value="<?php echo set_value('last_name', '0'); ?>">
								      <?php echo form_error('last_name', '<div class="error">*', '</div>'); ?>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Е-майл</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail3" placeholder="Е-майл" name="email" value="<?php echo set_value('email', '0'); ?>">
								      <?php echo form_error('email', '<div class="error">*', '</div>'); ?>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
								    <div class="col-sm-10">
								      <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль" name="password">
								      <?php echo form_error('password', '<div class="error">*', '</div>'); ?>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Повторите Пароль</label>
								    <div class="col-sm-10">
								      <input type="password" class="form-control" id="inputPassword3" placeholder="Повторите Пароль" name="r_password">
								      <?php echo form_error('r_password', '<div class="error">*', '</div>'); ?>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Выберите фото</label>
								    <div class="col-sm-10">
								      <input type="file" class="form-control" id="inputPassword3"  name="avatar">
								      <?php echo form_error('avatar', '<div class="error">*', '</div>'); ?>
								    </div>
								  </div>
									<div class="modal-footer">
									  <div class="form_button">
									    <div class="col-sm-offset-2 ">
									      <button type="submit" class="btn btn-success">Регистрация</button>
									    </div>
									  </div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			<!-- End Registracia -->

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
	<div class="modal-backdrop fade in"></div>
	<script type="text/javascript">
		$(".close").click(function(){
			$("#regs").fadeOut("fast",function(){
				$(".modal-backdrop").fadeOut();
			});	
		})
	</script>
</div>
