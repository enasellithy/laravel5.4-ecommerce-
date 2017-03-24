import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
{path: '/', component: App, name: 'home'}
]
const router = new VueRouter({
	mode: 'history',
	routes
})

new Vue({
	router
}).$monut('#app')