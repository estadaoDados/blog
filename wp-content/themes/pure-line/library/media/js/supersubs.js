
/*
 * Supersubs v0.2b - jQuery plugin
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 *
 * This plugin automatically adjusts submenu widths of suckerfish-style menus to that of
 * their longest list item children. If you use this, please expect bugs and report them
 * to the jQuery Google Group with the word 'Superfish' in the subject line.
 *
 */

(function(a){a.fn.supersubs=function(b){var c=a.extend({},a.fn.supersubs.defaults,b);return this.each(function(){var d=a(this);var e=a.meta?a.extend({},c,d.data()):c;var f=a('<li id="menu-fontsize">&#8212;</li>').css({padding:0,position:"absolute",top:"-999em",width:"auto"}).appendTo(d).width();a("#menu-fontsize").remove();$ULs=d.find("ul");$ULs.each(function(l){var k=$ULs.eq(l);var j=k.children();var g=j.children("a");var m=j.css("white-space","nowrap").css("float");var h=k.add(j).add(g).css({"float":"none",width:"auto"}).end().end()[0].clientWidth/f;h+=e.extraWidth;if(h>e.maxWidth){h=e.maxWidth}else{if(h<e.minWidth){h=e.minWidth}}h+="em";k.css("width",h);j.css({"float":m,width:"100%","white-space":"normal"}).each(function(){var n=a(">ul",this);var i=n.css("left")!==undefined?"left":"right";n.css(i,h)})})})};a.fn.supersubs.defaults={minWidth:9,maxWidth:25,extraWidth:0}})(jQuery);