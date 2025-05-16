function authenticateUser() {
    // Get selected role and entered password
    const role = document.getElementById("role").value;
    const password = document.getElementById("password").value;
  
    let correctPassword;
  
    // Set correct password based on selected role
    switch (role) {
      case "Department Head":
        correctPassword = "SiEsD3ptH34d";
        break;
      case "Faculty":
        correctPassword = "SiEsF4cu1ty";
        break;
      case "Student Officer":
        correctPassword = "#CCSOAko";
        break;
      case "Student":
        correctPassword = "3SapatNa!";
        break;
      default:
        // Handle invalid role
        console.error("Invalid role selected.");
        alert("Please select a valid role.");
        return;
    }
  
    // Check if password is empty
    if (password === "") {
      console.warn("Password field is empty.");
      alert("Please enter your password.");
    }
    // Check if password matches the correct one
    else if (password === correctPassword) {
      console.log(`Welcome, ${role}! Authentication successful.`);
      alert(`Welcome, ${role}!`);
    }
    // Handle incorrect password
    else {
      console.error("Incorrect password for the selected role.");
      alert("Incorrect password. Try again.");
    }
}