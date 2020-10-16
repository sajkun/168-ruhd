

/**
* replaces part of a string
*
* @param {needle} - object with pairs {search : replace }
* @param {highstack} - string
*
* @return String
*/
function str_replace(needle, highstack){
  var template = highstack;
    for(key in needle){
    var exp = new RegExp("\\{" + key + "\\}", "gi");
      template = template.replace(exp, function(str){
        value = needle[key];
        return value;
      });
    }
    return template;
}


function update_popular_treatment(param){

  var data = treatments_categories[param]['items'];

  var lg_tmpl = '<a href="{url}" class="treatment-preview treatment-preview_lg"> <div class="treatment-preview__overlay" style="background-image: url({img_url_lg}) "></div> <span class="treatment-preview__category">{term}</span> <div class="treatment-preview__info"> <h3 class="treatment-preview__title">{title}</h3> <p class="treatment-preview__text"> <span>{text}<svg class="svg-icon-arrow-w"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-arrow-w"></use></svg></span> </p>  </div></a> ';

  var sm_tmpl = '<a href="{url}" class="treatment-preview"> <div class="treatment-preview__overlay" style="background-image: url({img_url_sm}) "></div> <span class="treatment-preview__category">{term}</span> <div class="treatment-preview__info"> <h3 class="treatment-preview__title">{title}</h3> <p class="treatment-preview__text"> <span>{text}<svg class="svg-icon-arrow-w"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-arrow-w"></use></svg></span> </p>  </div></a> ';

  var tmpl = '<div class="col-md-6">{lg}</div><div class="col-md-6">{sm}</div>';

  var lg ='';
  var sm ='';

  data = data.slice(0,3);

  for(var id in data){
    var search = {
      url: data[id].url,
      img_url_sm:data[id].images.sm,
      img_url_lg:data[id].images.lg,
      text:data[id].text,
      title:data[id].post_title,
      term:data[id].term,
    };

    if(id == 0){
      lg +=str_replace(search,lg_tmpl );
    }else{
      sm +=str_replace(search,sm_tmpl );
    }
  }

  var search = {
    sm: sm,
    lg: lg,
  };

  var output = str_replace(search,tmpl );

  jQuery('.treatments-target').html(output);
}
jQuery('.dropdown-trigger').click(function(event) {
  jQuery(this).closest('.site-header').toggleClass('active');
});


jQuery('.site-container').click(function(e){
  if (!jQuery(e.target).closest('.site-header').length) {
    jQuery('.site-header').removeClass('active');
  }
  if (!jQuery(e.target).closest('.select-imitation').length) {
    jQuery('.select-imitation').removeClass('active');
  }
})


jQuery('.accordeon__item-title').click(function(event) {
  jQuery(this).closest('.accordeon__item').addClass('expanded').siblings('.accordeon__item').removeClass('expanded').find('.accordeon__item-text').slideUp();

  jQuery(this).siblings('.accordeon__item-text').slideDown();
});


jQuery('.select-imitation').click(function(e) {
  if(!jQuery(e.target).closest('ul').length){
    jQuery('.select-imitation').removeClass('active');
    jQuery(this).addClass('active');
  }
});

jQuery('.select-imitation li').click(function(e) {
  var $val = jQuery(this).closest('.select-imitation__dropdown').siblings('.select-imitation__value');

  var text = jQuery(this).text();

  $val.text(text);
  jQuery(this).closest('.select-imitation').removeClass('active');
});


jQuery('.menu-holder a').click(function(e) {
  e.preventDefault();
  jQuery(this).closest('li').addClass('active').siblings('li').removeClass('active');
  var target = jQuery(this).attr('href');
  jQuery(target).slideDown().siblings('.page-item').slideUp();
});

jQuery('.cta__item').click(function(e) {
  e.preventDefault();
  jQuery(this).closest('.cta__item').addClass('active').siblings('.cta__item').removeClass('active');

  var target = jQuery(this).closest('.cta__item').data('target');

  jQuery('.book-form-holder').addClass('hidden');
  jQuery('.'+target).removeClass('hidden');
  jQuery('#cta1').slideUp();
  jQuery('#cta2').css({'display': 'none'}).removeClass('hidden').slideDown();
});

jQuery('.cta__category').click(function(event) {

  if(!jQuery('#cta1').is(':visible')){
    jQuery('#cta1').slideDown();
    jQuery('#cta2').slideUp();
  }
});

// jQuery('#cta2 button').click(function(e) {
//   e.preventDefault();
//   jQuery('#cta2').slideUp();
//   jQuery('#cta3').css({'display': 'none'}).removeClass('hidden').slideDown();
// });



