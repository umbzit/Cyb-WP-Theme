<?php get_header(); ?>

<main class="container my-5 pt-5 main-content">

  <div class="row">
    <div class="col-sm-8 ml-sm-auto mr-sm-auto mt-5 pt-5">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article <?php post_class(); ?>>

            <h1 class="display-4 mb-5 text-center"><?php the_title(); ?></h1>

            <?php the_post_thumbnail('cyb_single', array( 'class' => 'img-fluid mb-4', 'alt' => get_the_title() ))?>

            <?php the_content(); ?>


        </article>

      <?php endwhile; else: ?>

        <p><?php esc_html_e('Sorry, no post matched your criteria.', 'cyb'); ?></p>

      <?php endif; ?>

    </div>

  </div>

</main>

<?php get_footer(); ?>
