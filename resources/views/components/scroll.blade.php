
<button onclick="scrollToTop()" id="scrollToTopBtn"
    class="hidden bg-gray-100 font-bold px-4 py-4 rounded-full shadow-2xl shadow-black 
     fixed bottom-8 right-8 hover:animate-bounce duration-500">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00000" class="bi bi-arrow-up-short"
        viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5" />
    </svg>
</button>

<script>
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    window.onscroll = function() {
        var scrollToTopBtn = document.getElementById('scrollToTopBtn');

        if (window.pageYOffset > window.innerHeight / 2) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    };
</script>
