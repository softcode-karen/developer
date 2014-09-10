	<!-- This is site Footer -->
		<div class="col-lg-12 footer nopadding_margin">
			<div class="col-lg-5  nopadding_margin">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3047.092475103742!2d44.51837385!3d40.20700585!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abd3435009b43%3A0xe911056ae83c5980!2zNTEgS29taXRhcyBBdmUsIFllcmV2YW4gMDAxNCwg0JDRgNC80LXQvdC40Y8!5e0!3m2!1sru!2sru!4v1409927467916" width="487" height="205" frameborder="0" style="border:0"></iframe>
			</div>
			<div class="col-lg-5  nopadding_margin pull-right">
				<div id="fb-root"></div>

				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

				<div class="fb-like" data-href="https://www.facebook.com/LiLitHovhannisyanOfficial?fref=nf" data-width="200" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
			</div>
		</div>
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
				$.ajax({
					type:"POST",
					url:"<?=base_url('index.php/cart/add_cart')?>" + "/" + id_product,
					success: function(num){
						if(num == 1){
							var count_vw = parseInt($(".cart_count").html())+1;
							$(".cart_count").html(count_vw);
						}else{
							$(".pr_pop_p").html("Ara 4em jogum qez dzym sayt@ vari tal!!!");
						}
						$(".br_pop").click().delay(2500).queue(function(){
							if($(".bs-example-modal-sm").css("display") !== "none"){
								$(this).click();
							}
						});
						//console.log(num);
						$(this).dequeue();
					}
				});
			});
			$(".pop_error").click(function(){
				$(".login").click();
				$(".form-group .error_cart label").html("<p class='error'>*Пожалуйста войдите чтобы продолжить</p>");
				
			});
			$(".delete_products_site").click(function(){
				var id = $(this).attr("id");
				$.ajax({
					type:"POST",
					url:"<?=base_url('index.php/cart/delete_product')?>" + "/" + id,
					success: function(a){
						alert(a);
                        $("#products_"+id).fadeOut();
						var count_vw = parseInt($(".cart_count").html())-1;
						$(".cart_count").html(count_vw);
					}
				});
			});
		</script>
	<!-- /This is site Footer -->
	</div>
	</body>
</html>