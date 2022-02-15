// Include Bootstrap5
const bootstrap = require('bootstrap')

// Initialize the tooltips
const tooltipTriggerList = []
    .slice
    .call( document.querySelectorAll('[data-bs-toggle="tooltip"]') )

const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

// Document Ready
const documentReady = (action) => {
    if( document.readyState === 'complete' )
    {
        setTimeout(action, 1)
    }
    else
    {
        document.addEventListener('DOMContentLoaded', action)
    }
}

documentReady(() => {
    document.getElementById('load8')
        .setAttribute('hidden', 'hidden')

    document.getElementById('toggle-search').addEventListener('click', function(){
        let search_bar = document.getElementById('search-form')
        if( search_bar.getAttribute('hidden') )
        {
            search_bar.removeAttribute('hidden')
        }
        else
        {
            search_bar.setAttribute('hidden', 'hidden')
        }
    })
})