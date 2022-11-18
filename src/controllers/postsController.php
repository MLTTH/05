<?php

require_once('src/model.php');

function getPostsList()
{
    $posts = getPosts();

    require('templates/posts.php');
}