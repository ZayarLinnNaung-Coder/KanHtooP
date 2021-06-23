document.getElementById("show-icon").onclick = function() {
    document.getElementById("links").style.display = "block";
    this.style.display = "none";
    document.getElementById("hide-icon").style.display = "block";
};
document.getElementById("hide-icon").onclick = function() {
    document.getElementById("links").style.display = "none";
    this.style.display = "none";
    document.getElementById("show-icon").style.display = "block";
};
