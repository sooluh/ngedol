<?php
defined('BASEPATH') or exit('No direct script access allowed');

function settings($key = null)
{
	$settings = [
		'title' => $_ENV['SITE_TITLE'],
		'author' => $_ENV['SITE_AUTHOR'],
		'email' => $_ENV['SITE_EMAIL'],
		'description' => $_ENV['SITE_DESCRIPTION'],
		'keywords' => $_ENV['SITE_KEYWORDS'],
	];

	return $key ? $settings[$key] : $settings;
}

function set_title($page = null)
{
	$title = settings('title');
	$author = settings('author');

	return $page ? "$page - $title" : "$title - $author";
}

function types($key = null)
{
	$types = [
		1 => 'Unit',
		'Buah',
		'Pasang',
		'Lembar',
		'Keping',
		'Batang',
		'Bungkus',
		'Potong',
		'Tablet',
		'Ekor',
		'Rim',
		'Karat',
		'Botol',
		'Butir',
		'Roll',
		'Dus',
		'Karung',
		'Koli',
		'Sak',
		'Bal',
		'Kaleng',
		'Set',
		'Slop',
		'Gulung',
		'Ton',
		'Kilogram',
		'Gram',
		'Miligram',
		'Meter',
		'M2',
		'M3',
		'Inchi',
		'Cc',
		'Liter',
	];

	return is_null($key) ? $types : $types[$key];
}

function rupiah($value)
{
	return 'Rp ' . number_format($value, 2, ',', '.');
}
