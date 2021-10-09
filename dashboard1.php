<?php
require("user_auth.php");
echo "Hello<br>";
?>
<a href="dashboard.php">Dashboard</a><br/>
<a href="logout.php">Logout</a>

<script src="jquery-3.4.1.min.js"></script>
<script>
setInterval(function(){
	check_user();
},2000);

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
