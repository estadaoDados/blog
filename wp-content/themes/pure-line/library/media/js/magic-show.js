//  MagicShow JavaScript fade-in/fade-out Script by Matthew Watson
//  Copyright 2010. All Rights Reserved.
// 
//  You are hereby given permission to use this script in either personal and commercial works
//  and edit it to fit your needs, but you are not permitted to distribute this script on your own site.
//  Please retain this segment of text in your JavaScript section along with the functions.
// 
//	If you use this script on your website, please post a link back to: http://www.webdesignamigo.com/
//  in order to give credit where credit is due. Thank you! 
//
//  If you'd like to change the speed of the fading, you can change the numbers below:

var openingdelay = 200; // Delay before fade in initiated (default is 200)
var closingdelay = 100; // Delay before fade out initiated (default is 100)
var openingspeed = 25; // Speed of fade in (default is 25)
var closingspeed = 15; // Speed of fade out (default is 15)

//  You really shouldn't edit anything below this line unless you have experience with JavaScript.    

function magicShow(elementid) {
	ele = document.getElementById(elementid);
		if(ele.style.display == 'none') {
			ele.style.opacity = 0;
			ele.style.filter = 'alpha(opacity=0)';
			ele.style.display = '';
			valueop = 1;
			setTimeout("fadeIn()", openingdelay); 
		} 
		else {
			valueop = 9; 
			setTimeout("fadeOut()", closingdelay); 
		}
}
		function fadeOut() {
		if(valueop < 1) {
		ele.style.display = 'none';
		return false;
		}
			ele.style.opacity = valueop/10;
			ele.style.filter = 'alpha(opacity='+(valueop*10)+')';
			valueop = valueop - 1;
			setTimeout("fadeOut()", closingspeed);
		}
		function fadeIn() {
		if(valueop > 10) { 
		return false;  
		}
			ele.style.opacity = valueop/10;
			ele.style.filter = 'alpha(opacity='+(valueop*10)+')';
			valueop = valueop + 1;
			setTimeout("fadeIn()", openingspeed);  
		} 
