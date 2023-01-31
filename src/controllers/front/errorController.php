<?php
// controllers/post.php

require_once('src/model.php');

function getErrors(string $postIdentifier)
{
	require('templates/error.php');
}