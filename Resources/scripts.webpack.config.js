const path = require("path")

const VueLoaderPlugin = require('vue-loader/lib/plugin')

module.exports = {
	entry: './Scripts/App.js',
	mode: 'production',
	module: {
		rules: [
			{
				test: /\.vue$/,
				loader: 'vue-loader'
			}
		]
	},
	output: {
		path: path.resolve(__dirname, '..'),
		filename: 'app.js'
	},
	plugins: [ new VueLoaderPlugin ],
	resolve: {
		alias: { vue: 'vue/dist/vue.min.js' }
	},
	watch: true
}
