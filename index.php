<?php //include('header.php'); substituído pela função abaixo ?>
<?php get_header(); ?>
<main class="home-main">
	<div class="container">

		<h1>Bem Vindo ao Maluras!</h1>
		<?php 

		$args = array(
			'post_type' => 'imovel'
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