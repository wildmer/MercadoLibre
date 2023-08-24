import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import TheProductList from './components/Products/TheProductList.vue'
import TheProductHome from './components/Products/TheProductHome.vue'
import TheCategoryList from './components/Category/TheCategoryList.vue'
import TheCartShopping from './components/CartShopping/TheCartShopping.vue'
import BackendError from './components/Components/BackendError.vue'

const app = createApp({
	components: {
		TheProductList,
		TheProductHome,
		TheCategoryList,
		TheCartShopping
	}
})

app.component('v-select', vSelect)
app.component('backend-error', BackendError)
app.mount('#app')