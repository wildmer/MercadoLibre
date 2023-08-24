<template>
	<div class="modal fade" id="cartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content bg-light text-dark">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="shopeListLabel">Articulos</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<ul class="list-group" id="shopeItems" v-for="(product, index) in products" :key="index">
						<li v-if="product.amount > 0" class="list-group-item" id="carListId{{index}}">
							<div class="row">
								<div class="col-sm-6 col-xxl-2">
									<img :src="product.file.route" class="card-img-top" alt="..." />
								</div>
								<div class="col-sm-6 col-xxl-5 text-center my-auto text-truncate">{{ product.name }}</div>
								<!-- <div class="col-6"> -->
								<div class="btn-group col-sm-12 col-xxl-5" role="group">
									<button type="button" class="btn btn-warning" @click="minus(product)">
										<i class="fa-solid fa-minus"></i></button>
									<button type="button" class="btn btn-outline-primary disabled">{{ product.amount
									}}</button>
									<button type="button" class="btn btn-success" @click="add(product)">
										<i class="fa-solid fa-plus"></i></button>
									<button type="button"
										class="btn btn-outline-primary disabled">{{ formatterPeso.format(product.price * product.amount)
										}}</button>
									<button type="button" class="btn btn-danger" @click="deleted(product)">
										<i class="fa-solid fa-circle-xmark"></i></button>
								</div>
								<!-- </div> -->
							</div>
						</li>`
					</ul>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-12">
							<p class="card-text fw-bold text-sm-end fs-5" id="priceTotal"></p>
						</div>
					</div>
					<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
					<button type="button" id="buttonEmpty" class="btn btn-outline-danger" @click="emptyCar()">Vaciar
						Carrito</button>
					<button type="button" id="buttonPay" class="btn btn-success">Pagar</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['shopping_data', 'user_data'],
	// components: { Field, Form },
	watch: {
		shopping_data(new_value) {
			this.products = new_value
		}
	},
	// computed: {
	// },
	data() {
		return {
			// is_create: true,
			products: [],
			formatterPeso: new Intl.NumberFormat( // Formato peso!
				'es-CO', {
				style: 'currency',
				currency: 'COP',
				minimumFractionDigits: 0
			}
			)
		}
	},
	created() {
		this.index()
	},

	methods: {
		index() { },
		add(productData) {
			// const this.user_data.id = this.user_data.id
			const posicion = this.products.indexOf(this.products.find(producto => producto.id === productData['id']));

			// console.log(posicion);

			let _product = productData
			if (posicion !== -1) {
				_product = this.products[posicion]
				_product['amount'] = _product['amount'] + 1;
				// listProduct.splice(posicion, 1, _product);
			} else {
				// _product['id'] = productData['id'];
				_product['amount'] = 1;
				this.products.push(_product)
			}

			localStorage.setItem(this.user_data.id, JSON.stringify(this.products));
		},
		minus(productData) {
			// const this.user_data.id = this.user_data.id
			const posicion = this.products.indexOf(this.products.find(producto => producto.id === productData['id']));

			// console.log(posicion);

			let _product = productData
			if (posicion !== -1) {
				_product = this.products[posicion]
				_product['amount'] = _product['amount'] - 1;
				console.log(_product);
				// listProduct.splice(posicion, 1, _product);
			}

			localStorage.setItem(this.user_data.id, JSON.stringify(this.products));
		},
		deleted(productData) {
			// const this.user_data.id = this.user_data.id
			const posicion = this.products.indexOf(this.products.find(producto => producto.id === productData['id']));

			// console.log(posicion);

			let _product = productData
			if (posicion !== -1) {
				_product = this.products[posicion]
				_product['amount'] = 0;
				// listProduct.splice(posicion, 1, _product);
			}

			localStorage.setItem(this.user_data.id, JSON.stringify(this.products));
		},
		emptyCar() {
			// const this.user_data.id = this.user_data.id
			this.products = []
			localStorage.setItem(this.user_data.id, JSON.stringify(this.products));
		},

	}
}
</script>