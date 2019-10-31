import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	mutations: {
		update(state, device) {
			state.device = device
		}
	},
	state: { device: 'phone' }
})
