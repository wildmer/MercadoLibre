<template>
	<li class="nav-item">
		<a class="nav-link" @click="load_data()">
			<i class="fa-solid fa-cart-shopping"></i>
		</a>
	</li>
	<cart-modal :shopping_data="shoppingList" :user_data="user_info" ref="cartModal" />

</template>

<script>
import CartModal from './CartModal.vue';
export default {
	components: {
		CartModal
	},
	props: ['user'],
	data() {
		return {
			isLoged: false,
			idUser: null,
			shoppingList: null,
			modal: null,
			user_info : null
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
			this.shoppingList = (JSON.parse(localStorage.getItem(this.idUser)) || []);
			const modal_id = document.getElementById('cartModal')
			this.modal = new bootstrap.Modal(modal_id)
			modal_id.addEventListener('hidden.bs.modal', e => {
				this.$refs.cartModal.reset()
			})
		},

		load_data () {
			this.user_info=this.user
			this.shoppingList = (JSON.parse(localStorage.getItem(this.idUser)) || []);

			this.openModal()
		},
		openModal() {
			this.modal.show()
		},
	}
}
</script>
