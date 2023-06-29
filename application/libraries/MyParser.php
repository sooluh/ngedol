<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \cebe\markdown\Markdown;
use \Kirra\Markdown\TaskListsTrait;

class MyParser extends Markdown
{
	use TaskListsTrait;
}
