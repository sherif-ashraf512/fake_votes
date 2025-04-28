// Navbar start
document.addEventListener('DOMContentLoaded', function() {
  const navLinks = document.querySelectorAll('#navbarLinks .nav-link');
  
  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      // Remove 'active' class from all links
      navLinks.forEach(item => item.classList.remove('active'));
      
      // Add 'active' to the clicked link
      this.classList.add('active');
      this.setAttribute('aria-current', 'page');
    });
  });
});
// وظيفة تغيير الوضع الليلي
const darkModeToggle = document.getElementById('darkModeToggle');
const icon = darkModeToggle.querySelector('i');

// تحقق من التفضيل المحفوظ
if (localStorage.getItem('darkMode') === 'enabled') {
  document.body.classList.add('dark-mode');
  icon.classList.replace('fa-moon', 'fa-sun');
}

// حدث النقر على الأيقونة
darkModeToggle.addEventListener('click', function() {
  document.body.classList.toggle('dark-mode');
  
  if (document.body.classList.contains('dark-mode')) {
    icon.classList.replace('fa-moon', 'fa-sun');
    localStorage.setItem('darkMode', 'enabled');
  } else {
    icon.classList.replace('fa-sun', 'fa-moon');
    localStorage.setItem('darkMode', 'disabled');
  }
});
// Navbar end


function submitVote() {
    const options = document.getElementsByName("vote");
    let selected = false;
    for (let opt of options) {
      if (opt.checked) {
        selected = true;
        break;
      }
    }
    if (selected) {
      document.getElementById("thanksMessage").style.display = "block";
    } else {
      alert("من فضلك اختر خياراً قبل التصويت.");
    }
  }
  const images = [
    { id: 1, url: '../images/img/سس.png', title: 'صورة 1', votes: 0 },
    { id: 2, url: '../images/img/dd.png', title: 'صورة 2', votes: 0 },
    { id: 3, url: 'https://via.placeholder.com/300x200?text=صورة+3', title: 'صورة 3', votes: 0 },
    { id: 4, url: 'https://via.placeholder.com/300x200?text=صورة+4', title: 'صورة 4', votes: 0 }
];

// عرض الصور في المعرض
const gallery = document.getElementById('imageGallery');
const resultsContainer = document.getElementById('resultsContainer');

function renderGallery() {
    gallery.innerHTML = '';
    images.forEach(image => {
        const card = document.createElement('vote-NOOR');
        card.className = 'image-card';  
        
        card.innerHTML = `
            <img src="${image.url}" alt="${image.title}">
            <h3>${image.title}</h3>
            <div class="vote-count">الأصوات: ${image.votes}</div>
            <button class="vote-btn" onclick="voteForImage(${image.id})">صوت لهذه الصورة</button>
        `;
        
        gallery.appendChild(card);
    });
    
    updateResults();
}

// التصويت للصورة
function voteForImage(imageId) {
    const image = images.find(img => img.id === imageId);
    if (image) {
        image.votes++;
        renderGallery();
        saveVotes();
    }
}

// تحديث النتائج
function updateResults() {
    // ترتيب الصور حسب عدد الأصوات
    const sortedImages = [...images].sort((a, b) => b.votes - a.votes);
    
      let resultsHTML = '<h2>نتائج التصويت</h2>';       
    sortedImages.forEach(image => {
        resultsHTML += `<p>${image.title}: ${image.votes} صوت</p>`;
    });
    
    resultsContainer.innerHTML = resultsHTML;
}
// start carsuol
// JavaScript for Carousel Functionality
document.addEventListener('DOMContentLoaded', function() {
  const carousel = document.querySelector('.testimonial-carousel');
  const slides = document.querySelectorAll('.testimonial-slide');
  const prevBtn = document.querySelector('.prev-btn');
  const nextBtn = document.querySelector('.next-btn');
  const dotsContainer = document.querySelector('.carousel-dots');
  
  let currentIndex = 0;
  const slideCount = slides.length;
  
  // Create dots
  slides.forEach((_, index) => {
      const dot = document.createElement('span');
      dot.classList.add('dot');
      if (index === 0) dot.classList.add('active');
      dot.addEventListener('click', () => goToSlide(index));
      dotsContainer.appendChild(dot);
  });
  
  const dots = document.querySelectorAll('.dot');
  
  // Update carousel position
  function updateCarousel() {
      const slideWidth = slides[0].offsetWidth + 32; // including gap
      carousel.scrollTo({
          left: currentIndex * slideWidth,
          behavior: 'smooth'
      });
      
      // Update active dot
      dots.forEach((dot, index) => {
          dot.classList.toggle('active', index === currentIndex);
      });
  }
  
  // Go to specific slide
  function goToSlide(index) {
      currentIndex = index;
      updateCarousel();
  }
  
  // Next slide
  function nextSlide() {
      currentIndex = (currentIndex + 1) % slideCount;
      updateCarousel();
  }
  
  // Previous slide
  function prevSlide() {
      currentIndex = (currentIndex - 1 + slideCount) % slideCount;
      updateCarousel();
  }
  
  // Button event listeners
  nextBtn.addEventListener('click', nextSlide);
  prevBtn.addEventListener('click', prevSlide);
  
  // Auto-advance (optional)
  let autoSlide = setInterval(nextSlide, 5000);
  
  // Pause auto-advance on hover
  carousel.addEventListener('mouseenter', () => clearInterval(autoSlide));
  carousel.addEventListener('mouseleave', () => {
      autoSlide = setInterval(nextSlide, 5000);
  });
  
  // Handle window resize
  window.addEventListener('resize', updateCarousel);
});
// End carsoul