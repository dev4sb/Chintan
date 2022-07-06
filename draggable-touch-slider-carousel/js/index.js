var ul;
var liItems; 
var imageWidth;
var imageNumber;

function init(){

    ul = document.getElementById('image_slider');
    liItems = ul.children;
    imageNumber = liItems.length;
    imageWidth = liItems[0].children[0].offsetWidth;
    ul.style.width = parseInt(imageWidth * imageNumber) + 'px';
    slider(ul);
}