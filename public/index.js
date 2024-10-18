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

const toggle_lists = document.getElementsByClassName('toggle-list');
for (let i=0; i<toggle_lists.length; i++)
{
    const toggle_list = toggle_lists.item(i);

    toggle_list.addEventListener('click', () => {
        const icon = toggle_list.getElementsByTagName('i')[0];
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle("hidden");
        if (icon.classList.contains('toggle-icon')) {
            if (icon.classList.contains('fa-angle-down')) {
                // show
                icon.classList.remove('fa-angle-down');
                icon.classList.add('fa-angle-up');
            } else {
                // close
                icon.classList.remove('fa-angle-up');
                icon.classList.add('fa-angle-down');
            }
        }

    });

    
}