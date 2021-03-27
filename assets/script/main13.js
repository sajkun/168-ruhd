var animation_mixin;
var online_visit;
/*!
 * Masonry PACKAGED v4.2.2
 * Cascading grid layout library
 * https://masonry.desandro.com
 * MIT License
 * by David DeSandro
 */

!function(t,e){"function"==typeof define&&define.amd?define("jquery-bridget/jquery-bridget",["jquery"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("jquery")):t.jQueryBridget=e(t,t.jQuery)}(window,function(t,e){"use strict";function i(i,r,a){function h(t,e,n){var o,r="$()."+i+'("'+e+'")';return t.each(function(t,h){var u=a.data(h,i);if(!u)return void s(i+" not initialized. Cannot call methods, i.e. "+r);var d=u[e];if(!d||"_"==e.charAt(0))return void s(r+" is not a valid method");var l=d.apply(u,n);o=void 0===o?l:o}),void 0!==o?o:t}function u(t,e){t.each(function(t,n){var o=a.data(n,i);o?(o.option(e),o._init()):(o=new r(n,e),a.data(n,i,o))})}a=a||e||t.jQuery,a&&(r.prototype.option||(r.prototype.option=function(t){a.isPlainObject(t)&&(this.options=a.extend(!0,this.options,t))}),a.fn[i]=function(t){if("string"==typeof t){var e=o.call(arguments,1);return h(this,t,e)}return u(this,t),this},n(a))}function n(t){!t||t&&t.bridget||(t.bridget=i)}var o=Array.prototype.slice,r=t.console,s="undefined"==typeof r?function(){}:function(t){r.error(t)};return n(e||t.jQuery),i}),function(t,e){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",e):"object"==typeof module&&module.exports?module.exports=e():t.EvEmitter=e()}("undefined"!=typeof window?window:this,function(){function t(){}var e=t.prototype;return e.on=function(t,e){if(t&&e){var i=this._events=this._events||{},n=i[t]=i[t]||[];return-1==n.indexOf(e)&&n.push(e),this}},e.once=function(t,e){if(t&&e){this.on(t,e);var i=this._onceEvents=this._onceEvents||{},n=i[t]=i[t]||{};return n[e]=!0,this}},e.off=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var n=i.indexOf(e);return-1!=n&&i.splice(n,1),this}},e.emitEvent=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){i=i.slice(0),e=e||[];for(var n=this._onceEvents&&this._onceEvents[t],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(t,r),delete n[r]),r.apply(this,e)}return this}},e.allOff=function(){delete this._events,delete this._onceEvents},t}),function(t,e){"function"==typeof define&&define.amd?define("get-size/get-size",e):"object"==typeof module&&module.exports?module.exports=e():t.getSize=e()}(window,function(){"use strict";function t(t){var e=parseFloat(t),i=-1==t.indexOf("%")&&!isNaN(e);return i&&e}function e(){}function i(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0;u>e;e++){var i=h[e];t[i]=0}return t}function n(t){var e=getComputedStyle(t);return e||a("Style returned "+e+". Are you running this code in a hidden iframe on Firefox? See https://bit.ly/getsizebug1"),e}function o(){if(!d){d=!0;var e=document.createElement("div");e.style.width="200px",e.style.padding="1px 2px 3px 4px",e.style.borderStyle="solid",e.style.borderWidth="1px 2px 3px 4px",e.style.boxSizing="border-box";var i=document.body||document.documentElement;i.appendChild(e);var o=n(e);s=200==Math.round(t(o.width)),r.isBoxSizeOuter=s,i.removeChild(e)}}function r(e){if(o(),"string"==typeof e&&(e=document.querySelector(e)),e&&"object"==typeof e&&e.nodeType){var r=n(e);if("none"==r.display)return i();var a={};a.width=e.offsetWidth,a.height=e.offsetHeight;for(var d=a.isBorderBox="border-box"==r.boxSizing,l=0;u>l;l++){var c=h[l],f=r[c],m=parseFloat(f);a[c]=isNaN(m)?0:m}var p=a.paddingLeft+a.paddingRight,g=a.paddingTop+a.paddingBottom,y=a.marginLeft+a.marginRight,v=a.marginTop+a.marginBottom,_=a.borderLeftWidth+a.borderRightWidth,z=a.borderTopWidth+a.borderBottomWidth,E=d&&s,b=t(r.width);b!==!1&&(a.width=b+(E?0:p+_));var x=t(r.height);return x!==!1&&(a.height=x+(E?0:g+z)),a.innerWidth=a.width-(p+_),a.innerHeight=a.height-(g+z),a.outerWidth=a.width+y,a.outerHeight=a.height+v,a}}var s,a="undefined"==typeof console?e:function(t){console.error(t)},h=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"],u=h.length,d=!1;return r}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("desandro-matches-selector/matches-selector",e):"object"==typeof module&&module.exports?module.exports=e():t.matchesSelector=e()}(window,function(){"use strict";var t=function(){var t=window.Element.prototype;if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0;i<e.length;i++){var n=e[i],o=n+"MatchesSelector";if(t[o])return o}}();return function(e,i){return e[t](i)}}),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["desandro-matches-selector/matches-selector"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.matchesSelector)}(window,function(t,e){var i={};i.extend=function(t,e){for(var i in e)t[i]=e[i];return t},i.modulo=function(t,e){return(t%e+e)%e};var n=Array.prototype.slice;i.makeArray=function(t){if(Array.isArray(t))return t;if(null===t||void 0===t)return[];var e="object"==typeof t&&"number"==typeof t.length;return e?n.call(t):[t]},i.removeFrom=function(t,e){var i=t.indexOf(e);-1!=i&&t.splice(i,1)},i.getParent=function(t,i){for(;t.parentNode&&t!=document.body;)if(t=t.parentNode,e(t,i))return t},i.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},i.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},i.filterFindElements=function(t,n){t=i.makeArray(t);var o=[];return t.forEach(function(t){if(t instanceof HTMLElement){if(!n)return void o.push(t);e(t,n)&&o.push(t);for(var i=t.querySelectorAll(n),r=0;r<i.length;r++)o.push(i[r])}}),o},i.debounceMethod=function(t,e,i){i=i||100;var n=t.prototype[e],o=e+"Timeout";t.prototype[e]=function(){var t=this[o];clearTimeout(t);var e=arguments,r=this;this[o]=setTimeout(function(){n.apply(r,e),delete r[o]},i)}},i.docReady=function(t){var e=document.readyState;"complete"==e||"interactive"==e?setTimeout(t):document.addEventListener("DOMContentLoaded",t)},i.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var o=t.console;return i.htmlInit=function(e,n){i.docReady(function(){var r=i.toDashed(n),s="data-"+r,a=document.querySelectorAll("["+s+"]"),h=document.querySelectorAll(".js-"+r),u=i.makeArray(a).concat(i.makeArray(h)),d=s+"-options",l=t.jQuery;u.forEach(function(t){var i,r=t.getAttribute(s)||t.getAttribute(d);try{i=r&&JSON.parse(r)}catch(a){return void(o&&o.error("Error parsing "+s+" on "+t.className+": "+a))}var h=new e(t,i);l&&l.data(t,n,h)})})},i}),function(t,e){"function"==typeof define&&define.amd?define("outlayer/item",["ev-emitter/ev-emitter","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("ev-emitter"),require("get-size")):(t.Outlayer={},t.Outlayer.Item=e(t.EvEmitter,t.getSize))}(window,function(t,e){"use strict";function i(t){for(var e in t)return!1;return e=null,!0}function n(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}function o(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}var r=document.documentElement.style,s="string"==typeof r.transition?"transition":"WebkitTransition",a="string"==typeof r.transform?"transform":"WebkitTransform",h={WebkitTransition:"webkitTransitionEnd",transition:"transitionend"}[s],u={transform:a,transition:s,transitionDuration:s+"Duration",transitionProperty:s+"Property",transitionDelay:s+"Delay"},d=n.prototype=Object.create(t.prototype);d.constructor=n,d._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},d.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},d.getSize=function(){this.size=e(this.element)},d.css=function(t){var e=this.element.style;for(var i in t){var n=u[i]||i;e[n]=t[i]}},d.getPosition=function(){var t=getComputedStyle(this.element),e=this.layout._getOption("originLeft"),i=this.layout._getOption("originTop"),n=t[e?"left":"right"],o=t[i?"top":"bottom"],r=parseFloat(n),s=parseFloat(o),a=this.layout.size;-1!=n.indexOf("%")&&(r=r/100*a.width),-1!=o.indexOf("%")&&(s=s/100*a.height),r=isNaN(r)?0:r,s=isNaN(s)?0:s,r-=e?a.paddingLeft:a.paddingRight,s-=i?a.paddingTop:a.paddingBottom,this.position.x=r,this.position.y=s},d.layoutPosition=function(){var t=this.layout.size,e={},i=this.layout._getOption("originLeft"),n=this.layout._getOption("originTop"),o=i?"paddingLeft":"paddingRight",r=i?"left":"right",s=i?"right":"left",a=this.position.x+t[o];e[r]=this.getXValue(a),e[s]="";var h=n?"paddingTop":"paddingBottom",u=n?"top":"bottom",d=n?"bottom":"top",l=this.position.y+t[h];e[u]=this.getYValue(l),e[d]="",this.css(e),this.emitEvent("layout",[this])},d.getXValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&!e?t/this.layout.size.width*100+"%":t+"px"},d.getYValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&e?t/this.layout.size.height*100+"%":t+"px"},d._transitionTo=function(t,e){this.getPosition();var i=this.position.x,n=this.position.y,o=t==this.position.x&&e==this.position.y;if(this.setPosition(t,e),o&&!this.isTransitioning)return void this.layoutPosition();var r=t-i,s=e-n,a={};a.transform=this.getTranslate(r,s),this.transition({to:a,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},d.getTranslate=function(t,e){var i=this.layout._getOption("originLeft"),n=this.layout._getOption("originTop");return t=i?t:-t,e=n?e:-e,"translate3d("+t+"px, "+e+"px, 0)"},d.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},d.moveTo=d._transitionTo,d.setPosition=function(t,e){this.position.x=parseFloat(t),this.position.y=parseFloat(e)},d._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},d.transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(t);var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var n=this.element.offsetHeight;n=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var l="opacity,"+o(a);d.enableTransition=function(){if(!this.isTransitioning){var t=this.layout.options.transitionDuration;t="number"==typeof t?t+"ms":t,this.css({transitionProperty:l,transitionDuration:t,transitionDelay:this.staggerDelay||0}),this.element.addEventListener(h,this,!1)}},d.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},d.onotransitionend=function(t){this.ontransitionend(t)};var c={"-webkit-transform":"transform"};d.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,n=c[t.propertyName]||t.propertyName;if(delete e.ingProperties[n],i(e.ingProperties)&&this.disableTransition(),n in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[n]),n in e.onEnd){var o=e.onEnd[n];o.call(this),delete e.onEnd[n]}this.emitEvent("transitionEnd",[this])}},d.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(h,this,!1),this.isTransitioning=!1},d._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var f={transitionProperty:"",transitionDuration:"",transitionDelay:""};return d.removeTransitionStyles=function(){this.css(f)},d.stagger=function(t){t=isNaN(t)?0:t,this.staggerDelay=t+"ms"},d.removeElem=function(){this.element.parentNode.removeChild(this.element),this.css({display:""}),this.emitEvent("remove",[this])},d.remove=function(){return s&&parseFloat(this.layout.options.transitionDuration)?(this.once("transitionEnd",function(){this.removeElem()}),void this.hide()):void this.removeElem()},d.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("visibleStyle");e[i]=this.onRevealTransitionEnd,this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0,onTransitionEnd:e})},d.onRevealTransitionEnd=function(){this.isHidden||this.emitEvent("reveal")},d.getHideRevealTransitionEndProperty=function(t){var e=this.layout.options[t];if(e.opacity)return"opacity";for(var i in e)return i},d.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("hiddenStyle");e[i]=this.onHideTransitionEnd,this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:e})},d.onHideTransitionEnd=function(){this.isHidden&&(this.css({display:"none"}),this.emitEvent("hide"))},d.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},n}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("outlayer/outlayer",["ev-emitter/ev-emitter","get-size/get-size","fizzy-ui-utils/utils","./item"],function(i,n,o,r){return e(t,i,n,o,r)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter"),require("get-size"),require("fizzy-ui-utils"),require("./item")):t.Outlayer=e(t,t.EvEmitter,t.getSize,t.fizzyUIUtils,t.Outlayer.Item)}(window,function(t,e,i,n,o){"use strict";function r(t,e){var i=n.getQueryElement(t);if(!i)return void(h&&h.error("Bad element for "+this.constructor.namespace+": "+(i||t)));this.element=i,u&&(this.$element=u(this.element)),this.options=n.extend({},this.constructor.defaults),this.option(e);var o=++l;this.element.outlayerGUID=o,c[o]=this,this._create();var r=this._getOption("initLayout");r&&this.layout()}function s(t){function e(){t.apply(this,arguments)}return e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e}function a(t){if("number"==typeof t)return t;var e=t.match(/(^\d*\.?\d*)(\w*)/),i=e&&e[1],n=e&&e[2];if(!i.length)return 0;i=parseFloat(i);var o=m[n]||1;return i*o}var h=t.console,u=t.jQuery,d=function(){},l=0,c={};r.namespace="outlayer",r.Item=o,r.defaults={containerStyle:{position:"relative"},initLayout:!0,originLeft:!0,originTop:!0,resize:!0,resizeContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}};var f=r.prototype;n.extend(f,e.prototype),f.option=function(t){n.extend(this.options,t)},f._getOption=function(t){var e=this.constructor.compatOptions[t];return e&&void 0!==this.options[e]?this.options[e]:this.options[t]},r.compatOptions={initLayout:"isInitLayout",horizontal:"isHorizontal",layoutInstant:"isLayoutInstant",originLeft:"isOriginLeft",originTop:"isOriginTop",resize:"isResizeBound",resizeContainer:"isResizingContainer"},f._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),n.extend(this.element.style,this.options.containerStyle);var t=this._getOption("resize");t&&this.bindResize()},f.reloadItems=function(){this.items=this._itemize(this.element.children)},f._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,n=[],o=0;o<e.length;o++){var r=e[o],s=new i(r,this);n.push(s)}return n},f._filterFindItemElements=function(t){return n.filterFindElements(t,this.options.itemSelector)},f.getItemElements=function(){return this.items.map(function(t){return t.element})},f.layout=function(){this._resetLayout(),this._manageStamps();var t=this._getOption("layoutInstant"),e=void 0!==t?t:!this._isLayoutInited;this.layoutItems(this.items,e),this._isLayoutInited=!0},f._init=f.layout,f._resetLayout=function(){this.getSize()},f.getSize=function(){this.size=i(this.element)},f._getMeasurement=function(t,e){var n,o=this.options[t];o?("string"==typeof o?n=this.element.querySelector(o):o instanceof HTMLElement&&(n=o),this[t]=n?i(n)[e]:o):this[t]=0},f.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},f._getItemsForLayout=function(t){return t.filter(function(t){return!t.isIgnored})},f._layoutItems=function(t,e){if(this._emitCompleteOnItems("layout",t),t&&t.length){var i=[];t.forEach(function(t){var n=this._getItemLayoutPosition(t);n.item=t,n.isInstant=e||t.isLayoutInstant,i.push(n)},this),this._processLayoutQueue(i)}},f._getItemLayoutPosition=function(){return{x:0,y:0}},f._processLayoutQueue=function(t){this.updateStagger(),t.forEach(function(t,e){this._positionItem(t.item,t.x,t.y,t.isInstant,e)},this)},f.updateStagger=function(){var t=this.options.stagger;return null===t||void 0===t?void(this.stagger=0):(this.stagger=a(t),this.stagger)},f._positionItem=function(t,e,i,n,o){n?t.goTo(e,i):(t.stagger(o*this.stagger),t.moveTo(e,i))},f._postLayout=function(){this.resizeContainer()},f.resizeContainer=function(){var t=this._getOption("resizeContainer");if(t){var e=this._getContainerSize();e&&(this._setContainerMeasure(e.width,!0),this._setContainerMeasure(e.height,!1))}},f._getContainerSize=d,f._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},f._emitCompleteOnItems=function(t,e){function i(){o.dispatchEvent(t+"Complete",null,[e])}function n(){s++,s==r&&i()}var o=this,r=e.length;if(!e||!r)return void i();var s=0;e.forEach(function(e){e.once(t,n)})},f.dispatchEvent=function(t,e,i){var n=e?[e].concat(i):i;if(this.emitEvent(t,n),u)if(this.$element=this.$element||u(this.element),e){var o=u.Event(e);o.type=t,this.$element.trigger(o,i)}else this.$element.trigger(t,i)},f.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},f.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},f.stamp=function(t){t=this._find(t),t&&(this.stamps=this.stamps.concat(t),t.forEach(this.ignore,this))},f.unstamp=function(t){t=this._find(t),t&&t.forEach(function(t){n.removeFrom(this.stamps,t),this.unignore(t)},this)},f._find=function(t){return t?("string"==typeof t&&(t=this.element.querySelectorAll(t)),t=n.makeArray(t)):void 0},f._manageStamps=function(){this.stamps&&this.stamps.length&&(this._getBoundingRect(),this.stamps.forEach(this._manageStamp,this))},f._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},f._manageStamp=d,f._getElementOffset=function(t){var e=t.getBoundingClientRect(),n=this._boundingRect,o=i(t),r={left:e.left-n.left-o.marginLeft,top:e.top-n.top-o.marginTop,right:n.right-e.right-o.marginRight,bottom:n.bottom-e.bottom-o.marginBottom};return r},f.handleEvent=n.handleEvent,f.bindResize=function(){t.addEventListener("resize",this),this.isResizeBound=!0},f.unbindResize=function(){t.removeEventListener("resize",this),this.isResizeBound=!1},f.onresize=function(){this.resize()},n.debounceMethod(r,"onresize",100),f.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},f.needsResizeLayout=function(){var t=i(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},f.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},f.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},f.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},f.reveal=function(t){if(this._emitCompleteOnItems("reveal",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.reveal()})}},f.hide=function(t){if(this._emitCompleteOnItems("hide",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.hide()})}},f.revealItemElements=function(t){var e=this.getItems(t);this.reveal(e)},f.hideItemElements=function(t){var e=this.getItems(t);this.hide(e)},f.getItem=function(t){for(var e=0;e<this.items.length;e++){var i=this.items[e];if(i.element==t)return i}},f.getItems=function(t){t=n.makeArray(t);var e=[];return t.forEach(function(t){var i=this.getItem(t);i&&e.push(i)},this),e},f.remove=function(t){var e=this.getItems(t);this._emitCompleteOnItems("remove",e),e&&e.length&&e.forEach(function(t){t.remove(),n.removeFrom(this.items,t)},this)},f.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="",this.items.forEach(function(t){t.destroy()}),this.unbindResize();var e=this.element.outlayerGUID;delete c[e],delete this.element.outlayerGUID,u&&u.removeData(this.element,this.constructor.namespace)},r.data=function(t){t=n.getQueryElement(t);var e=t&&t.outlayerGUID;return e&&c[e]},r.create=function(t,e){var i=s(r);return i.defaults=n.extend({},r.defaults),n.extend(i.defaults,e),i.compatOptions=n.extend({},r.compatOptions),i.namespace=t,i.data=r.data,i.Item=s(o),n.htmlInit(i,t),u&&u.bridget&&u.bridget(t,i),i};var m={ms:1,s:1e3};return r.Item=o,r}),function(t,e){"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("outlayer"),require("get-size")):t.Masonry=e(t.Outlayer,t.getSize)}(window,function(t,e){var i=t.create("masonry");i.compatOptions.fitWidth="isFitWidth";var n=i.prototype;return n._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns(),this.colYs=[];for(var t=0;t<this.cols;t++)this.colYs.push(0);this.maxY=0,this.horizontalColIndex=0},n.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}var n=this.columnWidth+=this.gutter,o=this.containerWidth+this.gutter,r=o/n,s=n-o%n,a=s&&1>s?"round":"floor";r=Math[a](r),this.cols=Math.max(r,1)},n.getContainerWidth=function(){var t=this._getOption("fitWidth"),i=t?this.element.parentNode:this.element,n=e(i);this.containerWidth=n&&n.innerWidth},n._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,i=e&&1>e?"round":"ceil",n=Math[i](t.size.outerWidth/this.columnWidth);n=Math.min(n,this.cols);for(var o=this.options.horizontalOrder?"_getHorizontalColPosition":"_getTopColPosition",r=this[o](n,t),s={x:this.columnWidth*r.col,y:r.y},a=r.y+t.size.outerHeight,h=n+r.col,u=r.col;h>u;u++)this.colYs[u]=a;return s},n._getTopColPosition=function(t){var e=this._getTopColGroup(t),i=Math.min.apply(Math,e);return{col:e.indexOf(i),y:i}},n._getTopColGroup=function(t){if(2>t)return this.colYs;for(var e=[],i=this.cols+1-t,n=0;i>n;n++)e[n]=this._getColGroupY(n,t);return e},n._getColGroupY=function(t,e){if(2>e)return this.colYs[t];var i=this.colYs.slice(t,t+e);return Math.max.apply(Math,i)},n._getHorizontalColPosition=function(t,e){var i=this.horizontalColIndex%this.cols,n=t>1&&i+t>this.cols;i=n?0:i;var o=e.size.outerWidth&&e.size.outerHeight;return this.horizontalColIndex=o?i+t:this.horizontalColIndex,{col:i,y:this._getColGroupY(i,t)}},n._manageStamp=function(t){var i=e(t),n=this._getElementOffset(t),o=this._getOption("originLeft"),r=o?n.left:n.right,s=r+i.outerWidth,a=Math.floor(r/this.columnWidth);a=Math.max(0,a);var h=Math.floor(s/this.columnWidth);h-=s%this.columnWidth?0:1,h=Math.min(this.cols-1,h);for(var u=this._getOption("originTop"),d=(u?n.top:n.bottom)+i.outerHeight,l=a;h>=l;l++)this.colYs[l]=Math.max(d,this.colYs[l])},n._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this._getOption("fitWidth")&&(t.width=this._getContainerFitWidth()),t},n._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},n.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!=this.containerWidth},i});

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

function play_video(url, event){

  event.preventDefault();
  if(!url) return;

  if(url.indexOf('youtu') >= 0){

    var _url = 'https://www.youtube.com/embed/';
    var parts = url.split('\/');

    var iframe = '<div class="popup-destroy"><div class="popup-destroy-inner"><i class="icon-close-destroy">×</i><iframe id="popup-iframe" src="'+_url+'/'+parts[parts.length -1]+'?autoplay=1&loop=0&rel=0&wmode=transparent" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div>';
  }

  jQuery('.site-container').append(iframe);

  jQuery('.site-container').find('#popup-iframe').on('load', function(){
    jQuery('.site-container').find('.popup-destroy').addClass('shown')
  });
}


jQuery(document).on('click', '.popup-destroy',function(e){
  if(!jQuery(e.target).closest('.popup-destroy-inner').length){
    jQuery('.site-container').find('.popup-destroy').removeClass('shown')

    setTimeout(function(){
      jQuery('.site-container').find('.popup-destroy').remove();
    },300);
  }
})


function init_blog_posts(){
  if(jQuery('.post-wrapper').length){
    var owl = jQuery('.post-wrapper .owl-carousel');

    owl.owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout : 100,
      autoWidth: true,
      margin:0,
      autoplaySpeed: 8000,
      fluidSpeed: 8000,
      smartSpeed: 8000,
      navSpeed: 8000,
      slideTransition: 'linear',
      // rewind: true,
      // rewindNav: true,
    })

    owl.on('translated.owl.carousel', function(){
      owl.trigger('next.owl.carousel');
    })
  }
}
jQuery('.dropdown-trigger').click(function(event) {
  jQuery(this).closest('.site-header').toggleClass('active');
  jQuery(this).closest('.site-header').toggleClass('contrast');
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

jQuery('.menu-holder li a').click(function(e) {
  var target = jQuery(this).attr('href');
  if(target.search('#') >= 0){
    e.preventDefault();

    jQuery(this).closest('li').addClass('active').siblings('li').removeClass('active');

      if(history.pushState) {
          history.pushState(null, null, target);
      }
      else {
          location.hash = target;
      }

    jQuery(target).slideDown().siblings('.page-item').slideUp();
  }
});

jQuery('#_cta1 .cta__item').click(function(e) {
  if(jQuery(this).hasClass('not-active')){
    return;
  }
  e.preventDefault();
  jQuery(this).closest('.cta__item').addClass('active').siblings('.cta__item').removeClass('active');

  var target = jQuery(this).closest('.cta__item').data('target');

  jQuery('#_cta2 .book-form-holder').addClass('hidden');
  jQuery('#_cta2 .'+target).removeClass('hidden');
  jQuery('#_cta1').slideUp();
  jQuery('#_cta2').css({'display': 'none'}).removeClass('hidden').slideDown();
});

jQuery('#cta1 .cta__item').click(function(e) {
  if(jQuery(this).hasClass('not-active')){
    return;
  }
  e.preventDefault();
  jQuery(this).closest('.cta__item').addClass('active').siblings('.cta__item').removeClass('active');

  var target = jQuery(this).closest('.cta__item').data('target');

  jQuery('#cta2 .book-form-holder').addClass('hidden');
  jQuery('#cta2 .'+target).removeClass('hidden');
  jQuery('#cta1').slideUp();
  jQuery('#cta2').css({'display': 'none'}).removeClass('hidden').slideDown();
});

jQuery('.cta__category').click(function(event) {

  if(!jQuery(this).siblings('#cta1').is(':visible')){
    jQuery('#cta1').slideDown();
    jQuery('#cta2').slideUp();
  }

   if(!jQuery(this).siblings('#_cta1').is(':visible')){
    jQuery('#_cta1').slideDown();
    jQuery('#_cta2').slideUp();
  }
});

jQuery('.tabs__header-item').click(function(e) {
  e.preventDefault();
  jQuery(this).closest('a').addClass('active').siblings('a').removeClass('active');
  var target = jQuery(this).attr('href');
  jQuery(target).slideDown().siblings('.tabs__body-item').slideUp();
});

jQuery(document).on('click', '.mobile-menu-toggle', function(){
  jQuery('.mobile-menu-wrapper').toggleClass('shown');
  jQuery(this).toggleClass('active');

  if(!jQuery('.site-header').hasClass('no-toggle')){
    jQuery('.site-header').toggleClass('contrast').toggleClass('contrast-header');
  }
})

jQuery(document).on('click', '.close-mobile-menu', function(){
  jQuery('.mobile-menu-wrapper').removeClass('shown');
})

jQuery(document).on('click', '.icon-close-destroy', function(){
    jQuery('.site-container').find('.popup-destroy').removeClass('shown')

    setTimeout(function(){
      jQuery('.site-container').find('.popup-destroy').remove();
    },300);
})

jQuery('.faq-item__title').click(function(event) {
  jQuery(this).toggleClass('active');
  jQuery(this).siblings('.faq-item__body').slideToggle();
  jQuery(this).closest('.faq-item').siblings('.faq-item').find('.faq-item__title').removeClass('active')
  jQuery(this).closest('.faq-item').siblings('.faq-item').find('.faq-item__body').slideUp();
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

  if(location.hash){
    jQuery('[href="'+location.hash+'"]').closest('li').addClass('active').siblings('li').removeClass('active');

    var target = location.hash;

    jQuery(target).slideDown().siblings('.page-item').slideUp();
      document.querySelector('.menu-holder').scrollIntoView({
          behavior: 'smooth'
      });
  }

  init_blog_posts();

  // jQuery('.masonry-gallery').masonry({
  //   itemSelector: '.grid-item',
  //   columnWidth: 266,
  //   // percentPosition: true
  // });

  var images = jQuery('.masonry-gallery').find('img');
  images.each( function(ind, el) {
    jQuery(el).on('load', function(){
      jQuery('.masonry-gallery').masonry({
        itemSelector: '.grid-item',
        columnWidth: 266,
        // percentPosition: true
      });
    })
  });

  if(location.hash != "#gallery"){
    jQuery('#gallery').slideUp();
  }
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
animation_mixin = {
  methods:{
   beforeEnter: function (el) {
      el.style.opacity = 0
    },

    enter_opacity: function (el, done) {
      const width = getComputedStyle(el).width;
      const height = getComputedStyle(el).height;

      el.style.width = width;
      el.style.position = 'absolute';
      el.style.width = height;
      el.style.visibility = 'hidden';


      el.style.width = null;
      el.style.position = null;
      el.style.visibility = null;
      el.style.height = 0;

      getComputedStyle(el).height;

      var delay = el.dataset.index * 150
      setTimeout(function () {
        Velocity(
          el,
          { opacity: 1, height: height },
          { complete: done }
        )
      }, delay)
    },

    leave_opacity: function (el, done) {
      var delay = el.dataset.index * 150
      setTimeout(function () {
        Velocity(
          el,
          { opacity: 0 },
          { complete: done }
        )
      }, delay)
    },

    enter_height: function (el, done) {
      const width = getComputedStyle(el).width;

      el.style.width = width;
      el.style.position = 'absolute';
      el.style.visibility = 'hidden';
      el.style.height = 'auto';

      const height = getComputedStyle(el).height;

      el.style.width = null;
      el.style.position = null;
      el.style.visibility = null;
      el.style.height = 0;

      getComputedStyle(el).height;

      var delay = el.dataset.index * 150
      setTimeout(function () {
        Velocity(
          el,
          { opacity: 1, height: height },
          { complete: done }
        )
      }, delay)
    },

    leave_height: function (el, done) {
      var delay = el.dataset.index * 150
      setTimeout(function () {
        Velocity(
          el,
          { opacity: 0, height: 0 },
          { complete: done }
        )
      }, delay)
    },

    enterAfter: function(el){
      el.style.height = 'auto';

      if(typeof(this.update_scroll)!=='undefined'){
        this.update_scroll();
      }
    },

    leaveAfter: function(el){
      if(typeof(this.update_scroll)!=='undefined'){
        this.update_scroll();
      }
    }
  }
}
Vue.component('load-item', {

  data: function(){
    return {
      src: '',
    };
  },

  mounted: function(){
    var vm = this;
    vm.init_drop_area();
  },

  methods:{
      init_drop_area: function(){
        var dropArea = this.$refs.drop_area;

        if(this.is_old_order){
          return;
        }

        if(this.is_downloaded){
          return;
        }

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
          dropArea.addEventListener(eventName, this.prevent_defaults, false)
        });

        ['dragenter', 'dragover'].forEach(eventName => {
          dropArea.addEventListener(eventName, this.highlight, false)
        })

        ;['dragleave', 'drop'].forEach(eventName => {
          dropArea.addEventListener(eventName, this.unhighlight, false)
        })

        dropArea.addEventListener('drop', this.handledrop, false);
      },


      prevent_defaults: function(e) {
        e.preventDefault()
        e.stopPropagation()
      },

      /**
      * adds highlight style for drag area
      */
      highlight: function(e) {
        this.$refs.drop_area.classList.add('highlight')
      },

      unhighlight: function(e) {
        this.$refs.drop_area.classList.remove('highlight')
      },

      /**
      * shows preview of a passed file
      *
      * @param file - file
      *
      * @return void;
      */
      preview_file: function(file) {
        let reader = new FileReader()
        reader.readAsDataURL(file)
        var vm = this;
        reader.onloadend = function() {
          let img = document.createElement('img')
          vm.src = reader.result
        }
      },

      /**
      * handles drop image in drag-n-drop area
      *
      * @param e - event
      */
      handledrop: function(e){
        let dt = e.dataTransfer;
        let files = dt.files;
        var items = dt.items;

        for(var file of files){
          if(file.type != 'image/jpeg' && file.type != "image/png"){
            continue;
          }

          this.preview_file(file);
          this.$emit('change_image_uploaded', {file: file});
        }
      },

      exec_file_change: function(e){
         this.$emit('change_image_uploaded', {file: e.target.files[0]});
         this.preview_file(e.target.files[0]);
      },
    },


  template: `
    <label class="upload-image-item" ref="drop_area">
      <span class="braket-tl"></span>
      <span class="braket-tr"></span>
      <span class="braket-bl"></span>
      <span class="braket-br"></span>
      <svg class="icon svg-icon-upload"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-upload"></use></svg>
      <input type="file" v-on:change="exec_file_change($event)">
      <img  :src="src" v-if="src">
    </label><!-- upload-image-item -->
  `,

})
if(document.getElementById('online-visit')){
  online_visit = new Vue({
    el: '#online-visit',

    mixins: [animation_mixin],

    data: {
      show: false,
      is_loaded: false,
      is_completed: false,
      show_sidebar: false,
      step: 1,
      journey_count: -1,

      customer_data: {
        first_name: '',
        last_name: '',
        phone: '',
        email: '',
        look_to_archive: '',
        confidence: '',
        checkup: '',
        how_ever: '',
        had_cosmetic: '',
        photo_1: '',
        photo_2: '',
        dropbox_path: '',
      },

      image_loaded:{
        photo_1: false,
        photo_2: false,
      },

      photo_1: '',
      photo_2: '',

      validation:{
        first_name: true,
        last_name: true,
        phone: true,
        email: true,
        confidence: '',
        checkup: '',
        how_ever: '',
        had_cosmetic: '',
      },

      alerts: [],
    },

    computed: {},

    watch: {

      // 'image_loaded.photo_1' : function(){
      //   var valid = true;

      //   for(var photo in this.image_loaded){
      //     valid = !this.image_loaded[photo] ? false : valid;
      //   }

      //   if(valid){
      //     this.send_create_leadrequest();
      //   }
      // },

      // 'image_loaded.photo_2' : function(){
      //   var valid = true;

      //   for(var photo in this.image_loaded){
      //     valid = !this.image_loaded[photo] ? false : valid;
      //   }

      //   if(valid){
      //     this.send_create_leadrequest();
      //   }
      // },

      'customer_data.look_to_archive': function(val){
        if(val){
          this.change_step('next');
        }
      },
      'customer_data.first_name': function(val){
        if(val){
          this.validation.first_name  = this.valid_name(val);
        }else{
          this.validation.first_name = false;
        }
      },

      'customer_data.last_name': function(val){
        if(val){
          this.validation.last_name  =this.valid_name(val);
        }else{
          this.validation.last_name = false;
        }
      },

      'customer_data.phone': function(val){
        if(val){
          this.validation.phone  = this.valid_phone(val);
        }else{
          this.validation.phone = false;
        }
      },

      'customer_data.email': function(val){
        if(val){
          this.validation.email = true;
        }else{
          this.validation.email = false;
        }
      },

      journey_count: function(val){
        var vm = this;
        if(val != -1){

          vm.customer_data
          vm.is_loaded = true;

          vm.customer_data.dropbox_path = '/' + online_journey_settings.folder + '/' + val + '/';

          setTimeout(function(){
            vm.show_sidebar = true;
          },500)
        }
      },

      show: function(show){
        var vm = this;
        if(!show){
          Vue.nextTick(function(){
            vm.resert_data();
          })
        }else{
          jQuery('#online-visit').removeClass('visuallyhidden')
          vm.get_journey_count();
        }
      },
    },

    mounted: function(){
      var vm = this;
      vm.$el.classList.remove('visuallyhidden');
    },


    methods: {
      change_step: function(val){
        var vm = this;
        switch(val){
          case 'next':

            if(!vm.validate(val)){
              vm.show_alerts();
              return;
            }

            var step = vm.step;
            step++;
            step = Math.min(4, step);
            vm.step = step;
            break;
          case 'prev':
           var step = vm.step;
            step--;
            step = Math.max(0, step);
            vm.step = step;
            break;
          default:
            vm.step = val;
            break;
        }
      },



      change_image_uploaded_cb: function(e, name){
        this[name] = e.file;
        this.customer_data[name] = '/' + online_journey_settings.folder + '/' + this.journey_count + '/' + e.file.name;

        this.upload_image_to_dropbox(this[name], this.customer_data[name],name);
      },


      get_journey_count: function(){
        var vm = this;

        jQuery.ajax({
          url: WP_URLS.wp_ajax_url,
          type: 'POST',
          dataType: 'json',
          data: {action: 'get_journey_count'},
        })
        .done(function(e) {
          vm.journey_count = e.count;
        })
        .fail(function() {
          console.log("error get_journey_count");
        })
        .always(function(e) {
          console.log(e);
        });
      },


      resert_data: function(){
        var vm = this;
        vm.is_loaded = false,
        vm.is_completed = false,
        vm.show_sidebar = false,
        vm.step = 1,
        vm.journey_count = 1,

        vm.image_loaded = {
          photo_1: false,
          photo_2: false,
        };

        vm.customer_data = {
          first_name: '',
          last_name: '',
          phone: '',
          email: '',
          look_to_archive: '',
          confidence: '',
          checkup: '',
          how_ever: '',
          had_cosmetic: '',
          photo_1: '',
          photo_2: '',
        };

        vm.photo_1 ='';
        vm.photo_2 = '';

        vm.validation = {
          first_name: true,
          last_name: true,
          phone: true,
          email: true,
          confidence: '',
          checkup: '',
          how_ever: '',
          had_cosmetic: '',
        };
      },


      send_create_leadrequest: function(){
        console.log('send_create_leadrequest');
        var vm = this;
        jQuery.ajax({
          url: WP_URLS.wp_ajax_url,
          type: 'POST',
          // contentType: "application/json",
          dataType: "json",
          data: {send_data: this.customer_data, action: 'send_create_journey_request'},
        })
        .done(function(e) {
          console.log("success");

          if(e.responce_code == 200){
            vm.is_completed = true;
            vm.is_loaded = true;

            setTimeout(function(){
              Vue.nextTick(function(){
                 vm.show=false;
              })
            }, 10000)
          }else{
            alert(e.responce_message);
            vm.show=false;
          }
        })
        .fail(function() {
          console.log("error");
        })
        .always(function(e) {
          console.log(e);
        });

      },


      set_status_class: function(name, mode){
        switch(mode){
          case 'class':
            return this.image_loaded[name] ?  'loaded' : 'not-loaded';
            break;
          case 'text':
            return this.image_loaded[name] ?  'Uploaded' : 'Not Uploaded';
            break;
        };
      },


      show_alerts: function(){
        var string = this.alerts.join('\n');

        if(string.length){
          alert(string);
          this.alerts = [];
        }
      },

      show_image_loaded: function(data){
        var data = JSON.stringify({
          "path": '/online journey/0/yAA5BtxSoHE.jpg'
        });

        var xhr = new XMLHttpRequest();

        xhr.addEventListener("readystatechange", function () {
          if (this.readyState === 4) {
            console.log(JSON.parse(this.responseText));
          }
        });


        xhr.open("POST", "https://api.dropboxapi.com/2/files/get_temporary_link", false);
        xhr.setRequestHeader("authorization", "Bearer "+ online_journey_settings.token);
        xhr.setRequestHeader("content-type", "application/json");
        xhr.setRequestHeader("cache-control", "no-cache");
        xhr.send(data);

        // var response = JSON.parse(xhr.responseText);
        // var img = "<img src='"+response.link+"'>"
        // this.$emit('show_image',{img: img});
      },


      submit_form: function(){
        var vm = this;
        if(!vm.validate(4)){
          vm.show_alerts();
          return;
        }

        vm.show_sidebar = false;

        setTimeout(function(){
          vm.is_loaded = false;
        },400)


        this.send_create_leadrequest();
      },

      upload_image_to_dropbox: function(file, path, name){
        var vm = this;

        var data = JSON.stringify({
          "path": path,
          "mode": "add",
          "autorename": true,
          "mute": false,
          "strict_conflict": false
        });

        var xhr = new XMLHttpRequest();
        var vm = this;

        xhr.addEventListener("readystatechange", function () {

          if (this.readyState === 4) {
            var data = JSON.parse(this.responseText);

            console.log('file was loaded' );
            console.log(data);

            vm.customer_data[name] = data.path_display;
            vm.image_loaded[name] = true;
          }

        });

        xhr.open("POST", "https://content.dropboxapi.com/2/files/upload");
        xhr.setRequestHeader("authorization", "Bearer "+ online_journey_settings.token);
        xhr.setRequestHeader("Dropbox-API-Arg", data);
        xhr.setRequestHeader("content-type", "application/octet-stream");

        xhr.upload.onprogress = function(event) {
          // var progress = parseInt((parseInt(event.loaded) / parseInt(event.total) )* 100);
          // item.show_progress(progress);
        };

        xhr.send(file);
      },


      valid_email: function(email) {
          const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(String(email).toLowerCase());
      },


      valid_name: function(val){
        var valid = val.search(/\d/g) < 0;
        valid = val.length == 0? false: valid;
        return valid;
      },


      valid_phone: function(val){
        var valid = true;
        valid = val.search(/[+]{0,1}[0-9]{1,10}/) >= 0;
        var limit = val.search(/[+]/) >=0 ? 13 : 11;
        valid = val.length > limit ?  false : valid;

        return valid;
      },

      validate: function(step){
        var valid = false;
        var may_be_step = this.step;

        // switch(step){
        //   case 'next':
        //     may_be_step++;
        //     break;
        //   case 'prev':
        //     may_be_step--;
        //     break;
        //   default:
        //     may_be_step = step;
        //     break;
        // }

        switch(may_be_step){
          case 1:
            this.validation.email = this.valid_email(this.customer_data.email);
            this.validation.first_name = this.valid_name(this.customer_data.first_name);
            this.validation.last_name = this.valid_name(this.customer_data.last_name);
            this.validation.phone = this.valid_phone(this.customer_data.phone);

            valid = this.validation.email && this.validation.first_name &&  this.validation.last_name &&  this.validation.phone;

            if(!this.validation.email){
              this.alerts.push('Email is not correct');
            }
            if(!this.validation.first_name){
              this.alerts.push('First name is not entered correctly');
            }
            if(!this.validation.last_name){
              this.alerts.push('Last name is not entered correctly');
            }
            if(!this.validation.email){
              this.alerts.push('Phone should contain only digits or "+" symbol');
            }
            break;
          case 2:
             valid = !this.customer_data.look_to_archive? false : true;

             if(!valid){
               this.alerts.push('Please, select what would you like to archive');
             }
            break;
          case 3:
            valid = !!this.image_loaded.photo_1 && !!this.image_loaded.photo_2;

             if(!valid && (!this.customer_data.photo_1 || !this.customer_data.photo_2)){
               this.alerts.push('Please, upload all photos before continue');
             }

             if(!valid && (this.customer_data.photo_1 && this.customer_data.photo_2)){
               this.alerts.push('Please wait for all images be uploaded');
             }
            break;
          case 4:
             valid = true;

             valid =  !!this.customer_data.confidence && !!this.customer_data.had_cosmetic && !!this.customer_data.checkup && !!this.customer_data.how_ever;
            break;
        }

        return valid;
      },


    },
  });
}

function show_online_visit(){
    online_visit.show = true;
}