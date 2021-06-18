<?php get_header(); ?>
<div class="main-content" id="top">


    <!-- Slider -->
    <section id="carouselCover" class="carousel slide" data-ride="carousel" data-interval="7000" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/imgs/sfondo-b.jpg); ">

      <ol class="carousel-indicators">
        <li data-target="#carouselCover" data-slide-to="0" class="active"></li>
        <li data-target="#carouselCover" data-slide-to="1"></li>
        <li data-target="#carouselCover" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner" >

        <?php

        $cyb_counter = 0;

        $args = array(
          'post_type' => 'page',
          'orderby' => 'date',
          'order'   => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'home_visibility',
              'field' => 'slug',
              'terms' => 'slider',
            )
          )
        );
        $query = new WP_Query( $args );

        // La Query
        $cyb_the_query = new WP_Query( $args );

        // Il Loop
        while ( $cyb_the_query->have_posts() ) :
        	$cyb_the_query->the_post(); ?>


          <?php $cyb_counter++; ?>

            <?php $cyb_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'cyb_big');?>

            <div class="carousel-item <?php if($cyb_counter == 1){ echo 'active'; } ?>" >
              <div class="carousel-caption">
                <h3><?php the_title(); ?></h3>
                <div class="lead d-none d-lg-block my-4"><?php the_excerpt(); ?></div>
                <a href="#about"><button type="button" class="btn btn-light mb-1">Info</button></a> <a href="#contact"><button type="button" class="btn btn-outline-light mb-1">Contatti</button></a>
              </div>
            </div>



        <?php endwhile;

        // Ripristina Query & Post Data originali
        wp_reset_query();
        wp_reset_postdata(); ?>

      </div>
      <a class="carousel-control-prev" href="#carouselCover" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselCover" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </section>




  <section class="container intro-cards mt-5 pt-5" id="about">
    <div class="card-deck">

      <?php

      /* Card Section
      -------------------------------------------*/


      // Il Loop
      while ( have_posts() ) : the_post(); ?>

        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?php the_field('info_1'); ?></h4>
            <div class="card-text"><?php the_field('info_1_text'); ?></div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?php the_field('info_2'); ?></h4>
            <div class="card-text"><?php the_field('info_2_text'); ?></div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?php the_field('info_3'); ?></h4>
            <div class="card-text"><?php the_field('info_3_text'); ?></div>
          </div>
        </div>


      <?php endwhile;

      // Ripristina Query & Post Data originali
      wp_reset_query();
      wp_reset_postdata(); ?>

    </div>
  </section>




  <?php

      /* Services Section
      -------------------------------------------*/
  ?>

  <section class="home-grid container-fluid mt-5 pt-5" id="services">
      <div class="row">
          <div class="col-lg-4 col-md-6 col-12 px-0">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/portfolio/portfolio1b.png" alt="icon">
                <div class="content-details fadeIn-bottom">
                  <h3 class="content-title">Sviluppo di temi e plugin WordPress</h3>
                  <p>Siti web customizzati, elaborati sulla base di mockup grafici o con layout proprietari. Sviluppo di funzionalit&agrave; avanzate ed elaborazione di plugin ad hoc.</p>
                </div>
            </div>
          </div>



          <div class="col-lg-4 col-md-6 col-12 px-0">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/portfolio/portfolio2b.png" alt="icon">
                <div class="content-details fadeIn-bottom">
                  <h3 class="content-title">Personalizzazione di temi premium</h3>
                  <p>Ottimizzazione di temi Wordpress free o premium, con l'inserimento di adeguate modifiche e nuove funzionalit&agrave;.</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 px-0">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/portfolio/portfolio3b.png" alt="icon">
                <div class="content-details fadeIn-bottom">
                  <h3 class="content-title">Landing pages</h3>
                  <p>Progettazione di singole pagine di "destinazione" ottimizzate per incrementare le conversioni e sviluppare campagne pubblicitarie SEO e PPC efficaci.</p>
                </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 px-0">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/portfolio/portfolio4b.png" alt="icon">
                <div class="content-details fadeIn-bottom">
                  <h3 class="content-title">UX e web design</h3>
                  <p>Elaborazione di wireframe, mockup, layout grafici per siti web. Analisi ed ottimizzazione della esperienza utente di navigazione e di interazione.</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 px-0">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/portfolio/portfolio5b.png" alt="icon">
                <div class="content-details fadeIn-bottom">
                  <h3 class="content-title">E-commerce</h3>
                  <p>Realizzazione professionale di siti di commercio elettronico e cataloghi aziendali. Implementazione di servizi per la gestione della scontistica, degli ordini, delle spedizioni e delle versioni multilingua. Foto still-life dei prodotti.</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 px-0">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/portfolio/portfolio6b.png" alt="icon">
                <div class="content-details fadeIn-bottom">
                  <h3 class="content-title">Web marketing, SEO & Social</h3>
                  <p>Gestione di canali social, progettazione di piani editoriali, servizi di web copywriting e posizionamento sui motori di ricerca, sviluppo di campagne pay per click. </p>
                </div>
            </div>
          </div>
      </div>

  </section>


  <section class="home-contact py-5" id="contact">
    <div class="container text-center mt-5 px-5">
    
    <h2>Collabora con me!</h2>
    <p class="pb-5">Hai bisogno di un freelance per la tua agenzia web? Vuoi sviluppare un sito web professionale? Serve aiuto per la gestione dei tuoi canali social? Contattami su <a href="mailto:info@cybstudio.com">info@cybstudio.com</a> o compilando il modulo seguente. Ti risponder&ograve; al pi&ugrave; presto.</p>

    </div>
    <?php echo do_shortcode('[contact-form-7 id="81" title="Modulo di contatto 1"]'); ?>

  </section>


</div>


<?php get_footer(); ?>
