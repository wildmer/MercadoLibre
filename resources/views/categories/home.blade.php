<x-app title="Inicio">
    <section class="my-3 d-flex justify-content-center">
        <h1>Listado de Produtos</h1>
    </section>

    <section class="">
		@guest
			<the-category-home :categories="{{ $categories }}" :user="false" />
		@else
			{{-- @if (Route::has('login')) --}}
				<the-category-home :categories="{{ $categories }}" :user="{{Auth::user()}}" />
			{{-- @endif --}}
		@endguest
    </section>

</x-app>