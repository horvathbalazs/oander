export default class View {
	constructor() {
		this.update()

		window.addEventListener('resize', () => {
			if (this.get() !== this.device) {
				this.update()
			}
		})
	}

	get() {
		return window.getComputedStyle(document.querySelector('.body'), ':before').getPropertyValue('content').replace(/['"]/g, '')
	}

	update() {
		this.device = this.get()
	}
}
