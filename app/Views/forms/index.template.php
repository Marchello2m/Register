<?php  require_once 'app/Views/partials/header.template.php';
?>
<head>
    <title>My reg</title>
</head>
<body>
<a href="logout.template.php">Logout</a>
<h1>This is index page</h1>
<br>
Hello,<?php echo $user_data['user_name']; ?>.
</body>
</html>

