<div class="uk-container uk-text-center ELfb uk-margin-bottom">
	<div class="uk-margin-top uk-margin-bottom">
		<form class="uk-search uk-search-default uk-search-navbar" method="POST" action="{{ route('search') }}">
			@csrf
			<i class="uk-search-icon" uk-search-icon></i>
			<input class="uk-search-input" type="search" name="search" placeholder="Productos (enter para buscar)">
		</form>
	</div>
</div>