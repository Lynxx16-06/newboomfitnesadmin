window.addEventListener('scroll', function() {
    const scrollbar = document.querySelector('.add-bar');
    const scroll = document.querySelector('.icon');

    if (window.scrollY > 100) {
        scrollbar.classList.add('active');
        scroll.classList.add('scroll');
    } else {
        scrollbar.classList.remove('active');
        scroll.classList.remove('scroll');
    };
});

// Select
function navigateToPage(select) {
    const selectedValue = select.value;
    console.log("Selected value:", selectedValue); 
    if (selectedValue) {
        window.location.href = selectedValue;
    } else {
        console.log ('error')
    }
  }