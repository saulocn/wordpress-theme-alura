<?php //include('header.php'); substituído pela função abaixo ?>
<?php get_header(); ?>


<h1>Bem vindo!</h1>

<?php 
if ( have_posts() ) {

	while ( have_posts() ) {
		the_post(); 
		?>


		<li class="imoveis-listagem-item">
			<?php the_post_thumbnail(); ?><h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
		</li>



		<?php 
	}
}
?>


<?php get_footer(); ?>