<?php

if (isset($_COOKIE['Boba_Tea_Bargainer'])){
	echo '<p class="text-center">Welcome Back, ';
	echo $_COOKIE["Boba_Tea_Bargainer"];
	echo '!</p>';
// 	<!-- attempting to write Welcome Back + their name from the cookie -->
}
else{
	echo "<p class = 'text-center'>Please fill out the information and we'll get back to you as soon as possible!</p>";
//      <!-- just give them the generic 'give us comments' response -->
}
?>