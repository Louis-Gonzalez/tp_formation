const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {
        path: path.resolve(__dirname, 'public/assets/build/js'),
        filename: 'main.js',
    },
    module: {
        rules: [
            {
                test: /\.(js)$/,
                exclude: /node_modules/,
                use: ['babel-loader']
            },
            {
                test: /\.css$/,
                use: [
                        { loader: 'style-loader' },
                        {
                            loader: 'css-loader',
                                options: {modules: true,
                                },
                        },
                ],
            }
        ]
    },
    mode: "development",
    resolve: {
        extensions: ['*', '.js']
    },
};