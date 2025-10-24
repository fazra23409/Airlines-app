   
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                const returnInput = document.getElementById('return');
                if (tab.textContent === 'Pulang Pergi') {
                    returnInput.disabled = false;
                } else {
                    returnInput.disabled = true;
                }
            });
        });
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('departure').min = today;
        document.getElementById('return').min = today;
        document.querySelector('.search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Pencarian penerbangan sedang diproses...');
        });
        document.querySelectorAll('.book-btn').forEach(button => {
            button.addEventListener('click', function() {
                const routeTitle = this.closest('.route-card').querySelector('.route-title').textContent;
                alert(`Memproses pemesanan untuk: ${routeTitle}`);
            });
        });
        document.querySelector('.logout-btn').addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                alert('Anda telah berhasil logout');
            }
        });
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mobileMenu = document.querySelector('.mobile-menu');
        const closeSidebar = document.getElementById('closeSidebar');

        mobileMenu.addEventListener('click', () => {
            sidebar.classList.add('active');
            sidebarOverlay.classList.add('active');
            document.body.classList.add('sidebar-open');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.classList.remove('sidebar-open');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.classList.remove('sidebar-open');
        });
   