import Elevator from './Components/Elevator'
import Newsletter from './Components/Newsletter.vue'
import Variables from './Components/Variables'
import Vue from 'vue'

const variables = new Variables

const elevator = new Elevator(variables.elevator)

const newsletter = new Vue({
	el: '[data-newsletter]',
	render: createElement => createElement(Newsletter)
})
