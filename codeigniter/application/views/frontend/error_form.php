<!DOCTYPE html>
<html>
	<head>
		<title>Online Shop</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/bootstrap.min.css")?>">
		<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/bootstrap-responsive.css")?>">
		<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/style.css")?>">
	</head>
	<body>
		<?php
			//out($this->session->userdata("0"));
			// $ch = curl_init();
			// $curlConfig = array(
			//     CURLOPT_URL            => "http://look.am/",
			//     CURLOPT_POST           => true,
			//     CURLOPT_RETURNTRANSFER => true,
			//     CURLOPT_POSTFIELDS     => array(
			//         'field1' => 'some date',
			//         'field2' => 'some other data',
			//     )
			// );
			// curl_setopt_array($ch, $curlConfig);
			// $result = curl_exec($ch);
			// curl_close($ch);
			// echo $result;die;
			if(isset($_GET["error"])){
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>Неправильный логин или пароль</strong>
		</div>
		<?php
			}
		?>
		<div class="container col-lg-">
			<div class="header ">
				<ul class="col-lg-10">
					<li><a href="<?=base_url("index.php/home")?>" class="btn btn-info">Главная</a></li>
				<?php
					foreach ($query as $key => $value) {
						echo '<li><a href="'.base_url("index.php/category/index")."/".$value->id.'" class="btn btn-info">'.$value->title.'</a></li>';
					}
				?>
				</ul>
				<?php
					if(empty($this->session->userdata("0"))){
				?>			
				<div class="form col-lg-2">
					<p class="btn btn-primary btn-lg login" data-toggle="modal" data-target="#myModal">Войти</p>
					<p type="submit" class="btn btn-success reg_bt" data-toggle="modal" data-target="#reg">Регистрация</p>
				</div>
				<?php
					}else{
						$full_name = $this->session->userdata("0")->name . " " . $this->session->userdata("0")->last_name;
						if(isset($this->session->userdata("0")->fb_id)){
							$img = "https://graph.facebook.com/".$this->session->userdata("0")->fb_id."/picture";
						}else{
							$img = base_url("assets/img/users_img/".$this->session->userdata("0")->img);
						}
						$logout = base_url("index.php/logout");
				?>			
				<div class="form col-lg-2">
					<img src="<?=$img?>" alt="<?=$full_name?>" title="<?=$full_name?>" class="avatar"/>
					<p><?=$full_name?></p>
					<a href="<?=$logout?>" >Выход</a>
				</div>
				<?php
					}
				?>		
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
				<div class="modal fade in" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;">
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
			</div>

<div class="col-lg-">
	<div class="span3">
		<img src="<?=base_url("assets/img/product_img/3886m.jpg")?>" class="img-polaroid">
		<p class="description">Как приучать ребенка к взрослой жизни,
		 не превращая обучение в нудную процедуру,
		  а используя для этого игровую деятельность? 
		  Совместить приятное с полезным достаточно легко, 
		  если сама игрушка будет носить прикладной характер.
	 	</p>
		<p class="price">Цена`1500руб.</p>
	</div>
	<div class="span3">
		<img src="<?=base_url("assets/img/product_img/3886m.jpg")?>" class="img-polaroid">
		<p class="description">Как приучать ребенка к взрослой жизни,
		 не превращая обучение в нудную процедуру,
		  а используя для этого игровую деятельность? 
		  Совместить приятное с полезным достаточно легко, 
		  если сама игрушка будет носить прикладной характер.
	 	</p>
		<p class="price">Цена`1500руб.</p>
	</div>
	<div class="span3">
		<img src="<?=base_url("assets/img/product_img/3886m.jpg")?>" class="img-polaroid">
		<p class="description">Как приучать ребенка к взрослой жизни,
		 не превращая обучение в нудную процедуру,
		  а используя для этого игровую деятельность? 
		  Совместить приятное с полезным достаточно легко, 
		  если сама игрушка будет носить прикладной характер.
	 	</p>
		<p class="price">Цена`1500руб.</p>
	</div>
	<div class="span3">
		<img src="<?=base_url("assets/img/product_img/3886m.jpg")?>" class="img-polaroid">
		<p class="description">Как приучать ребенка к взрослой жизни,
		 не превращая обучение в нудную процедуру,
		  а используя для этого игровую деятельность? 
		  Совместить приятное с полезным достаточно легко, 
		  если сама игрушка будет носить прикладной характер.
	 	</p>
		<p class="price">Цена`1500руб.</p>
	</div>
	<div class="span3">
		<img src="<?=base_url("assets/img/product_img/3886m.jpg")?>" class="img-polaroid">
		<p class="description">Как приучать ребенка к взрослой жизни,
		 не превращая обучение в нудную процедуру,
		  а используя для этого игровую деятельность? 
		  Совместить приятное с полезным достаточно легко, 
		  если сама игрушка будет носить прикладной характер.
	 	</p>
		<p class="price">Цена`1500руб.</p>
	</div>
	<div class="span3">
		<img src="<?=base_url("assets/img/product_img/3886m.jpg")?>" class="img-polaroid">
		<p class="description">Как приучать ребенка к взрослой жизни,
		 не превращая обучение в нудную процедуру,
		  а используя для этого игровую деятельность? 
		  Совместить приятное с полезным достаточно легко, 
		  если сама игрушка будет носить прикладной характер.
	 	</p>
		<p class="price">Цена`1500руб.</p>
	</div>
</div>
		</div>
		<script type="text/javascript" src="<?=base_url("assets/js/jquery-1.11.0.js")?>"></script>
		<script type="text/javascript" src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
		<script type="text/javascript">
		$(".close").click(function(){
			$("#reg").fadeOut("fast",function(){
				$(".modal-backdrop").fadeOut();
			});	
		})
		</script>
		<div class="modal-backdrop fade in"></div>
	</body>
</html>