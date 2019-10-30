import { ScrollToPlugin, TweenMax } from 'gsap/all'

const plugins = [ ScrollToPlugin ]

export default class Elevator {
	constructor(duration) {
		this.button = document.querySelector('[data-elevator]')

		if (this.button) {
			this.button.addEventListener('click', () => {
				TweenMax.to(window, duration, { scrollTo: 0 })
			})
		}
	}
}
