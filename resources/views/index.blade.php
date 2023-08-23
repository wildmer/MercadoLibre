<x-app title="Inicio">
    <section class="my-3 d-flex justify-content-center">
        <h1>Listado de Produtos</h1>
    </section>

    <section class="d-flex flex-wrap justify-content-center">
        @foreach ($products as $product)
            <div class="card mx-2 my-3 card_size">
                <img src="{{ $product->file->route }}" class="card-img-top" alt="Imagen del producto">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->format_description }}</p>
                    <div class="d-flex flex-wrap">
                        <span class="w-100">
                            <strong>Precio: </strong> {{ $product->price }}
                        </span>
                        <span class="mt-2">
                            <strong>Categoria: </strong> {{ $product->category->name }}
                        </span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-success" type="button">
                            Comprar
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

</x-app>
