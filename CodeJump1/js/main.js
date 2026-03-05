class HamburgerMenu {
    constructor(menu) {
      this.menu = menu;
      this.button = menu.querySelector('.hamburger');
      this.menuList = menu.querySelector('.menu-list');
      this.init();
    }
  
    init() {
      this.button.addEventListener('click', () => this.toggle());
    }
  
    open() {
      this.menu.classList.add('active');
    }
  
    close() {
      this.menu.classList.remove('active');
    }
  
    toggle() {
      this.menu.classList.toggle('active');
    }
  }
  
  document.querySelectorAll('.sp-menu')
    .forEach(menu => new HamburgerMenu(menu));