<!-- port 80 is the default browser port
apache host in linux vm while sql in mac
need an user with % all machine host access
netstat -tlnp -port:3306
mysql -u root -p
select host, user from mysql.user;
CREATE USER 'space'@'%' IDENTIFIED BY 'space';
GRANT ALL PRIVILEGES ON *.* TO 'space'@'%' WITH GRANT OPTION; -->

<!-- The FTP password for user 'daemon' is still set to 'xampp'
http://localhost:8080/phpmyadmin/
http://127.0.0.1:8080/phpmyadmin
GRANT ALL PRIVILEGES ON *.* TO 'pma'@'localhost';
FLUSH PRIVILEGES;
SELECT User FROM mysql.user;
 -->

<?php

  $host = 'localhost';
  // localhost
  // 192.168.64.2
  $user = 'space';
  // root
  //space
  $pwd = '1111';
  // 1111
  // ''
  $db = 'grocerydb';
  // grocerydb
  // mysql

  $conn = new mysqli($host, $user, $pwd, $db);
  //object oriented vs procedural style
  // $conn = mysqli_connect($host, $user, $pwd, $db);

  if ($conn -> connect_error) {
      die('Connection failure.' . $conn -> connect_error);
  }
  // echo 'Connection failure.' . $conn -> connect_error;
  // exit();
  // if (!$conn) {
  //   die ('Connection failure.' . mysqli_connect_error());
  // }

  echo 'Connected to server.';

?>
