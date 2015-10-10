module.exports = {
    entry: {
        dict:"./resources/assets/js/dict.js",
        user:"./resources/assets/js/user.js",
        area:"./resources/assets/js/area.js"
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