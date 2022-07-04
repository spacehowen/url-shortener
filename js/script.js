function share() {
	var url = document.getElementById("shareurl");
	url.select();
	url.setSelectionRange(0, 99999);
	document.execCommand("copy");
}