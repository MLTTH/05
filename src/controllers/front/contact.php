<?php
// controllers/post.php

require_once('src/model.php');

function unefonction(string $postIdentifier)
{
	$post = getPost($postIdentifier);
	$comments = getComments($postIdentifier);

	require('templates/contact.php');
}