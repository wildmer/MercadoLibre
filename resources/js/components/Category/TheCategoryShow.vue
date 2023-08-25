<template>
	<div class="card mx-2 my-3 card_size" v-for="(product, index) in category['products']" :key="index">
		<img :src="product.file.route" class="card-img-top" alt="Imagen del producto">
						<div class="card-body">
							<h5 class="card-title">{{ product.name }}</h5>
							<p class="card-text">{{ product.format_description }}</p>
							<div class="d-flex flex-wrap">
								<span class="w-100">
									<strong>Precio: </strong> {{ product.price }}
								</span>
								<span class="mt-2">
									<strong>Disponible: </strong> {{ product.stock }}
								</span>
							</div>
						</div>
						<div class="card-footer">
							<div class="d-grid gap-2">

								<button v-if="isLoged" class="btn btn-outline-success" type="button" id="addProduct"
									v-on:click="addProduct(product)">
									Comprar
								</button>
								<a v-else class="btn btn-outline-success" type="button" id="addProduct" href="/login">
									Comprar
								</a>
							</div>
						</div>
					</div>


</template>


<script>
import { saveLS } from '@/helpers/LocalStorage.js'

export default {
	// components: {
	// 	ProductModal
	// },
	props: ['category', 'user'],
	data() {
		return {
			isLoged: false,
			idUser: null
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			console.log(this.category);
			// this.category = this.category.category
			if (!this.user) { return }
			this.isLoged = true
			this.idUser = this.user.id
		},
		addProduct(categoryData) {
			if (!this.isLoged) { return }
			saveLS(categoryData, this.idUser)

		},
	}
}
</script>
