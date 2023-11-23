const input = document.getElementById('inp');
const notFound = document.getElementById('not-found');

input.addEventListener('input', function(event) {
  const searchTerm = event.target.value.toLowerCase();
  const products = document.getElementsByClassName('grid-product');
  let foundMatch = false;

  for (let i = 0; i < products.length; i++) {
    const productName = products[i].getElementsByTagName('h6')[0].innerText.toLowerCase();
    if (productName.includes(searchTerm)) {
      products[i].style.display = 'block';
      foundMatch = true;
    } else {
      products[i].style.display = 'none';
    }
  }

  if (foundMatch) {
    notFound.style.display = 'none';
  } else {
    notFound.style.display = 'block';
  }
});