jQuery('.tabs__header-item').click(function(e) {
  e.preventDefault();
  jQuery(this).closest('a').addClass('active').siblings('a').removeClass('active');
  var target = jQuery(this).attr('href');
  jQuery(target).slideDown().siblings('.tabs__body-item').slideUp();
});
var Cookie =
{
   set: function(name, value, days)
   {
      var domain, domainParts, date, expires, host;

      if (days)
      {
         date = new Date();
         date.setTime(date.getTime()+(days*24*60*60*1000));
         expires = "; expires="+date.toGMTString();
      }
      else
      {
         expires = "";
      }

      host = location.host;
      if (host.split('.').length === 1)
      {
         // no "." in a domain - it's localhost or something similar
         document.cookie = name+"="+value+expires+"; path=/";
      }
      else
      {
         // Remember the cookie on all subdomains.
          //
         // Start with trying to set cookie to the top domain.
         // (example: if user is on foo.com, try to set
         //  cookie to domain ".com")
         //
         // If the cookie will not be set, it means ".com"
         // is a top level domain and we need to
         // set the cookie to ".foo.com"
         domainParts = host.split('.');
         domainParts.shift();
         domain = '.'+domainParts.join('.');

         document.cookie = name+"="+value+expires+"; path=/; domain="+domain;

         // check if cookie was successfuly set to the given domain
         // (otherwise it was a Top-Level Domain)
         if (Cookie.get(name) == null || Cookie.get(name) != value)
         {
            // append "." to current domain
            domain = '.'+host;
            document.cookie = name+"="+value+expires+"; path=/; domain="+domain;
         }
      }
   },

   get: function(name)
   {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i=0; i < ca.length; i++)
      {
         var c = ca[i];
         while (c.charAt(0)==' ')
         {
            c = c.substring(1,c.length);
         }

         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
      }
      return null;
   },

   erase: function(name)
   {
      Cookie.set(name, '', -1);
   }
};
// Call & init
jQuery(document).ready(function(){
  jQuery('.ba-slider').each(function(){
    var cur = jQuery(this);
    // Adjust the slider
    var width = cur.width()+'px';
    cur.find('.resize img').css('width', width);
    // Bind dragging events
    drags(cur.find('.handle'), cur.find('.resize'), cur);
  });
});

// Update sliders on resize.
// Because we all do this: i.imgur.com/YkbaV.gif
jQuery(window).resize(function(){
  jQuery('.ba-slider').each(function(){
    var cur = jQuery(this);
    var width = cur.width()+'px';
    cur.find('.resize img').css('width', width);
  });
});

function drags(dragElement, resizeElement, container) {

  // Initialize the dragging event on mousedown.
  dragElement.on('mousedown touchstart', function(e) {

    dragElement.addClass('draggable');
    resizeElement.addClass('resizable');

    // Check if it's a mouse or touch event and pass along the correct value
    var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

    // Get the initial position
    var dragWidth = dragElement.outerWidth(),
        posX = dragElement.offset().left + dragWidth - startX,
        containerOffset = container.offset().left,
        containerWidth = container.outerWidth();

    // Set limits
    minLeft = containerOffset + 10;
    maxLeft = containerOffset + containerWidth - dragWidth - 10;

    // Calculate the dragging distance on mousemove.
    dragElement.parents().on("mousemove touchmove", function(e) {

      // Check if it's a mouse or touch event and pass along the correct value
      var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

      leftValue = moveX + posX - dragWidth;

      // Prevent going off limits
      if ( leftValue < minLeft) {
        leftValue = minLeft;
      } else if (leftValue > maxLeft) {
        leftValue = maxLeft;
      }

      // Translate the handle's left value to masked divs width.
      widthValue = (leftValue + dragWidth/2 - containerOffset)*100/containerWidth+'%';

      // Set the new values for the slider and the handle.
      // Bind mouseup events to stop dragging.
      jQuery('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function () {
        jQuery(this).removeClass('draggable');
        resizeElement.removeClass('resizable');
      });
      jQuery('.resizable').css('width', widthValue);
    }).on('mouseup touchend touchcancel', function(){
      dragElement.removeClass('draggable');
      resizeElement.removeClass('resizable');
    });
    e.preventDefault();
  }).on('mouseup touchend touchcancel', function(e){
    dragElement.removeClass('draggable');
    resizeElement.removeClass('resizable');
  });
}




jQuery(document).ready(function(){
  jQuery('.page-item').each(function(index, el) {
    var display = jQuery(el).data('display');
    jQuery(el).css({'display': display});
    jQuery(el).addClass('show');
  });
})
function show_popup(id){
  jQuery('#'+id).addClass('shown');
}

jQuery(document.body).on('click','.icon-close',function(){
  jQuery(this).closest('.popup').removeClass('shown');
})
jQuery(document.body).on('click','.popup',function(e){

  if(!jQuery(e.target).closest('.popup-inner').length){

    jQuery(this).closest('.popup').removeClass('shown');
  }
})