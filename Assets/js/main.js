const arrow = document.querySelectorAll(".iocn-link");
const sidebar = document.querySelector(".sidebar");
const sidebarBtn = document.querySelector(".bx-menu");
const switchSidebarStorage = document.querySelector('#sidebarStorage')
arrow.forEach(btn => {
    btn.addEventListener('click', function () {
        const arrowParent = this.parentElement;
        arrowParent.classList.toggle("showMenu");
    })
})

if (localStorage.getItem('sidebartoggle')) {
    sidebarToggle();
    switchSidebarStorage.checked = true
}

function sidebarToggle() {
    sidebar.classList.toggle("close");
}

sidebarBtn.addEventListener("click", sidebarToggle);

switchSidebarStorage.addEventListener('change', function (e) {
    if (e.currentTarget.checked) {
        localStorage.setItem('sidebartoggle', 'true')
        if (!sidebar.classList.contains('close')) {
            sidebar.classList.add('close');
        }

    } else {
        localStorage.removeItem('sidebartoggle')
        if (sidebar.classList.contains('close')) {
            sidebar.classList.remove('close');
        }
    }
})
