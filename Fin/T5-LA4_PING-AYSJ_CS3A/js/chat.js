const chatForm = document.getElementById('chat-form');

if (chatForm) {
  const chatBox = document.getElementById('chat-box');           // Chat display area
  const receiverId = document.getElementById('receiver_id').value; // ID of chat recipient

  // Function to fetch messages from server
  function fetchMessages() {
    fetch('fetch_messages.php?receiver_id=' + receiverId)
      .then(res => res.json())
      .then(data => {
        // Render messages in chatBox
        chatBox.innerHTML = data.map(msg =>
          `<p><strong>${msg.username}</strong>: ${msg.message}</p>`
        ).join('');
        // Scroll chatBox to the bottom
        chatBox.scrollTop = chatBox.scrollHeight;
      });
  }

  // Fetch messages every 1 second
  setInterval(fetchMessages, 1000);
  fetchMessages(); // Initial fetch on page load

  // Handle form submission (sending message)
  chatForm.addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submit

    const message = document.getElementById('message').value;

    // Send message to server via POST
    fetch('insert_message.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `message=${encodeURIComponent(message)}&receiver_id=${receiverId}`
    }).then(() => {
      document.getElementById('message').value = ''; // Clear input
      fetchMessages(); // Refresh messages after sending
    });
  });
}
