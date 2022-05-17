const path = require('path');
// include the js minification plugin
const TerserPlugin = require("terser-webpack-plugin");

// include the css extraction and minification plugins
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
// include the clean webpack plugins
const {CleanWebpackPlugin} = require('clean-webpack-plugin');

module.exports = {
  entry: {
      app:['./src/js/front-end/app.js', './src/style/front-end/app.scss'],
      admin:['./src/js/back-end/admin.js', './src/style/back-end/admin.scss'],
      customizer:['./src/js/back-end/customizer.js'],
  },
  output: {
    filename: './build/js/[name].[hash].js',
    path: path.resolve(__dirname)
  },
  module: {
    rules: [
      // perform js babelization on all .js files
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      // compile all .scss files to plain old css
      {
          test: /\.(sass|scss)$/,
          use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader']
      }
    ]
  },
  plugins: [
      // extract css into dedicated file
      new MiniCssExtractPlugin({
        filename: './build/css/[name].[hash].css'
      }),
      // clean out build directories on each build
      new CleanWebpackPlugin({
          cleanOnceBeforeBuildPatterns: ['./build/js/*','./build/css/*']
        })
    ],
  optimization: {
    minimizer: [
      // enable the js minification plugin
      new TerserPlugin(),
      // enable the css minification plugin
      new CssMinimizerPlugin({})
    ]
  }
};
