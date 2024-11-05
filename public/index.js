function toggleSidebarFn(sidebar)
{
    const toggleSidebarBtn = document.getElementById('toggleSidebarButton');

    const sidebarIsOpen = sidebar.classList.contains('w-64');

    sidebar.classList.toggle('w-64');
    sidebar.classList.toggle('w-0');

    localStorage.setItem('isSidebarOpen', !sidebarIsOpen);
    
    setTimeout(() => {
        toggleSidebarBtn.classList.toggle('hidden');
    }, sidebarIsOpen ? 150 : 0);
}


// sidebar handle
const sidebar = document.getElementById('sidebar');
const toggleSidebars = document.getElementsByClassName('sidebar-toggle');
for (let i=0; i<toggleSidebars.length; i++)
{
    const toggleSidebar = toggleSidebars[i];
    toggleSidebar.addEventListener('click', () => toggleSidebarFn(sidebar))
}
    
// check before sidebar is open
const sideBarOpen = localStorage.getItem('isSidebarOpen') === 'true';
if (!sideBarOpen) {
    toggleSidebarFn(sidebar);
}


// sidebar toggle menu handle
const toggle_lists = document.getElementsByClassName('toggle-list');
for (let i=0; i<toggle_lists.length; i++)
{
    const toggle_list = toggle_lists[i];

    toggle_list.addEventListener('click', () => {
        const icon = toggle_list.getElementsByClassName('toggle-icon')[0];
        const dropdown = document.getElementById('dropdown');

        dropdown.classList.toggle('hidden');
        icon.classList.toggle('fa-angle-down');
        icon.classList.toggle('fa-angle-up');
    });
}


// check all function
const checkall = document.getElementById('checkAll');
checkall.addEventListener('click', () => {
    const check_list = document.getElementsByClassName('detail_check');
    if (checkall.checked === true) {
        checked = true;
    }else{
        checked = false;
    }

    for (let i=0; i < check_list.length; i++)
        check_list[i].checked = checked;
})