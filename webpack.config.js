const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
    devServer: {
        // port: 3000,
        proxy: "https://portal.zettatel.com/"
    }
};
