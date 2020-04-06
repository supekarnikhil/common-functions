function stringToSlug(str) {
  return str
    .toLowerCase()
    .replace(/[.]+/g, " ")
    .replace(/[^\w ]+/g, "")
    .replace(/ +/g, "-");
}

function sentenceCase( str ) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

function kFormatter(num) {
  return Math.abs(num) > 999
    ? Math.sign(num) * (Math.abs(num) / 1000).toFixed(1) + "k"
    : Math.sign(num) * Math.abs(num);
}

function shuffleArray(array) {
  for (var i = array.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var temp = array[i];
    array[i] = array[j];
    array[j] = temp;
  }
  return array;
}

function uniqueArray(value, index, self) { 
  return self.indexOf(value) === index;
}

function removeNullFromArray(el) { 
  return ( el && el != null && el != '');
}

function copyTextToClipboard(text) {
    var dummy = document.createElement("textarea");
    dummy.style.height = 0;
    dummy.style.width = 0;
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.focus();
    dummy.select();
    dummy.setSelectionRange(0, 99999);
    document.execCommand('copy');
    document.body.removeChild(dummy);
}
