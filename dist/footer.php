
        <footer class="main-footer">
            <div itemscope itemtype="http://schema.org/CreativeWork" id="texto_licencia" class="license box-license box-standar">
                <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Person">
                <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.es_CO"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">mmfilesi</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.mmfilesi.com/" property="cc:attributionName" rel="cc:attributionURL"><span itemprop="name">marcos m&eacute;ndez filesi</span></a> se encuentra bajo una<br /> <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.es_CO">Licencia Creative Commons Atribucion-CompartirIgual 3.0 Unported</a>.<br />Basada en una obra en <a xmlns:dct="http://purl.org/dc/terms/" href="http://www.mmfilesi.com/" rel="dct:source"><span itemprop="url">http://www.mmfilesi.com/</span></a>.
                </span>
            </div> <!-- #CreativeWork -->
        </footer>

    </div> <!-- wrap -->


    <?php if ( is_home() ) { ?>
		<script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/search.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/navbar.js"></script>
	<?php } ?>
	<?php if ( is_single() ) { ?>
		<script src="<?php bloginfo('template_directory'); ?>/js/zoom.js"></script>
	<?php } ?>


	 <!--Google Analytic-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-19774956-1']);
	  _gaq.push(['_trackPageview']);
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<!--#Google Analytic-->

    <?php wp_footer(); ?>
</body>
</html>