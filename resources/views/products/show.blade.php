<x-app title="Inicio">
    <section class="my-3 d-flex justify-content-center">
        <h1>{{ $productWithDetails->name }}</h1>
    </section>

    <section class="d-flex flex-wrap justify-content-center">
		@guest
			<the-product-show :product="{{ $productWithDetails }}" :user="false" />
		@else
			{{-- @if (Route::has('login')) --}}
				<the-product-show :product="{{ $productWithDetails }}" :user="{{Auth::user()}}" />
			{{-- @endif --}}
		@endguest
    </section>

</x-app>