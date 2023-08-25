import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import TheProductList from './components/Products/TheProductList.vue'
import TheProductHome from './components/Products/TheProductHome.vue'
import TheProductShow from './components/Products/TheProductShow.vue'
import TheCategoryList from './components/Category/TheCategoryList.vue'
import TheCategoryShow from './components/Category/TheCategoryShow.vue'
import TheCategoryHome from './components/Category/TheCategoryHome.vue'
import TheCartShopping from './components/CartShopping/TheCartShopping.vue'
import BackendError from './components/Components/BackendError.vue'

const app = createApp({
	components: {
		TheProductList,
		TheProductHome,
		TheProductShow,
		TheCategoryList,
		TheCategoryShow,
		TheCategoryHome,
		TheCartShopping
	}
})

app.component('v-select', vSelect)
app.component('backend-error', BackendError)
app.mount('#app')