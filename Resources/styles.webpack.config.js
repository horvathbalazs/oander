const path = require("path")

const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const WebpackFixStyleOnlyEntries = require('webpack-fix-style-only-entries')

module.exports = {
	entry: './Styles/App.scss',
	mode: 'production',
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: { url: false }
					},
					'sass-loader'
				]
			}
		]
	},
	output: { path: path.resolve(__dirname, '..') },
	plugins: [
		new WebpackFixStyleOnlyEntries,
		new MiniCssExtractPlugin({ filename: 'app.css' })
	],
	watch: true
}
