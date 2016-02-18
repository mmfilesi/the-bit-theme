'use strict';

(function(allPost) {

	var search = {

		addListeners: function() {
			var self 		= this,
				searchInput	= document.getElementById('js-searchInput');

			function launchSearcher(e) {
				if ( this.value && this.value.length > 2 ) {
					self.showResults(this.value);
				} else if ( this.value.length === 0 ) {
					document.getElementById('js-serchResults-container').classList.add('animation-display-none');
					document.getElementById('js-serchResults-container').classList.remove('fade');
				}
			}
			searchInput.addEventListener('keyup', launchSearcher, false);		
		},

		showResults: function(searchValue) {
			var container 	= document.getElementById('js-serchResults'),
				temp 		= [],
				content		= '',
				i 			= 0,
				len 		= allPost.length;

			for (; i<len; i++) {
				if ( (allPost[i].titulo && (allPost[i].titulo.toLowerCase()).indexOf(searchValue) != -1) ||
					 (allPost[i].categoria && allPost[i].categoria.indexOf(searchValue) != -1) ||
					 (allPost[i].sumario && allPost[i].sumario.indexOf(searchValue) != -1) || 
					 (allPost[i].tags && allPost[i].tags.indexOf(searchValue) != -1)
					) {
					temp.push(allPost[i]);
				}
			}

			if ( temp.length ) {
				document.getElementById('js-iconEyeBreack').classList.add('hidden');
				document.getElementById('js-iconEye').classList.remove('hidden');
				i = 0;
				len = temp.length;
				for (; i<len; i++) {
					content += "<dt><a href='"+temp[i].enlace+"'>"+temp[i].titulo+"</a></dt>";
					content += "<dd>"+temp[i].sumario+"</dd>";
				}
				content = '<dl>'+content+'</dl>';
			} else {
				document.getElementById('js-iconEyeBreack').classList.remove('hidden');
				document.getElementById('js-iconEye').classList.add('hidden');
				content = "<img src='http://www.mmfilesi.com/wp-content/themes/the-bit-jazz-theme/img/sm_desconcierto.gif'> Sin resultados";
			}

			document.getElementById('js-serchResults').innerHTML = content;
			document.getElementById('js-serchResults-container').classList.add('fade-hidden');
			document.getElementById('js-serchResults-container').classList.remove('animation-display-none');
			document.getElementById('js-serchResults-container').classList.add('fade');
			setTimeout(function() {
				document.getElementById('js-serchResults-container').classList.remove('fade-hidden');
			}, 200);

		},

		init: function() {
			this.addListeners();
		}

	};

	document.addEventListener('DOMContentLoaded', function(){ 
		search.init();
	}, false);

})(todoArticulos);