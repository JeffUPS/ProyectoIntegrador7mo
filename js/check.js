var discounted = document.getElementById('isDiscounted');
var no_discounted = document.getElementById('isNotDiscounted')
var discount_percentage = document.getElementById('discountPercentage')

function updateStatus() {
  if (discounted.checked) {
    discount_percentage.disabled = false;
  } else {
    discount_percentage.disabled = true;
  }
}

discounted.addEventListener('change', updateStatus)
no_discounted.addEventListener('change', updateStatus)