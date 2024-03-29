document.addEventListener('DOMContentLoaded', function() {
    var links = document.querySelectorAll('a');
  
    links.forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        var href = this.getAttribute('href');
        document.querySelector('.transition').classList.add('active');
  
        setTimeout(function() {
          window.location.href = href;
        }, 2000);
      });
    });
  });
  