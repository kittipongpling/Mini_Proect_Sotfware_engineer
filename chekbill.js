// Shorten typing because I'm lazy
function qsa(el) { return document.querySelectorAll(el); }

// Restart animation button
function restart() { tl.restart(); }

var tl = new TimelineMax({ repeat: 0 });

// Elements to animate
var receipt = qsa('.receipt');
var greetingBorder = qsa('.header__border');
var greetingName = qsa('.header__name');
var greetingCount = qsa('.header__count');
var cart = qsa('.cart');
var barCode = qsa('.bar-code');
var cartHeader = qsa('.cart__header');
var listItems = qsa('.list__item');
var cartBorder = qsa('.cart__hr');
var total = qsa('.cart__total');

// Animation timeline
tl.fromTo(receipt, .5, {
		scale: 0,
		alpha: 0,
		transformOrigin: "50% 20%"
	}, {
		scale: 1,
		alpha: 1,
	})
	.from(greetingBorder, .5, {
		x: 15,
		autoAlpha: 0
	})
	.from(greetingName, .5, {
		y: 15,
	 	autoAlpha: 0
	}, '-=0.5')
	.from(greetingCount, .3, {
		y: 15,
		autoAlpha: 0
	}, '-=0.2')
	.addLabel('header')
	.fromTo(cart, .3, {
		rotationX: "-90deg",
		transformPerspective: 500,
		force3D: true,
		transformOrigin: "top center",
		transformStyle: "preserve-3d"	
	}, {
		transformPerspective: 500,
		rotationX: '0deg'
	})
	.fromTo(barCode, .3, {
		rotationX: "-90deg",
		transformPerspective: 500,
		force3D: true,
		transformOrigin: "top center",
		transformStyle: "preserve-3d"	
	}, {
		transformPerspective: 500,
		rotationX: '0deg'
	})
	.to(receipt, .5, {
		css: { 
			className: '+=receipt_hoverable'
		}
	})
	.from(cartHeader, .5, {
		y: 10,
		autoAlpha: 0
	}, '-=0.4')
	.staggerFrom(listItems, .5, {
		x: -10,
		autoAlpha: 0,
		ease: Power2.easeOut
	}, 0.3)
	.from(cartBorder, .5, {
		y: 25,
		autoAlpha: 0
	}, '-=0.3')
	.from(total, .5, {
		y: 50,
		autoAlpha: 0
	}, '-=.4');
