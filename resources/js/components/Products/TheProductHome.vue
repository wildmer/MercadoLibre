<template>
	<!-- <h1>1as</h1> -->
        <!-- @foreach ($products as $product) -->
            <div class="card mx-2 my-3 card_size" v-for="(product, index) in products" :key="index">
                <img :src="product.file.route" class="card-img-top" alt="Imagen del producto">
                <div class="card-body">
                    <h5 class="card-title">{{ product.name }}</h5>
                    <p class="card-text">{{ product.format_description }}</p>
                    <div class="d-flex flex-wrap">
                        <span class="w-100">
                            <strong>Precio: </strong> {{ product.price }}
                        </span>
                        <span class="mt-2">
                            <strong>Categoria: </strong> {{ product.category.name }}
                        </span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2">

                        <button v-if="isLoged" class="btn btn-outline-success" type="button" id="addProduct"
						v-on:click="addProduct(product)">
                            Comprar
                        </button>
                        <a v-else class="btn btn-outline-success" type="button" id="addProduct"
						href="/login">
                            Comprar
                        </a>
                    </div>
                </div>
            </div>
        <!-- @endforeach -->
</template>

<script>

export default {
	// components: {
	// 	ProductModal
	// },
	props: ['products', 'user'],
	data() {
		return {
			isLoged: false,
			idUser: null,
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			if (!this.user){ return }
			this.isLoged = true
			this.idUser = this.user.id
		},
		addProduct(productData) {
			// console.log({productData});
			if (!this.isLoged) {return}

			const getListProduct = (JSON.parse(localStorage.getItem(this.idUser)) || []);
            const posicion = getListProduct.indexOf(getListProduct.find(producto => producto.id === productData['id']));

            let _product = productData
            if (posicion !== -1) {
                _product = getListProduct[posicion]
                _product['amount'] = _product['amount'] + 1;
                // listProduct.splice(posicion, 1, _product);
            } else {
                _product['amount'] = 1;
                getListProduct.push(_product)
            }

            localStorage.setItem(this.idUser, JSON.stringify(getListProduct));
        }

	}
}
</script>
