<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($title)) { echo $title; } ?></title>
</head>
<body>
    <p>Ich bin header - <?php if(isset($title)) { echo $title; } ?></p>