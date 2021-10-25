<?php
	// include logout count page
	require("user_auth.php");
	echo "Hello<br>";
?>
<a href="dashboard1.php">Dashboard1</a><br/>
<a href="logout.php">Logout</a>

<script src="jquery-3.4.1.min.js"></script>
<script>
	// function to hit page every 2sec
	setInterval(function(){
		check_user();
	},2000);
	// function to logout
	function check_user(){
		jQuery.ajax({
			url:'user_auth.php',
			type:'post',
			data:'type=ajax',
			success:function(result){
				if(result=='logout'){
					window.location.href='logout.php';
				}
			}
		});
	}
</script>
