let tablePages;
document.addEventListener('DOMContentLoaded', () => {

    if (document.querySelector('#tablePages')) {
        const urlData = '/pages/getPages'
        const columns = [
            { data: 'idpage' },
            { data: 'titulo' },
            { data: 'options' },
        ]
        tablePages = getDataTable('#tablePages', urlData, columns)
    }
})

function openModal() {
    $('#modalLists').modal('show')
}