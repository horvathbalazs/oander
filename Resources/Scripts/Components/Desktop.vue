<template>
	<fragment>
		<div class="desktop">
			<ul class="desktop__list desktop__list--first">
				<li v-for="(first, i) in computedNavigation">
					<fragment v-if="first.items">
						<button @click="onClick(i)"
						        :class="{ 'desktop__button--active': first.active }"
						        :title="first.title"
						        class="desktop__button desktop__button--first"
						        type="button">{{ first.title }}</button>

						<ul class="desktop__list desktop__list--second"
						    :class="{ 'desktop__list--active': first.active }">
							<li v-for="second in first.items.slice(0, 4)"
							    class="desktop__item desktop__item--second">
								<h4 class="desktop__title desktop__title--second">{{ second.title }}</h4>

								<ul class="desktop__list desktop__list--third">
									<li v-for="third in second.items"
									    class="desktop__item desktop__item--third">
										<a class="desktop__link desktop__link--third"
										   :href="third.link"
										   :title="third.title">{{ third.title }}</a>
									</li>
								</ul>

								<a :href="second.link" class="desktop__link desktop__link--second" title="Show all">Show all</a>
							</li>
						</ul>
					</fragment>

					<fragment v-else>
						<a :href="first.link"
						   :title="first.title"
						   class="desktop__link desktop__link--first">{{ first.title }}</a>
					</fragment>
				</li>
			</ul>
		</div>
	</fragment>
</template>

<script>
	import Vue from 'vue'

	export default {
		computed: {
			computedNavigation() {
				return this.navigation
			}
		},
		data() {
			return { navigation: this.initialNavigation }
		},
		methods: {
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
