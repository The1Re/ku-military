const sidebar = document.getElementById('sidebar');
const toggleSidebars = document.getElementsByClassName('toggleSidebar');

for (let i=0; i<toggleSidebars.length; i++)
{
    const toggleSidebar = toggleSidebars[i];
    toggleSidebar.addEventListener('click', () => {
        const toggleSidebarBtn = document.getElementById('toggleSidebarButton');
        if (sidebar.classList.contains('w-64')) {
            //sidebar open to close
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-0');
        } else {
            //sidebar close to open
            sidebar.classList.remove('w-0');
            sidebar.classList.add('w-64');
        }
        toggleSidebarBtn.classList.toggle('hidden');
    })
}

const toggle_lists = document.getElementsByClassName('toggle-list');
for (let i=0; i<toggle_lists.length; i++)
{
    const toggle_list = toggle_lists[i];

    toggle_list.addEventListener('click', () => {
        const icon = toggle_list.getElementsByClassName('toggle-icon')[0];
        const dropdown = document.getElementById('dropdown');

        dropdown.classList.toggle("hidden");
        if (icon.classList.contains('fa-angle-down')) {
            // show
            icon.classList.remove('fa-angle-down');
            icon.classList.add('fa-angle-up');
        } else {
            // close
            icon.classList.remove('fa-angle-up');
            icon.classList.add('fa-angle-down');
        }
    });
}