<?php
//Database connection.
$conn = MySQLi_connect(
   "if0_40040294_gndpolyo_web", //Server host name.
   // "162.241.218.223", //Server host name.
   "if0_40040294", //Database username.
   // "gndpolyo_admin", //Database username.
   "Gagan123Shah", //Database password.
   // "qwerty@1234", //Database password.
   "if0_40040294_gndpolyo_web" //Database name or anything you would like to call it.
);
//Check connection
if (MySQLi_connect_errno()) {
   echo "Failed to connect to MySQL: " . MySQLi_connect_error();
}
