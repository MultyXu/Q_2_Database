<?php
setcookie("Dept","2",time()+60*60*24,"/"); // cookie expires in 1 day, "/" means that the cookie is available for the whole server
echo "cookies set as dept 2 ";

if(count($_COOKIE) > 0) {
    echo $_COOKIE["Dept"]. " enable";
} else {
    echo "disabled";
}

?>