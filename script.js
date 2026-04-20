document.addEventListener('DOMContentLoaded', () => {
    const loginCard = document.getElementById('login-card');
    const registerCard = document.getElementById('register-card');
    
    // Switch between forms
    document.getElementById('toRegister').addEventListener('click', (e) => {
        e.preventDefault();
        loginCard.classList.add('hidden');
        registerCard.classList.remove('hidden');
    });

    document.getElementById('toLogin').addEventListener('click', (e) => {
        e.preventDefault();
        registerCard.classList.add('hidden');
        loginCard.classList.remove('hidden');
    });

    // Handle Login Submission
    document.getElementById('loginForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const user = document.getElementById('loginUser').value;
        alert(`Welcome back, ${user}!`);
    });

    // Handle Registration Submission
    document.getElementById('registrationForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const firstName = document.getElementById('fName').value;
        const dept = document.getElementById('dept').options[document.getElementById('dept').selectedIndex].text;
        
        alert(`Account created successfully for ${firstName} in the ${dept} department!`);
        
        // Return to login after success
        registerCard.classList.add('hidden');
        loginCard.classList.remove('hidden');
    });
});