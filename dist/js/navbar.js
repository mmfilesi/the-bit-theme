'use strict';

(function(allPost) {

	var navbar = {

		coordsScroll: 0,
		status: 'top',

		addListeners: function(searchValue) {
			var self = this;

		     window.onscroll=function() {
			    var doc = document.documentElement,
			    	top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);

			    if ( top > self.coordsScroll ) {
			    	if ( self.status == 'top' ) {
			    		self.setToLeft();
			    	}
			    } else {
			    	if ( self.status == 'left' ) {
			    		self.setToTop();
			    	}
			    }
			}
		},

		setToLeft: function() {
			document.getElementById('js-secondaryNav').classList.add('fixed-left');
			this.status = 'left';
		},

		setToTop: function() {
			document.getElementById('js-secondaryNav').classList.remove('fixed-left');
			this.status = 'top';
		},

		initCoords: function() {
			var rect = document.getElementById('js-secondaryNav').getBoundingClientRect();
			this.coordsScroll = Math.round(rect.top);
		},

		init: function() {
			this.initCoords();
			this.addListeners();
		}

	};

	document.addEventListener('DOMContentLoaded', function(){ 
		navbar.init();
	}, false);

})(todoArticulos);