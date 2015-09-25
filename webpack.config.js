module.exports = {
    entry: {
        dict:"./resources/assets/js/dict.js"
    },
    output: {
        path: __dirname+ '/public/js',
        filename: "[name].js"
    },
    module: {
        loaders: [
            { test: /\.css$/, loader: "style!css" },
            { test: /\.vue$/, loader: "vue" },
        ]
    }
};