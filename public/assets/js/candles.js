(() => {
  const cake = document.querySelector('[data-cake]');
  if (!cake) return;

  const candles = [...cake.querySelectorAll('.candle')];
  const relight = cake.querySelector('[data-relight]');

  candles.forEach((candle) => {
    candle.addEventListener('click', () => {
      candle.classList.add('is-out');
      candle.disabled = true;
      if (candles.every((c) => c.classList.contains('is-out'))) {
        cake.classList.add('is-wished');
        cake.dispatchEvent(new CustomEvent('wished'));
      }
    });
  });

  relight.addEventListener('click', () => {
    candles.forEach((c) => {
      c.classList.remove('is-out');
      c.disabled = false;
    });
    cake.classList.remove('is-wished');
  });
})();
