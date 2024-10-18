const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('toggleSidebar');

toggleButton.addEventListener('click', () => {
    if (sidebar.classList.contains('w-64')) {
        sidebar.classList.remove('w-64');
        sidebar.classList.add('w-0');
        toggleButton.innerText = 'Open Sidebar';
    } else {
        sidebar.classList.remove('w-0');
        sidebar.classList.add('w-64');
        toggleButton.innerText = 'Close Sidebar';
    }
})