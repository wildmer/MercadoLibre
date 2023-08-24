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

{{-- <script>
    function addProduct(idProduct) {
        if ("{{ Auth::user() }}") {
            let idUser = "{{ Auth::user()->id }}"

            const getListProduct = localStorage.getItem(idUser);
            let listProduct = JSON.parse(getListProduct);

            if (!listProduct) {
                listProduct = []
            }

            const posicion = listProduct.indexOf(listProduct.find(producto => producto.id === idProduct));

            let _product = {}
            if (posicion !== -1) {
                _product = listProduct[posicion]
                _product['amount'] = _product['amount'] + 1;
                // listProduct.splice(posicion, 1, _product);
            } else {
                _product['id'] = idProduct;
                _product['amount'] = 1;
                listProduct.push(_product)
            }

            localStorage.setItem(idUser, JSON.stringify(listProduct));
        }

    }
</script> --}}
