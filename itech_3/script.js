const handleSumbit = () => {
  const img = document.querySelector('#img');
  const width = document.querySelectorAll('.width-settings')[0].value + "px";
  const height = document.querySelectorAll('.height-settings')[0].value + "px";
  const altText = document.querySelectorAll('.alt-text')[0].value
  const borderWidth = document.querySelectorAll('.border-width')[0].value + "px";
  const border = `solid ${borderWidth} rgb(8, 88, 88)`;
  img.style.width = width;
  img.style.height = height;
  img.style.border = border;
  img.setAttribute('alt', altText.toString());
}

const handleSelect = () => {
  const sel = document.querySelector('#selector').selectedIndex;
  const options = document.querySelector('#selector').options;
  const img = document.querySelector('#img');
  const newImg = new Image();
  newImg.src = options[sel].value;

  newImg.onload = () => {
    img.setAttribute('src', options[sel].value);
  }
}