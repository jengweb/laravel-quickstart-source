const mix = require('laravel-mix');
const path = require('path');
const webpack = require('webpack');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');

// Configuration area
const templatePath = path.join(__dirname, 'public/templates/penang');
const srcPath = path.join(__dirname, 'src');
const jsVendorsPath = `${srcPath}/vendors`;
const assetsPath = `${srcPath}/assets`;

// Set custom config for mix webpack
const mixWebpackCfg = {
	resolve: {
		extensions: ['.js'],
		modules: ['node_modules', 'bower_components', jsVendorsPath],
		alias: {
			modernizr: `imports-loader?this=>window!exports-loader?${jsVendorsPath}/modernizr.js`,
			detectizr: `imports-loader?this=>window!exports-loader?${jsVendorsPath}/detectizr.min.js`,
			videojs: 'imports-loader?$=jquery!../../node_modules/video.js/dist/video.min.js'
		}
	},
	module: {
		loaders: [
			{
				test: /\.js$/,
				loader: 'babel',
				exclude: [
					'node_modules',
					'bower_components',
					jsVendorsPath
				],
				query: {
					presets: ['es2017', 'stage-0'],
					plugins: [
						['transform-object-rest-spread']
					],
				},
			},
			{
				test: /\.scss$/,
				rules: [
					{
						loader: 'style-loader',
						options: {}
					},
					{
						loader: 'css-loader',
						options: {
							importLoaders: 1
						}
					},
					{
						loader: 'postcss-loader',
						options: {
							config: {
								path: './postcss.config.js',
							},
						},
					},
					{
						loader: 'resolve-url-loader'
					},
					{
						loader: 'sass-loader'
					}
				]
			}
		]
	},
	plugins: [
		new CopyWebpackPlugin([
			{
				from: `${assetsPath}/images`,
				to: `${templatePath}/images`,
			},
			// {
			// 	from: `${assetsPath}/media`,
			// 	to: `${templatePath}/media`,
			// }
		]),
		new ImageminPlugin({
			test: /\.(jpe?g|png|gif)$/i,
			pngquant: {
				quality: '95-100',
			},
			plugins: [
				imageminMozjpeg({
					quality: 80,
				})
			]
		})
	]
};

if (!mix.inProduction()) {
	// Add providePlugin feature if in dev
	mixWebpackCfg.plugins.push(
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery'
		})
	);
} else {
	// Set output version if production
	mix.version();
}

// Set custom config to mix webpack
mix.webpackConfig(mixWebpackCfg);

// Set entry point file and output
mix.js('src/js/app.js', `${templatePath}/js`);
