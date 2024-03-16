const path = require('path');

module.exports = {
    entry: {
        home: './assets/js/home/home.js',
    },
    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'public/js')
    },
    module: {
        rules: [
            {
                test: /\.js$/, // This rule applies to files with a .js extension
                exclude: /node_modules/, // Exclude files in the node_modules directory
                use: {
                    loader: 'babel-loader', // Use babel-loader to transpile JavaScript files
                    options: {
                        presets: ['@babel/preset-env'] // Use @babel/preset-env for transpilation
                    }
                }
            },
            {
                test: /\.css$/, // This rule applies to files with a .css extension
                use: ['style-loader', 'css-loader'] // Use style-loader and css-loader for handling CSS files
            }
        ]
    }

}