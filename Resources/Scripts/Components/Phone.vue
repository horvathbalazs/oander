<template>
	<fragment>
		<sandwich @onChange="onChange" :initialDuration="initialDurations.sandwich"/>

		<div :class="{ 'phone--active': active }" class="phone">
			<div class="phone__scroll">
				<ul class="phone__list phone__list--first">
					<template v-for="(first, i) in computedNavigation">
						<li>
							<fragment v-if="first.items">
								<button @click="onClick(i)"
								        :class="{ 'phone__button--active': first.active }"
								        :title="first.title"
								        class="phone__button phone__button--first"
								        type="button">
								    {{ first.title }}

								    <svg class="phone__icon phone__icon--first phone__icon--horizontal" viewBox="0 0 25 15">
										<title>{{ first.title }}</title>
										<path class="phone__path phone__path--first" d="m1,1l11.5,13l11.5,-13"/>
									</svg>
								</button>

								<ul v-if="first.active"
								    class="phone__list phone__list--second">
									<li v-for="second in first.items"
									    class="phone__item phone__item--second">
									    <a :href="second.link"
									       :title="second.title"
									       class="phone__link phone__link--second">{{ second.title }}</a>
									</li>
								</ul>
							</fragment>

							<fragment v-else>
								<a :href="first.link"
								   :title="first.title"
								   class="phone__link phone__link--first">
									{{ first.title }}

									<svg class="phone__icon phone__icon--first phone__icon--vertical" viewBox="0 0 15 25">
										<title>{{ first.title }}</title>
										<path class="phone__path phone__path--first" d="m1,1l13,11.5l-13,11.5"/>
									</svg>
								</a>
							</fragment>
						</li>

						<li v-if="i + 1 < computedNavigation.length"
						    class="phone__separator phone__separator--first"></li>
					</template>
				</ul>
			</div>
		</div>
	</fragment>
</template>

<script>
	import Sandwich from './Sandwich.vue'

	export default {
		components: { Sandwich },
		computed: {
			computedNavigation() {
				return this.navigation
			}
		},
		data() {
			return {
				active: false,
				navigation: this.initialNavigation
			}
		},
		methods: {
			onChange(value) {
				this.active = value === 'active'
				document.body.style.overflowY = this.active ? 'hidden' : 'visible'
			},
			onClick(i) {
				this.$set(this.navigation[i], 'active', ! this.navigation[i].active)

				this.navigation.map((item, j) => {
					if (i !== j) {
						this.$set(this.navigation[j], 'active', false)
					}
				})
			}
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
		}
	}
</script>
