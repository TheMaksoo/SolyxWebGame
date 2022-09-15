function navhide() {
	var x = document.getElementById("nav");
	var y = document.getElementById("navbutton");
	if (x.style.display === "none") {
		x.style.display = "block";
		y.find("i").toggleClass("fa-solid fa-chevron-down");
	} else {
		x.style.display = "none";
		y.find("i").toggleClass("fa-solid fa-angle-up");
	}
	}