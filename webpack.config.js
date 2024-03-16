const path = require('path');

module.exports = {
    entry: {
        home: './assets/js/home/home.ts',
    },
    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'public/js')
    },
    module: {
        rules: [
            {
                test: /\.ts$/, // This rule applies to typescript files (.ts)
                exclude: /node_modules/, // Exclude files in the node_modules directory
                use: [
                    {
                        loader: 'babel-loader', // Use babel-loader to transpile JavaScript files
                        options: {presets: ['@babel/preset-env']} // Use @babel/preset-env for transpilation
                    },
                    'ts-loader' // Use ts-loader for transpilation
                ]
            },
            {
                test: /\.js$/, // This rule applies to javascript files (.js)
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
    },
    resolve: {
        extensions: ['.ts', '.js']
    }

}