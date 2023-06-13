(function($){
  $(function(){
    //Set an ID on your drawer and add aria-controls to that ID on the toggle for full accessibility support

    var $body = $('body'),
        $doc = $(document),
        $drawer = $('.zn-drawer'), //the off canvas drawer element
        $drawerToggle = $('.zn-drawer-toggle'), //the toggle of the drawer
        drawerOpen = 'zn-drawer-opened', //body class when drawer is open
        $closeDrawer = $('.zn-close-drawer');

        //close drawer functions
        closeDrawer = function closeDrawer(toggle, openClass){
          $body.removeClass(openClass);
          toggle.removeAttr('aria-expanded').focus();
          $doc.off('keydown.drawerKeys').off('focusin.drawerKeys').off('click.drawerClose');
        },

        //open drawer functions
        openDrawer = function openDrawer(toggle, drawer, openClass){
          $body.addClass(openClass);
          toggle.attr('aria-expanded', 'true');

          setTimeout(function(){ 
            drawer.find('#search input').focus(); 
          }, 501);

          $doc.on('keydown.drawerKeys', function(e){
            var keyCode = e.which;
            if(keyCode === 27){
              closeDrawer(toggle, openClass);
            }
          }).on('focusin.drawerKeys', function(e){
            if ($body.hasClass(openClass) && !$.contains(drawer.get(0), e.target)){
              drawer.find('#search input').focus(); 
            }
          }).on('click.drawerClose', function(){
            closeDrawer(toggle, openClass);
          });
        },
 
        //build a drawer
        buildDrawer = function buildDrawer(toggle, drawer, openClass){   

          toggle.addAccess().on('click.drawerToggle', function(e){
            e.stopPropagation();

            if($body.hasClass(openClass)){
              closeDrawer(toggle, openClass);
            } else {
              openDrawer(toggle, drawer, openClass);
            }
          });
          
          drawer.on('click.drawerClick', function(e){
            e.stopPropagation();
          });
        },

        //destroy a drawer
        destroyDrawer = function destroyDrawer(toggle, drawer, openClass){
          closeDrawer(toggle, openClass);
          drawer.off('click.drawerClick');
          toggle.removeAccess().off('click.drawerToggle');
          $(document.activeElement).blur(); 
        },

        drawerBreaks = [
          {
            min: 0,
            max: 1023,
            enter: function(){
              //build drawer on mobile resolutions
              buildDrawer($drawerToggle, $drawer, drawerOpen);
            },
            exit: function(){
              //destroy drawer on wider resolutions if not used
              destroyDrawer($drawerToggle, $drawer, drawerOpen);
            }
          }
        ];

        $closeDrawer.on('click', function(){
          closeDrawer($drawerToggle, drawerOpen);
        })

    //run breakdance drawer functions
    breakdance(drawerBreaks);
  });
})(jQuery);