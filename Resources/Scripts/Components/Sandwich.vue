<template>
	<button @click="onClick"
	        @mouseover="onHover"
	        @mouseleave="onLeave"
	        class="sandwich"
	        title="Navigate"
	        type="button">
		<svg class="sandwich__icon" viewBox="0 0 60 60">
			<title>Navigate</title>
			<g>
				<path ref="main"
				      class="sandwich__path sandwich__path--main"
				      d="m17,22h26m-26,8h26m-26,8h26"/>
				<path ref="default"
				      class="sandwich__path sandwich__path--default"
				      d="m17,22h26m-26,8h26m-26,8h26"/>
				<path ref="hover"
				      class="sandwich__path sandwich__path--hover"
				      d="m20,22h26m-32,8h26m-20,8h26"/>
				<path ref="active"
				      class="sandwich__path sandwich__path--active"
				      d="m20.8076,20.8076l18.3848,18.3848m-9.19239,-9.19239h0m-9.19239,9.19239l18.3848,-18.3848"/>
			</g>
		</svg>
		<span v-if="state === 'hover'">asd</span>
	</button>
</template>

<script>
	import { Sine, TweenMax } from 'gsap/all'

	import MorphSVGPlugin from '../Packages/MorphSVGPlugin.js'

	const plugins = [ MorphSVGPlugin ]

	export default {
		data() {
			return { state: [ 'default' ] }
		},
		methods: {
			onClick() {
				if (this.state.includes('active')) {
					this.state = this.state.filter(action => action !== 'active')
				} else {
					this.state.push('active')
				}
			},
			onHover() {
				if (! this.state.includes('hover')) {
					this.state.push('hover')
				}
			},
			onLeave() {
				this.state = this.state.filter(action => action !== 'hover')
			}
		},
		props: {
			initialDuration: {
				required: true,
				type: String
			}
		},
		watch: {
			state() {
				let morph = 'default'

				if (this.state.includes('active')) {
					morph = 'active'
				} else if (this.state.includes('hover')) {
					morph = 'hover'
				}

				this.$emit('onChange', morph)

				TweenMax.to(this.$refs.main, this.initialDuration, {
					ease: Sine.easeInOut,
					morphSVG: { shape: this.$refs[morph].getAttribute('d') }
				})
			}
		}
	}
</script>
