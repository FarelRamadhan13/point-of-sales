document.querySelectorAll('.counter-wrapper').forEach(counter => {
  const decrementButton = counter.querySelector('.decrement-button');
  const incrementButton = counter.querySelector('.increment-button');
  const input = counter.querySelector('.counter-input');

  decrementButton.addEventListener('click', () => {
    let value = parseInt(input.value);
    if (value > 0) {
      value--;
      input.value = value;
    }
  });

  incrementButton.addEventListener('click', () => {
    let value = parseInt(input.value);
    value++;
    input.value = value;
  });
});