// DEFINING VARIABLES
const dvd = document.getElementById('DVD');
const furniture = document.getElementById('Furniture');
const book = document.getElementById('Book');

// SWITCH
function typeSwitcher(type){
  switch(type.value) {
    case "dvd":
      book.style.display = "none";
      furniture.style.display = "none";
      dvd.style.display = "block";
      break;
    case "furniture":
      book.style.display = "none";
      furniture.style.display = "block";
      dvd.style.display = "none";
      break;
    case "book":
      book.style.display = "block";
      furniture.style.display = "none";
      dvd.style.display = "none";
      break;
  }
}
