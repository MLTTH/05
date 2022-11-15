<?php
// controllers/post.php

require_once('src/model.php');

function post(string $postIdentifier)
{
	$post = getPost($postIdentifier);
	$comments = getComments($postIdentifier);

	require('templates/post.php');
}