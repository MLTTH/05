<?php
// controllers/post.php

require_once('src/model.php');

function getErrors(string $postIdentifier)
{
	$post = getPost($postIdentifier);
	$comments = getComments($postIdentifier);

	require('templates/error.php');
}