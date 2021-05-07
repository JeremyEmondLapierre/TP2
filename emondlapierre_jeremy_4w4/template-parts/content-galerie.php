<?php
/**
 * Template part l'affichage des blocs de cours dans front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-jel
 */
?>


<article class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
	<?php the_post_thumbnail( 'medium' );?>
  </div>
  <div class="flip-card-back">
      <h1><a href="<?php echo get_permalink() ?>"> <?php the_title(); ?></h1>
      <?php $auteur = get_field( "auteur" );
            $cours = get_field( "cours" );
      ?>
      <h1><a href="<?php echo get_permalink() ?>"> <?php echo $cours; ?></h1>
	    <h2><?php echo $auteur; ?></h2>
  </div>
  </div>
</article>		