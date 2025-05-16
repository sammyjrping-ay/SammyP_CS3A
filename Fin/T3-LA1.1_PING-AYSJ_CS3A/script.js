// Array to store registered users
const users = [];

// Get the signup section element
const signup = document.getElementById('signup');

// Get the login section element
const login = document.getElementById('login');

// Get the success message section element
const success = document.getElementById('success');


function createUser() {
  // Get and trim input values from the form
  const username = document.getElementById('username-su').value.trim();
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password-su').value;
  const confirmPassword = document.getElementById('confirm-password').value;

  // Log input values for debugging
  console.log(username);
  console.log(email);
  console.log(password);
  console.log(confirmPassword);

  // Check if any field is empty
  if (!username || !email || !password || !confirmPassword) {
    alert('Please fill in all fields.');
    return;
  }

  // Check if passwords match
  if (password !== confirmPassword) {
    alert('Passwords do not match.');
    return;
  }

  // Create a new user object
  const newUser = {
    username,
    email,
    password 
  };

  // Add new user to the users array
  users.push(newUser);
  console.log('New user added:', newUser);
  console.log('All users:', users);

  // Switch from signup to login view
  signup.classList.toggle('hidden');
  login.classList.toggle('hidden');
}


function authUser() {
  // Get and trim username and password from the login form
  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value;

  // Check if fields are empty
  if (!username || !password) {
    alert('Please fill in all fields.');
    return;
  }

  // Find a user in the array that matches the entered credentials
  const foundUser = users.find(user => user.username === username && user.password === password);

  // If user is found, switch from login to success view
  if (foundUser) {
    login.classList.toggle('hidden');
    success.classList.toggle('hidden');
    console.log('Login successful!');
  } else {
    // Show error if credentials are invalid
    alert('Invalid username or password.');
  }
}


// Toggles visibility between the signup and login sections
function changePage() {
  signup.classList.toggle('hidden');
  login.classList.toggle('hidden');
}

// Toggles visibility from the success section back to login
function back() {
  success.classList.toggle('hidden');
  login.classList.toggle('hidden');
}
