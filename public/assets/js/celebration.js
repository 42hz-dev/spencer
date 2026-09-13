(() => {
  const dialog = document.querySelector('[data-celebration]');
  const cake = document.querySelector('[data-cake]');
  if (!dialog || !cake) return;

  const canvas = dialog.querySelector('.celebration__sky');
  const ctx = canvas.getContext('2d');
  const photos = [...dialog.querySelectorAll('.celebration__photo')];
  const messages = [...dialog.querySelectorAll('[data-message]')];
  const reducedMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

  const COLORS = ['#B89B5E', '#E7C98A', '#F3EDE2', '#FF8A6B', '#7FB39A', '#FFFFFF'];
  const FOCAL = 600;      // 원근 투영 초점거리
  const GRAVITY = 0.14;
  const DRAG = 0.965;

  let particles = [];
  let frame = 0;
  let timers = [];

  const later = (fn, ms) => timers.push(setTimeout(fn, ms));

  const resize = () => {
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    canvas.width = innerWidth * dpr;
    canvas.height = innerHeight * dpr;
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  };

  // 한 지점에서 3D 구 모양으로 컨페티와 불꽃을 흩뿌린다
  const burst = () => {
    const ox = innerWidth * (0.15 + Math.random() * 0.7);
    const oy = innerHeight * (0.15 + Math.random() * 0.45);
    const power = 7 + Math.random() * 5;

    for (let i = 0; i < 110; i++) {
      const theta = Math.random() * Math.PI * 2;
      const phi = Math.acos(2 * Math.random() - 1);
      const speed = power * (0.35 + Math.random() * 0.65);
      particles.push({
        ox, oy, x: 0, y: 0, z: 0,
        vx: speed * Math.sin(phi) * Math.cos(theta),
        vy: speed * Math.sin(phi) * Math.sin(theta) - 2,
        vz: speed * Math.cos(phi) * 2.5,
        size: 5 + Math.random() * 7,
        color: COLORS[(Math.random() * COLORS.length) | 0],
        angle: Math.random() * Math.PI,
        spin: (Math.random() - 0.5) * 0.4,
        confetti: Math.random() < 0.65,
        life: 1,
        decay: 0.006 + Math.random() * 0.008,
      });
    }
  };

  // 한 프레임 진행 후 그린다. 사라진 파티클이면 false
  const step = (p) => {
    p.vx *= DRAG;
    p.vy = p.vy * DRAG + GRAVITY;
    p.vz *= DRAG;
    p.x += p.vx;
    p.y += p.vy;
    p.z = Math.max(p.z + p.vz, -FOCAL * 0.6);
    p.angle += p.spin;
    p.life -= p.decay;

    const scale = FOCAL / (FOCAL + p.z);
    const px = p.ox + p.x * scale;
    const py = p.oy + p.y * scale;
    if (p.life <= 0 || py > innerHeight + 40) return false;

    ctx.globalAlpha = Math.min(1, p.life * 1.4) * Math.min(1, scale);
    ctx.fillStyle = p.color;
    ctx.save();
    ctx.translate(px, py);
    if (p.confetti) {
      ctx.rotate(p.angle);
      ctx.scale(1, Math.cos(p.angle * 1.7));   // 뒤집히는 종이 느낌
      ctx.fillRect((-p.size * scale) / 2, (-p.size * scale) / 4, p.size * scale, (p.size * scale) / 2);
    } else {
      ctx.beginPath();
      ctx.arc(0, 0, p.size * 0.3 * scale, 0, Math.PI * 2);
      ctx.fill();
    }
    ctx.restore();
    return true;
  };

  const loop = () => {
    ctx.clearRect(0, 0, innerWidth, innerHeight);
    particles = particles.filter(step);
    frame = particles.length > 0 ? requestAnimationFrame(loop) : 0;
  };

  const popSeries = (count) => {
    if (reducedMotion) return;
    for (let i = 0; i < count; i++) {
      later(() => {
        burst();
        if (!frame) frame = requestAnimationFrame(loop);
      }, i * 450);
    }
  };

  const showMessage = (index) => {
    messages.forEach((message, i) => {
      message.classList.toggle('is-active', i === index);
      message.classList.toggle('is-leaving', i < index);
      message.classList.toggle('is-final', i === index && i === messages.length - 1);
    });
  };

  const reset = () => {
    timers.forEach(clearTimeout);
    timers = [];
    cancelAnimationFrame(frame);
    frame = 0;
    particles = [];
    ctx.clearRect(0, 0, innerWidth, innerHeight);
    photos.forEach((photo) => photo.classList.remove('is-popped'));
    messages.forEach((message) => message.classList.remove('is-active', 'is-leaving', 'is-final'));
  };

  const open = () => {
    reset();
    resize();
    dialog.showModal();
    popSeries(5);
    photos.forEach((photo, i) => later(() => photo.classList.add('is-popped'), 250 + i * 220));
    messages.forEach((_, i) => later(() => showMessage(i), 300 + i * 1600));
  };

  // 닫힌 dialog 안의 lazy 이미지는 받지 않으므로, 첫 촛불을 끌 때 미리 받아둔다
  cake.addEventListener('click', () => {
    dialog.querySelectorAll('img').forEach((img) => { img.loading = 'eager'; });
  }, { once: true });

  cake.addEventListener('wished', () => later(open, 700));
  dialog.querySelector('[data-again]').addEventListener('click', () => popSeries(4));
  dialog.querySelector('[data-close]').addEventListener('click', () => dialog.close());
  dialog.addEventListener('close', reset);
  window.addEventListener('resize', () => dialog.open && resize());
})();
