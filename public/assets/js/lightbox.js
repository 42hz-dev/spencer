(() => {
  const dialog = document.getElementById('lightbox');
  const links = [...document.querySelectorAll('[data-lightbox]')];
  if (!dialog || links.length === 0) return;

  const image = dialog.querySelector('.lightbox__image');
  const meta = dialog.querySelector('.lightbox__meta');
  const ko = dialog.querySelector('.lightbox__ko');
  const en = dialog.querySelector('.lightbox__en');
  let index = 0;

  const show = (i) => {
    index = (i + links.length) % links.length;
    const link = links[index];
    image.src = link.href;
    image.alt = link.dataset.captionEn;
    meta.textContent = `${link.dataset.label} — ${index + 1} / ${links.length}`;
    ko.textContent = link.dataset.captionKo;
    en.textContent = link.dataset.captionEn;
  };

  links.forEach((link, i) => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      show(i);
      dialog.showModal();
    });
  });

  dialog.addEventListener('click', (event) => {
    const action = event.target.closest('[data-action]')?.dataset.action;
    if (action === 'prev') show(index - 1);
    else if (action === 'next') show(index + 1);
    else if (action === 'close' || event.target === dialog) dialog.close();
  });

  dialog.addEventListener('keydown', (event) => {
    if (event.key === 'ArrowLeft') show(index - 1);
    if (event.key === 'ArrowRight') show(index + 1);
  });

  dialog.addEventListener('close', () => image.removeAttribute('src'));
})();
