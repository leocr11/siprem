<?php
session_start();
session_destroy();
echo '<script> window.location="../../login/index.php"; </script>';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<script language="javascript">location.href = "index.php";</script>
</body>
</html>