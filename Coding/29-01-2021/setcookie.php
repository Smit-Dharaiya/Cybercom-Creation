<?php
//set cookie
setcookie('username','smit',time() + 60);

//unset cookie
setcookie('username','smit',time() - 60);
?>