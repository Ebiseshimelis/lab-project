document.addEventListener('DOMContentLoaded', () => {
    // Name Regex: Only letters, min 3 chars
    const nameRegex = /^[A-Za-z]{3,}$/;
    // Password Regex: 8+ chars, 1 letter, 1 number, 1 special char
    const passRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

    const regForm = document.getElementById('registrationForm');
    if(regForm) {
        regForm.onsubmit = (e) => {
            const fname = document.getElementById('fName').value.trim();
            const lname = document.getElementById('lName').value.trim();
            const dept = document.getElementById('dept').value;
            const gender = document.querySelector('input[name="gender"]:checked');
            const userEmail = document.getElementById('regEmail').value.trim();
            const password = document.getElementById('regPass').value;
            // 'Others' and hobbies are optional

            if (!fname || !lname || !dept || !gender || !userEmail || !password) {
                alert("All fields except 'Others' and 'Hobbies' must be filled.");
                e.preventDefault();
                return;
            }
            if (!nameRegex.test(fname) || !nameRegex.test(lname)) {
                alert("First and Last Name must be only letters and at least 3 characters long.");
                e.preventDefault();
                return;
            }
            if (!passRegex.test(password)) {
                alert("Password must be at least 8 characters, include a letter, a number, and a special character.");
                e.preventDefault();
                return;
            }
        };
    }

    const loginForm = document.getElementById('loginForm');
    if(loginForm) {
        loginForm.onsubmit = (e) => {
            const pass = document.getElementById('loginPass').value;
            if (!passRegex.test(pass)) {
                alert("Password must be 8+ characters and include a letter, number, and special character.");
                e.preventDefault();
            }
        };
    }
});