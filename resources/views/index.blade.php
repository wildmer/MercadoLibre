<x-app title="Inicio">
    <section class="my-3 d-flex justify-content-center">
        <h1>Listado de Produtos</h1>
    </section>

    <section class="d-flex flex-wrap justify-content-center">
		@guest
			<the-product-home :products="{{ $products }}" :user="false" />
		@else
			{{-- @if (Route::has('login')) --}}
				<the-product-home :products="{{ $products }}" :user="{{Auth::user()}}" />
			{{-- @endif --}}
		@endguest
    </section>

</x-app>