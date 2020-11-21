const handleSumbit = () => {
  const img = document.getElementById('img');
  const width = document.getElementsByClassName("width-settings")[0].value + "px";
  const height = document.getElementsByClassName("height-settings")[0].value + "px";
  const altText = document.getElementsByClassName("alt-text")[0].value
  const borderWidth = document.getElementsByClassName("border-width")[0].value + "px";
  const border = `solid ${borderWidth} rgb(8, 88, 88)`;
  img.style.width = width;
  img.style.height = height;
  img.style.border = border;
  img.setAttribute("alt", altText.toString());
}

const handleSelect = () => {
  const sel = document.getElementById('selector').selectedIndex;
  const options = document.getElementById('selector').options;
  const img = document.getElementById('img');
  const newImg = new Image();
  newImg.src = options[sel].value;

  newImg.onload = () => {
    img.setAttribute("src", options[sel].value);
  }
}