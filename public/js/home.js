
        document.querySelector('.mobile-menu').addEventListener('click', function() {
    
            alert('Menu mobile akan ditampilkan di sini');
        });
      
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });