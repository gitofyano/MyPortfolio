document.addEventListener('click', (e) => {
    const link = e.target.closest('a[href^="#"]');
    if (!link) return;
  
    const hash = link.hash;
  
    if (hash === '#') {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
      return;
    }
  
    if (link.pathname !== location.pathname) return;
  
    const target = document.querySelector(hash);
    if (!target) return;
  
    e.preventDefault();
  
    target.scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  });