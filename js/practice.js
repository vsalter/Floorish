// JavaScript Document

function openNav() {
  document.getElementById("sidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("sidenav").style.width = "0";
}

function showCart() {
	document.getElementById("cart").style.width = "40%";
	document.getElementById("cart").style.height = "100%";
}

function closeCart() {
	document.getElementById("cart").style.width = "0";
	document.getElementById("cart").style.height = "0";
}

var menu = document.getElementById('navMenu');
menu.onclick = openNav;

var closeMenu = document.getElementById('menuClosebtn');
closeMenu.onclick = closeNav;

var cart = document.getElementById('shoppingCart');
cart.onclick = showCart;

var closeShoppingCart = document.getElementById('cartClosebtn');
closeShoppingCart.onclick = closeCart;
