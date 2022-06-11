var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
	
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");

  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";

}

var prev = document.getElementById("prev");

if (prev.addEventListener) {
prev.addEventListener('click', function() {
	plusSlides(-1);
}, false);
} else {
	prev.attachEvent('onclick', function() {
		plusSlides(-1);
	});
}

var next = document.getElementById("next");

if (next.addEventListener) {
next.addEventListener('click', function() {
	plusSlides(1);
}, false);
} else {
	prev.attachEvent('onclick', function() {
		plusSlides(1);
	});
}

var slide1 = document.getElementById("slide1");

if (slide1.addEventListener) {
slide1.addEventListener('click', function() {
	currentSlide(1);
}, false);
} else {
	slide1.attachEvent('onclick', function() {
		currentSlide(1);
	});
}

var slide2 = document.getElementById("slide2");

if (slide2.addEventListener) {
slide2.addEventListener('click', function() {
	currentSlide(2);
}, false);
} else {
	slide2.attachEvent('onclick', function() {
		currentSlide(2);
	});
}

var slide3 = document.getElementById("slide3");

if (slide3.addEventListener) {
slide3.addEventListener('click', function() {
	currentSlide(3);
}, false);
} else {
	slide3.attachEvent('onclick', function() {
		currentSlide(3);
	});
}

var slide4 = document.getElementById("slide4");

if (slide4.addEventListener) {
slide4.addEventListener('click', function() {
	currentSlide(4);
}, false);
} else {
	slide4.attachEvent('onclick', function() {
		currentSlide(4);
	});
}

var slide5 = document.getElementById("slide5");

if (slide5.addEventListener) {
slide5.addEventListener('click', function() {
	currentSlide(5);
}, false);
} else {
	slide5.attachEvent('onclick', function() {
		currentSlide(5);
	});
}

var slide6 = document.getElementById("slide6");

if (slide6.addEventListener) {
slide6.addEventListener('click', function() {
	currentSlide(6);
}, false);
} else {
	slide6.attachEvent('onclick', function() {
		currentSlide(6);
	});
}