$(document).ready(function(){


$("#home a:contains('Home')").parent().addClass('active');
$("#about a:contains('About')").parent().addClass('active');
$("#register a:contains('Register')").parent().addClass('active');
$("#contact a:contains('Contact')").parent().addClass('active');


$('ul.nav li.dropdown').hover(function(){

$('.dropdown-menu', this).fadeIn();

}, function(){


$('.dropdown-menu', this).fadeOut('fast');


});//Hover




});