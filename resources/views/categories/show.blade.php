<x-app title="Inicio">
    <section class="my-3 d-flex justify-content-center">
        <h1>Categoria {{ $categoryWithProducts->name }}</h1>
    </section>

    <section class="d-flex flex-wrap justify-content-center">
		@guest
			<the-category-show :category="{{ $categoryWithProducts }}" :user="false" />
		@else
			{{-- @if (Route::has('login')) --}}
				<the-category-show :category="{{ $categoryWithProducts }}" :user="{{Auth::user()}}" />
			{{-- @endif --}}
		@endguest
    </section>

</x-app>