	'use strict';

(function(allPost) {

	var layout = {

		numeroCapsulas: 0,
		tipoCategoria: 'all',

		category: 'all',
		minPag: 0,
		maxPag: 24,
		mult: 0,

		addListeners: function() {
			var self 	= this,
				links 	= document.getElementsByClassName('js-filterCategory'),
				i,
				len;

			function launchFilter(e) {
				var timer,
					element = document.getElementById('js-layoutSummaries');

				layout.category = this.getAttribute('data-category');
				element.classList.add('fade-hidden');
				layout.resetPag();
				
				timer = setTimeout(function() { 
					self.renderLayout();
					element.classList.remove('fade-hidden');
					clearTimeout(timer);
				}, 250);
			}
			i 	= 0;
			len = links.length;
			for (; i<len; i++) {
				links[i].addEventListener('click', launchFilter, false);
			}			
		},

		resetPag: function() {
			this.minPag = 0;
			this.maxPag = 24;
			this.mult 	= 0;
		},

		renderBox: function(datosCapsula) {
			var content = '';

			if ( !datosCapsula ) {
				return content;
			}

			content += "<div class='flex-col-4'>"
			content += "<article class='box-summary box-standar'>";
			content +=     "<div class='img-container'>";
			content +=         "<a href='"+datosCapsula.enlace+"'>"+datosCapsula.imgDestacada+"</a>";
			content +=     "</div>";
			content +=     "<header class='title'>";
			content +=        "<a href='"+datosCapsula.enlace+"'>"+datosCapsula.titulo+"</a>";
			content +=    "</header>";
			content +=    "<div class='summary'>"+datosCapsula.sumario+"</div>";
			content += "</article>";
			content += "</div>";

			return content;
		},

		filterPag: function(data) {
			var i 			= this.minPag + (this.mult * 24),
				len 		= this.maxPag + (this.mult * 24),
				stringBox 	= '',
				newElement;

			for (; i<len; i++) {
				if ( data[i] ) {
					stringBox += this.renderBox(data[i]);
				}
			}
			return stringBox;

		},

		filterCategory: function() {
			var selectedPost 	= [],
				len 			= allPost.length,
				i 				= 0;

			if ( this.category == 'all' ) {
				return allPost;
			}
			for (; i<len; i++) {
				if ( allPost[i].idCategoria == this.category ) {
					selectedPost.push(allPost[i]);
				}
			}
			return selectedPost;
		},

		setPag: function(e) {
			layout.mult = this.getAttribute('data-pag');
			layout.renderLayout();
		},

		preparePagination: function(data) {
			var count,
				i 			= 0,
				item,
				atribute;

			document.getElementById('js-layoutSummaries-pagination').innerHTML = '';	
			if ( !Array.isArray(data) || data.length < 24 ) {				
				return false;
			}
			count = data.length/24;
			for (; i<count; i++ ) {
				item 		= document.createElement('span');
				atribute 	= document.createAttribute("data-pag");

				item.innerHTML = i;
				atribute.value = i;
				item.setAttributeNode(atribute);
				if ( i == this.mult ) {
					item.classList.add('active');
				}
				document.getElementById('js-layoutSummaries-pagination').appendChild(item);
				item.onclick = this.setPag;
			}
		},

		renderLayout: function() {
			var content,
				element,
				data;

			data 	= this.filterCategory();
			content = this.filterPag(data);
			element = document.getElementById('js-layoutSummaries');
			element.innerHTML = content;
			this.preparePagination(data);
		},

		prepareCarrousel: function() {
			var content 	= "";
			var temporal 	= allPost[0].imgDestacada;
			
			temporal = temporal.replace("width=\"150\" height=\"150\"", "").replace("-150x150", "").replace("wp-post-image", " img-responsive img-links");
  
			content += "<article class='box-standar box-slider grid-row'>";
	        content += "<div class='img-container grid-cell grid-cell-6'>";
	        content += "<a href='"+allPost[0].enlace+"'>";
	        content +=  temporal;
	        content += "</a>";
	        content += "</div>";
	        content += "<div class='content grid-cell grid-cell-6'>";
	        content += "<header class='title'>";
	        content += "<a href='"+allPost[0].enlace+"'>"+allPost[0].titulo+"</a>";
	        content += "</header>";
	        content += "<p class='summary'>"+allPost[0].sumario+"</p>";
	        content += "<aside class='complementary'>";
	        content += "<span itemprop='about'>"+allPost[0].categoria+"</span>";
	        content += "</aside>";
	        content += "</div>";
	        content += "</article>";

	        return content;
		},

		renderCarrousel: function() {
			document.getElementById('js-carrousel').innerHTML = this.prepareCarrousel();
		},

		init: function() {
			this.renderCarrousel();
			this.renderLayout();
			this.addListeners();
		}

	};

	document.addEventListener('DOMContentLoaded', function(){ 
		layout.init();
	}, false);

})(todoArticulos);