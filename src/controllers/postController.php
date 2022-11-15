<?php

require_once('src/model.php');
require_once('src/model/comment.php');

function post(string $postIdentifier)
{
	$post = getPost($postIdentifier);
	$comments = getComments($postIdentifier);

	require('templates/post.php');
}