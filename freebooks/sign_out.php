<?php

 setcookie('username','',(time()+2592000),'/','',0);
 setcookie('id_hash','',(time()+2592000),'/','',0);
 setcookie('id_web','',(time()+2592000),'/','',0);
header("Location: index.php");
?>