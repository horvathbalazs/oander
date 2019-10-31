<template>
	<form @submit="onValidation" class="newsletter" action="https://example.com/api" method="get" novalidate>
		<h3 class="newsletter__title">Subscribe to the newsletter</h3>

		<div class="newsletter__fields">
			<div class="newsletter__field newsletter__field--small">
				<label class="newsletter__label" for="firstname" title="First name">
					<input v-model="firstname" id="firstname" class="newsletter__input" name="firstname" placeholder="First name" title="First name" type="text">
				</label>
			</div>

			<div class="newsletter__field newsletter__field--small">
				<label class="newsletter__label" for="lastname" title="Last name">
					<input v-model="lastname" id="lastname" class="newsletter__input" name="lastname" placeholder="Last name" title="Last name" type="text">
				</label>
			</div>

			<div class="newsletter__field newsletter__field--large">
				<label class="newsletter__label" for="email" title="Email">
					<input v-model="email" id="email" class="newsletter__input" name="email" placeholder="Email" title="Email" type="email">
				</label>
			</div>
		</div>

		<ul v-if="errors.length" class="newsletter__list">
			<li v-for="error in errors" class="newsletter__item">{{ error }}</li>
		</ul>

		<button class="newsletter__button" title="Subscribe" type="submit">Subscribe</button>
	</form>
</template>

<script>
	export default {
		data() {
			return {
				errors: [],
				firstname: null,
				lastname: null,
				email: null
			}
		},
		methods: {
			onValidation(event) {
				this.errors = []

				if (! this.firstname) {
					this.errors.push('First name required')
				}

				if (! this.lastname) {
					this.errors.push('Last name required')
				}

				if (! this.email) {
					this.errors.push('Email required')
				} else if (! /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email)) {
					this.errors.push('Valid email required')
				}

				if (! this.errors.length) {
					return true
				}

				event.preventDefault()
			}
		}
	}
</script>
