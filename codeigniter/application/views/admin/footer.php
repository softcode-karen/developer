	    <!-- jQuery Version 1.11.0 -->
	    <script src="<?=base_url("assets/js/jquery-1.11.0.js")?>"></script>
	    <!-- Bootstrap Core JavaScript -->
	    <script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
	    <!-- Metis Menu Plugin JavaScript -->
	    <script src="<?=base_url("assets/js/plugins/metisMenu/metisMenu.min.js")?>"></script>
	    <!-- Custom Theme JavaScript -->
	    <script src="<?=base_url("assets/js/sb-admin-2.js")?>"></script>
	    <!-- Delete Menu Ajax -->
        <script type="text/javascript">
            $(".delete_menu").click(function(){
                var id = $(this).attr("id");
                $.ajax({
                	type:"POST",
                	url:"<?=base_url('index.php/admin/menu/delete')?>"+"/"+id,
                	success:function(html){
                		$("#menu_"+id).fadeOut();
                	}
                });
            });
        </script>
	</body>
</html>