(function($){
  $(function(){
    var $expand = $('.zn-expand');

    if ($expand.length){
      //Wrap Expand Groups
      $('.zn-expand:first-of-type, :not(.zn-expand) + .zn-expand').each(function(){
        $(this).nextUntil($('*').not($expand)).addBack().wrapAll('<div class="zn-expand-group" />');
      });

      //Expand Foundation
      $expand.each(function(idx, itm){
        var $ex = $(itm),
            $title = $ex.children('.zn-title'),
            $content = $ex.children('.zn-content'),
            exID = 'zn-expandable-' + idx;

        $title.wrapInner('<div class="zn-title-button" role="button" tabindex="0" aria-expanded="false" aria-controls="' + exID + '"></div>');
        $content.attr('id', exID);
        
        $title.children('.zn-title-button').on('click', function(){
          $ex.toggleClass('zn-expanded');

          if ($ex.hasClass('zn-expanded')){
            $content.slideDown(300);
            $title.children('.zn-title-button').attr('aria-expanded', 'true');
          } else {
            $content.slideUp(300);
            $title.children('.zn-title-button').attr('aria-expanded', 'false');
          }
        });

        if ($ex.hasClass('zn-expanded')){
          $ex.removeClass('zn-expanded').find('.zn-title-button').click();
        }
      });
      
      //Keyboard Navigation
      $('.zn-expand-group').find('.zn-title-button').on('keydown', function(e){
        var keyCode = e.which,
            $this = $(this);
        if ((keyCode === 13) || (keyCode === 32)){
          //if enter or space hit
          e.preventDefault();
          $this.click();
        } else if (keyCode === 40){
          //if arrow down hit
          e.preventDefault();
          var $ex = $this.closest('.zn-expand');
          if ($ex.is('.zn-expand:last-child')){
            $ex.parent('.zn-expand-group').children('.zn-expand:first-child').children('.zn-title').children('.zn-title-button').focus();
          } else {
            $ex.next('.zn-expand').children('.zn-title').children('.zn-title-button').focus();
          }
        } else if (keyCode === 38){
          //if arrow up hit
          e.preventDefault();
          $ex = $this.closest('.zn-expand');
          if ($ex.is('.zn-expand:first-child')){
            $ex.parent('.zn-expand-group').children('.zn-expand:last-child').children('.zn-title').children('.zn-title-button').focus();
          } else {
            $ex.prev('.zn-expand').children('.zn-title').children('.zn-title-button').focus();
          }
        }
      });
    }
  });
})(jQuery);
