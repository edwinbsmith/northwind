
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('foundation-sites');
require('foundation-sites/js/foundation.abide');

$(document).foundation();

$(document).ready(function() {
   var stripeButton = $('.stripe-button-el');
   stripeButton.removeClass('stripe-button-el').addClass('button');
   stripeButton.html('Purchase your copy!');
});
