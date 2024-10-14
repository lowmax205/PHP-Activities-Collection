<!-- EXERCISE 12  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 12</title>
</head>

<body>
    <?php
$var_x = 3.14;
$holder = (double)$var_x;
print gettype($holder);
print("<br/>$holder<br/>");
$temp = (string)$var_x;
print gettype($temp);
print("<br/>$temp");
?>
</body>

</html>