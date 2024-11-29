<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const isVisible = dropdown.style.display === 'block';
        document.querySelectorAll('.dropdown-content').forEach(el => el.style.display = 'none');
        dropdown.style.display = isVisible ? 'none' : 'block';
    }

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.style.width = sidebar.style.width === '250px' ? '0' : '250px';
    }

    $(document).ready(function(){
        $('.carousel').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        });
    });

    function openSidebar() {
        document.getElementById('sidebar').style.width = '250px';
    }

    
    function closeSidebar() { 
        showMainMenu();
        document.getElementById('sidebar').style.width = '0';
    }

    function showMainMenu() {
        document.getElementById('boys-menu').style.display = 'none';
        document.getElementById('girls-menu').style.display = 'none';
        document.getElementById('newborns-menu').style.display = 'none';
        document.getElementById('main-menu').style.display = 'block';
        document.getElementById('back-button').style.display = 'none';
    }

    function showBoysMenu() {
        document.getElementById('boys-menu').style.display = 'block';
        document.getElementById('girls-menu').style.display = 'none';
        document.getElementById('newborns-menu').style.display = 'none';
        document.getElementById('main-menu').style.display = 'none';
        document.getElementById('back-button').style.display = 'block';
    }

    function showGirlsMenu() {
        document.getElementById('girls-menu').style.display = 'block';
        document.getElementById('boys-menu').style.display = 'none';
        document.getElementById('newborns-menu').style.display = 'none';
        document.getElementById('main-menu').style.display = 'none';
        document.getElementById('back-button').style.display = 'block';
    }

    function showNewbornsMenu() {
        document.getElementById('newborns-menu').style.display = 'block';
        document.getElementById('boys-menu').style.display = 'none';
        document.getElementById('girls-menu').style.display = 'none';
        document.getElementById('main-menu').style.display = 'none';
        document.getElementById('back-button').style.display = 'block';
    }
    function toggleSubcategory(element) {
        const subcategory = element.querySelector('.subcategory');
        if (subcategory) {
            const isVisible = subcategory.style.display === 'block';
            subcategory.style.display = isVisible ? 'none' : 'block';
            element.classList.toggle('active', !isVisible);
        }
    }
</script> 