<div class="col-lg-12">
	<div class="col-lg-3">
		<ul class="profile_sb">
			<li><a href="">Редактировать Порфиль</a></li>
			<li><a href="">Мои покупки</a></li>
			<li><a href="">Мои адреса</a></li>
		</ul>
	</div>
	<div class="col-lg-9">
		<form class="form-horizontal" role="form" method="post" action="<?=base_url("index.php/registracia/reg_user")?>" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputEmail3" placeholder="Имя" name="name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Фамилия</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputEmail3" placeholder="Фамилия" name="last_name">
		    </div>
		  </div>
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
		    <label for="inputPassword3" class="col-sm-2 control-label">Страна</label>
		    <div class="col-sm-10">
		    
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Выберите фото</label>
		    <div class="col-sm-10">
		      <input type="file" class="form-control" id="inputPassword3"  name="avatar">
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