<?php 

$queryTaxonomy = array_key_exists('taxonomy', $_GET);
if($queryTaxonomy && $_GET['taxonomy']===''){
	wp_redirect(home_url());
}
$cssEspecifico = 'index';
//get_header(); 
require_once('header.php');
?>
<main class="home-main">
	<div class="container">


		<?php $taxonomias = get_terms('localizacao'); ?>
		<form class="busca-localizacao-form" method="GET" action="<?= bloginfo('url'); ?>">
			<div class="taxonomy-select-wrapper">
				<select name="taxonomy">
					<option value="">Todos os imóveis</option>
					<?php foreach ($taxonomias as $taxonomia) { ?>
					<option value="<?php echo $taxonomia->slug; ?>"><?php echo $taxonomia->name; ?></option>	
					<?php } ?>
				</select>
				<button type="submit">Filtrar</button>
			</div>
		</form>

		<?php 

		if($queryTaxonomy){
			$qLocalizacao = array(
				'taxonomy' => 'localizacao',
				'field' => 'slug',
				'terms' => $_GET['taxonomy']
				);
		}

		$taxQuery = array($qLocalizacao);

		$args = array(
			'post_type' => 'imovel',
			'tax_query' => $taxQuery
			);

		$loop = new WP_Query($args);
		if ( $loop->have_posts() ) {
			?>
			<ul class="imoveis-listagem">
				<?php 
				while ( $loop->have_posts() ) {
					$loop->the_post(); 
					?>
					<li class="imoveis-listagem-item">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
							<h2><?php the_title(); ?></h2>
							<div><?php the_content(); ?></div>
						</a>
					</li>
					<?php 
				}
				?> 
			</ul>
			<?php 
		}
		?>
	</div>
</main>


<?php get_footer(); ?>