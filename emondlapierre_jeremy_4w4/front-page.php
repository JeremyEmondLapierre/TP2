<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-jel
 */

get_header();
?>
	<main id="primary" class="site-main">
	<section class="nouvelles">
				<!-- button id="bout_nouvelles">Dernières Nouvelles</button -->
				<section></section>
			</section>
	

	

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			$chaine_bouton_radio = '';
			/* Liste des carrés de cours */
			while ( have_posts() ) :
				the_post();
                convertirTableau($tPropriété);

				if($tPropriété['typeCours'] !=  $precedent): 
					if("XXXXXX" != $precedent) :?>
					</section>
					<?php  if (in_array($precedent, ['Web', 'Jeu', 'Spécifique'])) : ?>
						<section class="ctrl-carroussel">
					<?php echo $chaine_bouton_radio;
						  $chaine_bouton_radio = '';
					?>
					</section>
					<?php endif; ?>
					<?php endif; ?>
					<div class="TypeCours">
					<div class="bar"></div>
					<h2><?php echo $tPropriété['typeCours'] ?></h2>
					<div class="bar"></div>
					</div>
					<section <?php echo class_bloc($tPropriété['typeCours']) ?> >
					
				<?php endif ?>
				<?php if(in_array($tPropriété['typeCours'], ['Web', 'Jeu', 'Spécifique']) ) : 
					get_template_part('template-parts/content', 'cours-slider');
					$chaine_bouton_radio .= '<input class="rad-carrousel" type="radio" name="rad-'.$tPropriété['typeCours'].'">';

					elseif($tPropriété['typeCours'] == 'projet') :
						get_template_part('template-parts/content', 'galerie');

				else :
					get_template_part('template-parts/content', 'cours-article');  
				endif;             
				$precedent = $tPropriété['typeCours'];
				endwhile; 
				?>
			</section> <!-- Fin section cours -->
		<!-- /////////////////////////////////////////////////////////
		Formulaire d'ajot d'un article de catégorie Nouvelles
		////////////////////////////////////////////////////////// -->
		<?php if (current_user_can('administrator')) : ?>		
			<section class="admin-rapid">
				<h3>Ajouter un article de catégorie "Nouvelles"</h3>
				<input type="text" name="title" placeholder="Titre">
				<textarea name="content" placeholder="Contenu"></textarea>
				<button id='bout-rapid'>Créer une nouvelle</button>
			</section>
		<?php endif; ?>


			
		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();

function convertirTableau(&$tPropriété)
{
	$tPropriété['titre'] = get_the_title();
	$tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);
	$tPropriété['nbHeure'] = substr($tPropriété['titre'], -4,3);
	$tPropriété['titrePartiel'] = substr($tPropriété['titre'], 8, -6);
	$tPropriété['session'] = substr($tPropriété['titre'], 4, 1);
	$tPropriété['typeCours'] = get_field('type_de_cours');
}

function class_bloc($type_de_cours){
	if (in_array($type_de_cours, ['Web', 'Jeu', 'Spécifique'])){
		return('class ="carrouselCours"');
	}
	elseif($type_de_cours == 'projet'){
		return('class ="galerie"');
	}
	else{
		return('class=""');
	}
}