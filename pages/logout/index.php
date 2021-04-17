<?php
setcookie("email", null, time()-1200,"/");
setcookie("pass", null, time()-1200,"/");
header('location: ../../' );
 ?>