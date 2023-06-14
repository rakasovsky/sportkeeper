const elementD = document.getElementById('d');

function toggleScroll() {
  document.body.classList.toggle('no-scroll');
}

function checkScroll() {
  if (elementD.hasAttribute('open')) {
    toggleScroll();
  }
}

checkScroll();

// Добавить обработчик изменения атрибута 'open' для элемента d
const observer = new MutationObserver(function(mutations) {
  mutations.forEach(function(mutation) {
    if (mutation.attributeName === 'open') {
      checkScroll();
    }
  });
});

observer.observe(elementD, { attributes: true });


        // Плавный скролл

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
            window.scrollTo({
                top: target.offsetTop,
                behavior: 'smooth'
            });
            }
        });
        });