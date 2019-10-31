import Fragment from 'vue-fragment'
import Vue from 'vue'
import { callWatchers, watch } from 'watchjs'

import store from './Store'

import Elevator from './Components/Elevator'
import Newsletter from './Components/Newsletter.vue'
import Navigation from './Components/Navigation.vue'
import Variables from './Components/Variables'
import View from './Components/View'

Vue.config.devtools = true
Vue.use(Fragment.Plugin)

const variables = new Variables
const view = new View

watch(view, 'device', () => {
	store.commit('update', view.device)
})
callWatchers(view, 'device')

new Elevator(variables.elevator)

new Vue({
	el: '[data-newsletter]',
	render: createElement => createElement(Newsletter)
})

new Vue({
	el: '[data-navigation]',
	render: createElement => createElement(Navigation, {
		props: {
			initialDurations: { sandwich: variables.sandwich },
			initialNavigation: navigation
		}
	}),
	store
})
