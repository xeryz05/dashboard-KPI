

// JavaScript to handle sidebar toggle
const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('sidebar-toggle');

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('closed');
});
