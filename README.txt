step 1 cmd cd c:\xampp\mysql\bin
step 2 c:\xampp\mysql\bin>mysql -u root
step 3 MariaDB>create database estore; 
step 4 MariaDB>grant all on estore.* to 'estore@'localhost' identified by 'password';
step 5 change $DB_FIRST_ADMIN_ONLY=FALSE;  => TRUE; in sources/lib/config.php
<?php
$DB_FIRST_ADMIN_ONLY=FALSE;
$DBHOST='localhost';
$DBNAME=estore;
$DBUSER='estore;
$DBPASS='password';
$EMAIL='lsa@emich.edu’;
?>
step 6 http://localhost/admin.php initiate database, populate three tables: users , messages and profiles.
step 7 change $DB_FIRST_ADMIN_ONLY=TRUE;  =>FALSE ; in lib/config.php
step 8 http://localhost/index.php
