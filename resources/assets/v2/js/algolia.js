import algoliasearch        from "algoliasearch/lite"
import instantsearch        from "instantsearch.js";
import {
    searchBox,
    hits,
    refinementList,
    pagination,
    clearRefinements,
    numericMenu,
    poweredBy
} from "instantsearch.js/es/widgets";

const searchClient = algoliasearch('TBCPPTHMDQ', '7733f1bd8d90a621d953daf808c65510')

const search = instantsearch({
        indexName: 'products_index'
    ,   searchClient
})

const url_links = process.env.MIX_DEFAULT_URL
const url_asset = url_links + 'storage/productos/'

search.addWidgets([
        searchBox({
                container: '#algolia-searchbox'
            ,   placeholder: 'Busca por producto, categoría, subcategoría o marca'
        })

    ,   refinementList({
            container: '#algolia-categories'
        ,   attribute: 'categoria'
    })

    ,   refinementList({
            container: '#algolia-subcategories'
        ,   attribute: 'subcategoria'
    })

    ,   refinementList({
            container: '#algolia-brands'
        ,   attribute: 'marca'
    })

    ,   numericMenu({
            container: '#algolia-prices'
        ,   attribute: 'precio'
        ,   items: [
            { label: 'Todos' },
            { label: 'Menos de 5000', end: 5000 },
            { label: 'Entre 5000 - 15000', start: 5000, end: 15000 },
            { label: 'Entre 15000 - 40000', start: 15000, end: 40000 },
            { label: 'Mas de 40000', start: 40000 }
        ]
    })

    ,   hits({
            container: '#algolia-hits'
        ,   templates: {
            item: `
                <div class="row w-100 mb-2">
                    <div class="col-2">
                        <a href="${url_links}productos/{{slug}}">
                            <img class="img-fluid"
                                src="${url_asset}{{thumb}}"
                                alt="{{title}}"
                            >
                        </a>
                    </div>
                    <div class="col-10">
                        <div class="algolia-hits-categories">
                            {{#helpers.highlight}}{ "attribute": "categoria" }{{/helpers.highlight}} / {{#helpers.highlight}}{ "attribute": "subcategoria" }{{/helpers.highlight}}
                        </div>
                        <h2 class="algolia-hits-title">{{#helpers.highlight}}{ "attribute": "title" }{{/helpers.highlight}}</h2>
                        <div class="algolia-hits-description mb-1">
                            {{#helpers.highlight}}{ "attribute": "info" }{{/helpers.highlight}}
                        </div>
                        <div class="mb-2 mt-2 text-end">
                            <span class="algolia-hits-brand">{{marca}}</span>
                            <span class="algolia-hits-price">\${{precio}}</span>
                        </div>
                        <a href="${url_links}productos/{{slug}}" class="btn btn-primary btn-sm">
                            Ver producto
                        </a>
                    </div>
                </div>
            `
            ,   empty: 'Sin resultados para la <q>{{query}}</q>'
        }
    })

    ,   clearRefinements({
                container: '#algolia-clear'
            ,   includedAttributes: [
                'categoria', 'subcategoria', 'marca', 'precio'
            ]
            ,   templates: {
                    resetLabel: 'Limpiar filtros'
            }
        })

    ,   pagination({
            container: '#algolia-pagination'
        })
])

search.start()