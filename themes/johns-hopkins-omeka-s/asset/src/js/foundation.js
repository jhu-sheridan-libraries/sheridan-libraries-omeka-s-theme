//var $JQ = jQuery.noConflict();

(function($){
    $.fn.addAccess = function(options){
      var settings = $.extend({
        //default settings
        role: 'button',
        tabindex: '0'
      }, options);
      
      $(this).attr('tabindex', settings.tabindex).attr('role', settings.role).on('keyup.access', function(e){
        var keyCode = e.which;
        if ((keyCode === 13) || (keyCode === 32)){
          $(this).click();
        }
      });
  
      return(this);
    };
    
    $.fn.removeAccess = function(){
      $(this).removeAttr('tabindex').removeAttr('role').off('keyup.access');
  
      return(this);
    };
  })(jQuery);
  

(function($){
    $(function(){
        var $search = $('#search'),
            templateBreaks = [
                {
                    min: 1024,
                    max: 9999999,
                    enter: function(){
                        $search.appendTo('#header .brand-stage');
                    },
                    exit: function(){
                        $search.prependTo('#main-menu .drawer-stage');
                    }
                }
            ];

        breakdance(templateBreaks);
    });  
})(jQuery);