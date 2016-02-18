                <aside class="sidebar grid-cell grid-cell-3">

                    <div class="box-sidebar box-standar animation-display-none" id="js-serchResults-container">
                        <header class="title">
                            quizás algo de esto te interese
                            <span class="icon-eye icon" id="js-iconEye"></span>
                            <span class="icon-eye-slash icon  hidden" id="js-iconEyeBreack"></span>
                      </header>
                      <div class="content">
                        <div id="js-serchResults" class="max-h">
                        </div>
                      </div>
                    </div>

                    <div class="box-sidebar box-standar">
                        <header class="title">
                          spacename
                          <span class="icon-user icon"></span>
                        </header>
                        <div class="content" itemscope="" itemtype="http://schema.org/CreativeWork">
                            <div itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                                <div class="pull-right">
                                    <img src="http://www.mmfilesi.com/wp-content/uploads/2012/09/mmfilesi1.png" width="64px" height="64px" itemprop="image">
                                </div>
                                <span itemprop="name">Marcos Méndez Filesi</span>,
                                <span itemprop="jobTitle"> autor  </span>
                                 de <span itemprop="affiliation"> The Bit Jazz Band</span>, un blog sobre programación e Internet escrito desde  
                                <span itemprop="address"> el fondo del mar de groenlandia.</span>
                            </div>
                        </div>
                        <ul class="social" >
                            <li><a href="http://www.facebook.com/marcos.filesi">
                              <img src="http://www.mmfilesi.com/wp-content/themes/bit-theme/img/facebook.png" alt="facebook" width="24" height="24" class="img-links"></a>
                          </li>
                          <li><a href="https://twitter.com/mmfilesi">
                              <img src="http://www.mmfilesi.com/wp-content/themes/bit-theme/img/twitter.png" alt="twitter" width="24" height="24" class="img-links"></a>
                          </li> 
                          <li><a href="https://plus.google.com/u/0/">
                              <img src="http://www.mmfilesi.com/wp-content/themes/bit-theme/img/google.png" alt="google+" width="24" height="24" class="img-links">
                          </a></li>

                          <li><a href="http://es.linkedin.com/pub/marcos-m%C3%A9ndez-filesi/24/7b2/322">
                              <img src="http://www.mmfilesi.com/wp-content/themes/bit-theme/img/linkedin.png" alt="icono linkedin" width="24" height="24" class="img-links">
                          </a></li>
                          <li><a href="http://www.flickr.com/photos/golemcabaret/">
                              <img src="http://www.mmfilesi.com/wp-content/themes/bit-theme/img/flickr.png" alt="icono flikr" width="24" height="24" class="img-links">
                          </a></li>
                          <li><a href="http://www.mmfilesi.com/feed/">
                              <img src="http://www.mmfilesi.com/wp-content/themes/bit-theme/img/rss.png" alt="icono rss" width="24" height="24" class="img-links">
                          </a></li>
                          <li><a href="https://github.com/mmfilesi">
                              <img src="http://www.mmfilesi.com/wp-content/themes/bit-theme/img/github.png" alt="icono git" width="24" height="24" class="img-links">
                          </a></li>
                        </ul>
                    </div>
                 
                    <div class="box-sidebar box-standar">
                        <header class="title">
                          Series
                          <span class="icon-code-fork icon"></span>
                      </header>
                      <div class="content">
                          <ul class="list-georgian">
                                <li><a href="http://www.mmfilesi.com/blog/series/web-components/">web components y polymer</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/express-2/">express</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/node-2/">node</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/mongo/">mongo</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/angular/">angular con dinosaurios</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/cordova/">cordova</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/dom/">trasteando con el dom</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/javascript-orientado-a-objetos/">javascript orientado a objetos</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/php-orientado-a-objetos/">php orientado a objetos</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/wordpress-desde-cero/">wordpress desde cero</a></li>
                                <li><a href="http://www.mmfilesi.com/blog/series/jquery-desde-cero/">jquery desde cero</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="box-sidebar box-standar">
                        <header class="title">
                          tempus fugit
                          <span class="icon-alert-circled icon"></span>
                      </header>
                      <div class="content">
                          Lo siento, pero padezco una escasez crónica de tiempo y no puedo atender dudas sobre snippets de código. Para eso hay espacios más apropiados como <a href="http://stackoverflow.com/">Stack Overflow.</a> Por lo demás, puedes comentar lo que te apetezca.
                      </div>
                    </div>

                    <div class="box-sidebar box-standar">
                        <header class="title">
                            microblogging
                            <span class="icon-pencil icon"></span>
                      </header>
                      <div class="content">
                        <?php echo do_shortcode("[destacados micropost='1']"); ?>
                      </div>
                    </div>

                    <div class="box-sidebar box-standar">
                        <header class="title">
                          otros blogs
                          <span class="icon-user-secret icon"></span>
                      </header>
                      <div class="content">
                            <a href="http://www.mmfilesi.com/tcabaret/">
                                <img src="http://www.mmfilesi.com/wp-content/uploads/2014/06/ptann.jpg" class="img-responsive img-links">
                            </a>
                      </div>
                    </div>

                    <div class="box-sidebar box-standar">
                        <header class="title">
                          tags
                          <span class="icon-tags icon"></span>
                      </header>
                      <div class="content">
                        <?php wp_tag_cloud( 'smallest=8&largest=16&number=50&order=rand' ); ?>
                      </div>
                    </div>

                    <div class="box-sidebar box-standar">
                        <header class="title">
                          últimos comentarios
                          <span class="icon-thumbs-o-up icon"></span>
                      </header>
                      <div class="content">
                        <?php 
                        $comments = get_comments('number=3'); ?>
                        <?php foreach ($comments as $comment) : ?>
                            <p><a href="http://www.mmfilesi.com/tcabaret/?p=<?php echo ($comment->comment_post_ID); ?>"> 
                            <?php echo ($comment->comment_author); ?>:</a>                          
                            <?php $comentario = ($comment->comment_content);
                            echo substr($comentario, 0, 145); ?></p>                         
                        <?php endforeach; ?>

                      </div>
                    </div>

                </aside>