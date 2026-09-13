(() => {
  const cards = document.querySelectorAll('.card');
  if (!('IntersectionObserver' in window) || matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const observer = new IntersectionObserver((entries) => {
    entries.filter((entry) => entry.isIntersecting).forEach((entry, i) => {
      const card = entry.target;
      card.style.transitionDelay = `${i * 90}ms`;
      card.classList.add('is-visible');
      card.addEventListener('transitionend', () => card.style.removeProperty('transition-delay'), { once: true });
      observer.unobserve(card);
    });
  }, { rootMargin: '0px 0px -8% 0px' });

  // JS가 동작할 때만 숨겼다가 보여준다
  cards.forEach((card) => {
    card.classList.add('reveal');
    observer.observe(card);
  });
})();
