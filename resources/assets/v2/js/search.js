require('magicsuggest/magicsuggest-min')

$(function() {
    $('#autocomplete').magicSuggest({
        typeDelay: 3,
        data: '/autocomplete',
        ajaxConfig: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        valueField: 'slug',
        hideTrigger: true,
        highlight: true,
        useTabKey: true,
        maxSelection: 1,
        maxSelectionRenderer: function(){
            return 'Presiona buscar'
        },
        minChars: 3,
        minCharsRenderer: function(v){
            return 'Continua escribiendo';
        },
        noSuggestionText: 'Sin coincidencias',
        selectionRenderer: function(data){
            let el_return = ''
            if( data.brand )
            {
                el_return += ' '+data.brand
            }
            if( data.category)
            {
                if( data.brand )
                {
                    el_return += '| '
                }
                el_return += ' '+data.category
            }

            if( el_return )
            {
                return data.title + ' ('+el_return+')'
            }
            return data.title
        },
        renderer: function(data){
            return `
                <div class="autocomplete-box">
                    <div class="autocomplete-image">
                        <img src="${data.image}">
                    </div>
                    <div class="autocomplete-info">
                        <span class="autocomplete-title">${data.title}</span>
                        <span class="autocomplete-cats">${data.category} / ${data.subcategory}</span>
                        <div class="autocomplete-additional">
                            <span class="autocomplete-brand">${data.brand}</span>
                            <span class="autocomplete-price">$ ${data.price}</span>
                        </div>
                    </div>
                </div>
            `
        }
    })
})

$(document).on('click', '.ms-res-item', function(ev){
    $('#do-search').click()
})

$(document).on('keydown', '.ms-sel-ctn > input[type="text"]', function(event){
    if(event.which === 13 || event.keyCode === 13)
    {
        $('#do-search').click()
    }
})