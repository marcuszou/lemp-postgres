<!DOCTYPE html>
<html>
     <head>
          <title>Hello PHP8!</title>
     </head>  

     <body>
          <h1>Hello, PHP8 + PostgreSQL!</h1>
          <p>  <?php
                    $dsn = 'pgsql:dbname=testdb;host=pgsdb';
                    $user = 'zenusr';
                    $password = 'userP@ss2024';
                    // Create connection 
                    $conn = new PDO($dsn, $user, $password);
                    
                    // Check connection 
                    if ($conn->connect_error) { 
                    die("Connection failed: " . $conn->connect_error); 
                    }  
                    echo "Connected successfully"; 
                    
                    // Close the connection
                    $conn = null;
               ?>
          </p>

          <h1> <?php echo 'Welcome to PHP ' . phpversion(); ?> </h1>
          <p> <?php phpinfo(); ?> </p>
     </body>
</html>
