<?php

require('src/model.php');

$posts = getPosts();

require('templates/homepage.php');
require('templates/test.php');

?>