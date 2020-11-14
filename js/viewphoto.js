var photoTrigger = document.getElementById("thePhoto");
//see backgroung image
var ImagePath = photoTrigger.getAttribute("imgsrc");
photoTrigger.style.backgroundImage ='url('+ImagePath+')';