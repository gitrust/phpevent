<?php
header("HTTP/1.0 404 Not Found");
?>

<!DOCTYPE html>
<html lang="en">

<body>
<h1>404</h1>

<hr />

<h3>The page you were looking for could not be found</h3>

<p>This could be the result of the page being removed, the name being changed or the page being temporarily unavailable</p>

<h3>Troubleshooting</h3>

<ul>
   <li>If you spelled the URL manually, double check the spelling</li>
   <li>Go to our website's home page, and navigate to the content in question</li>
</ul>
<img style="max-width:100%" src="<?= URL::IMG('404.jpg'); ?>" alt="404 Error">
</body>
</html>