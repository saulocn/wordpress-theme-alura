<?php 


add_theme_support('post-thumbnails');


function cadastraPostTypeImoveis(){
//referencia https://codex.wordpress.org/Function_Reference/register_post_type

$nomeSingular = 'Imóvel';
$nomePlural = 'Imóveis';
$description = $nomePlural .' da imobiliária Malura';

$labels = array(
		'name' => $nomePlural,
		'name_singular' => $nomeSingular,
		'add_new_item' => 'Adicionar novo '.$nomeSingular,
		'edit_item' => 'Editar '.$nomeSingular,
	);

$supports = array(
	'title',
	'editor',
	'thumbnail'
	);

$args = array(
	'labels' => $labels,
	'public' => true,
	'description' => $description,
	'menu_icon' => 'dashicons-admin-home',
	'supports' => $supports
);

register_post_type('imovel', $args);

}


//https://developer.wordpress.org/reference/functions/add_action/
add_action('init', 'cadastraPostTypeImoveis');