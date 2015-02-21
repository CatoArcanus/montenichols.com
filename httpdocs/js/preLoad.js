// JavaScript Document
// displays the content once page is loaded
displayContent = function () {
    document.getElementById("main").style.display = 'block';
    MM_preloadImages('./ui/default_proj.png', './ui/welcome.jpg', './ui/bottom_ui.png', './ui/banner_top.jpg', './art/3d/thumbs/001_lichKing.jpg', './art/3d/thumbs/001_lichKing_over.jpg');
}

// Hides content to prevent ugly loads
hideContent = function () {
    document.getElementById("main").style.display = 'none';
}