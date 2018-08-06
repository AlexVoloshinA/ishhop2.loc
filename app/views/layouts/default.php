<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->getMeta(); ?>

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <script src="main.js"></script>
</head>
<body>
    <h1>Layout DEFAULT</h1>

  


    <?php 
    
    $logs = \R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();
    debug($logs->grep('SELECT'));
    
    ?>
</body>
</html>