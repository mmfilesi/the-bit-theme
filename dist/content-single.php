                    <article id="post-<?php the_ID(); ?>" class="articles" itemscope itemtype="http://schema.org/Article">


                        <header class="header-articles"> <!-- cabecera -->
                            <div class="layout flex-container"> 
                                <div class="text-block flex-col-7">           
                                    <h2 class="title" id="js-articleTitle">
                                        <span itemprop="name"><?php echo get_the_title(); ?></span>
                                    </h2>            
                                    <p class="summary">
                                        <?php $sumario = strip_tags(get_the_excerpt()); ?>
                                        <span itemprop="description"><?php echo $sumario ?></span>

                                            <meta itemprop="image" content="<?php if (has_post_thumbnail()) : ?>
                                              <?php 
                                              $image_id = get_post_thumbnail_id();
                                              $image_url = wp_get_attachment_image_src($image_id,'large', true); ?>
                                              <?php echo $image_url[0]; ?> 
                                              <?php else : ?>
                                              http://www.mmfilesi.com/wp-content/uploads/2012/08/sin_imagenes.jpg           
                                              <?php endif; ?>"/>
                                    </p>  
                                </div>
                                <div class="img-block flex-col-5">  
                                    <img src="
                                      <?php if (has_post_thumbnail()) : ?>
                                        <?php 
                                              $image_id = get_post_thumbnail_id();
                                              $image_url = wp_get_attachment_image_src($image_id,'medium', true); ?>
                                              <?php echo $image_url[0]; ?> 
                                              <?php else : ?>
                                              <?php echo get_template_directory_uri(); ?>/img/sinimagen.jpg         
                                      <?php endif; ?>
                                   " class="img-responsive">
                                    <p class="caption-image">
                                      <?php echo get_post_meta($image_id, '_wp_attachment_image_alt', true); ?>
                                    </p>
                                </div>      
                                <meta itemprop="image" content="http://www.mmfilesi.com/wp-content/uploads/2016/01/van-gogh-05.jpg">
                            </div>
                            <div class="aside">
                                archivado en: 
                                  <?php 
                                    $category = get_the_category();           
                                    echo '<a href="'.get_category_link($category[0]->term_id ).'"><span itemprop="about">'.$category[0]->cat_name.'</span></a>'; ?>
                                     ::
                                    <meta itemprop="datePublished" content="<?php echo get_the_date(Y); ?>-<?php echo get_the_date(m); ?>-<?php echo get_the_date(d); ?>" /><?php echo get_the_date(Y-m-d); ?> 
                                    <?php echo get_the_term_list( $post->ID, 'series','<span>::; serie: ', ', ', '</span>' ) ?>

                                    <div class="pull-right actions">
                                        <span class="icon-search-minus icon-link link" id="js-zoomMin"></span>                                        
                                        <span class="icon-search-plus icon-link link" id="js-zoomMax"></span>
                                        <!-- <span class="icon-file-pdf-o icon-link link" id="js-exportPDF"></span> :: todo -->
                                    </div> 
                            </div>
                        </header>

                        <div class="article-content" id="js-articleBody">
                            <span itemprop="articleBody">
                              <?php the_content(); ?>          
                            </span>
                        </div>

                    <div class="end-layout">
                        <img src="<?php bloginfo('template_directory'); ?>/img/remate_gris.png">
                    </div>

                      <footer>    
                        <p class="border-grey">  
                        <span itemprop="author">marcos m&eacute;ndez filesi</span> &#124;&#124;
                        Tags: 
                        <span itemprop="keywords">  
                          <?php     
                            echo get_the_tag_list( '', __( ', ', 'thebit' ) ); ?>
                        </span> </p>  
                        
                        <!-- valoraciones -->
                        <?php require_once('utilidades_rating.php'); ?>
                        <!-- #valoraciones -->
                          
                      </footer><!-- .entry-meta -->

                    </article>