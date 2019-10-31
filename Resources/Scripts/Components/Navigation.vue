<template>
	<nav class="navigation" :key="componentKey">
		<phone   v-if="[ 'phone', 'tablet' ].includes(device)"
		         :initialDurations="initialDurations"
		         :initialNavigation="initialNavigation"/>
		<desktop v-else
		         :initialDurations="initialDurations"
		         :initialNavigation="initialNavigation"/>
	</nav>
</template>

<script>
	import { mapState } from 'vuex'

	import Desktop from './Desktop.vue'
	import Phone from './Phone.vue'

	export default {
		components: { Desktop, Phone },
		computed: mapState([ 'device' ]),
		data() {
			return { componentKey: 0 }
		},
		props: {
			initialDurations: {
				required: true,
				type: Object
			},
			initialNavigation: {
				required: true,
				type: Array
			}
		},
		watch: {
			device() {
				this.componentKey++
				document.body.style.overflowY = 'visible'
			}
		}
	}
</script>
