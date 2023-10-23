<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}
function redirect($link){
	?>
	<script>
	window.location.href='<?php echo $link ?>';
	</script>
 <?php
	die();
}
  function get_safe_value($str){
		global $con;
		$str= mysqli_real_escape_string($con,$str);
		return $str;
		}

		function isAdmin(){
			if(!isset($_SESSION['IS_LOGIN'])){
				?>
				<script>
					window.location.href='login.php';
				</script>
			<?php
			}
			if($_SESSION['ADMIN_ROLE']==1){
				?>
          <script>
            window.location.href='dress.php';
          </script>
				<?php

			}
		}



?>