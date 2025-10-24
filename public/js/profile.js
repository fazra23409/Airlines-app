 document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');
            
            form.addEventListener('submit', function(e) {
                if (password.value && password.value !== passwordConfirmation.value) {
                    e.preventDefault();
                    alert('Password dan konfirmasi password tidak cocok!');
                    password.focus();
                }
            });
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
        });