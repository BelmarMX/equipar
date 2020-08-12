<form class="uk-search uk-search-default uk-search-navbar le-new" method="POST" action="{{ route('search') }}">
	@csrf
	<div class="uk-inline">
		<span class="uk-form-icon" uk-icon="icon: search"></span>
		<input class="uk-input" type="text" name="search" placeholder="Búsqueda de producto">
	</div>
	<button class="uk-form-icon uk-form-icon-flip">Buscar</button>
</form>