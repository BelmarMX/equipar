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

    // -> Search bar
    document.getElementById('toggle-search').addEventListener('click', event => {
        let search_bar = document.getElementById('search-form')
        if( search_bar.classList.contains('show_me_the_money') )
        {
            search_bar.classList.remove('fade_in')
            search_bar.classList.add('fade_out')
            setTimeout(() => {
                search_bar.classList.remove('show_me_the_money')
            }, 500)
        }
        else
        {
            search_bar.classList.remove('fade_out')
            search_bar.classList.add('fade_in')
            search_bar.classList.add('show_me_the_money')
        }
    })

    // -> Contact bottom button
    document.getElementById('floating_button').addEventListener('click', event => {
        let container_links = document.getElementById('btn__contactanos--links')
        if( container_links.classList.contains('show_me_the_money') )
        {
            container_links.classList.remove('show_me_the_money')
            container_links.classList.add('black_sheep_wall')
            setTimeout(() => {
                container_links.classList.add('hide')
            }, 500)
        }
        else
        {
            container_links.classList.remove('hide')
            container_links.classList.remove('black_sheep_wall')
            container_links.classList.add('show_me_the_money')
        }
    })
})