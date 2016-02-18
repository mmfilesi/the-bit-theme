'use strict';

(function() {

  var pdf = {
    addListeners: function() {
      var self    = this,
        buttonPDF = document.getElementById('js-exportPDF');

        buttonPDF.addEventListener('click', function() {
          self.exportPDF();
        }, false);
    },

    exportPDF: function() {
      var doc = new jsPDF(),
          content = document.getElementById('js-articleBody').innerHTML,
          title = document.getElementById('js-articleTitle').textContent.trim().split(' ').join('-');

      var mainStyle = '<div style=\'text-align:left; background: #900;\'>';
      content = mainStyle + content + '</div>';

      var specialElementHandlers = {
        '#editor': function(element, renderer){
          return true;
        }
      };

      doc.fromHTML(content, 15, 15, {
        'width': 170, 
        'elementHandlers': specialElementHandlers
      });

      doc.save(title+'.pdf')

    },

    init: function() {
      //this.addListeners();
    }

  };

  var zoom = {

    zoomNow: 1,

    addListeners: function() {
      var self    = this,
        buttonMin = document.getElementById('js-zoomMin'),
        buttonMax = document.getElementById('js-zoomMax'),
        buttonPDF = document.getElementById('js-exportPDF');

      buttonMin.addEventListener('click', function() {
        self.zoomNow -= 0.1;
        document.getElementById('js-articleBody').style.zoom = self.zoomNow;
      }, false);

      buttonMax.addEventListener('click', function() {
        self.zoomNow += 0.1;
        document.getElementById('js-articleBody').style.zoom = self.zoomNow;
      }, false);
 
    },

    init: function() {
      this.addListeners();
    }

  };

  document.addEventListener('DOMContentLoaded', function(){ 
    zoom.init();
    pdf.init();
  }, false);

})();