// module.exports = {
//     devServer: {
//         proxy: 'https://portal.zettatel.com',
//         proxy: 'https://wa.me',
//     }

// }

module.exports = {
    devServer: {
        // This will forward any request that does not match a static file to localhost:3000
        proxy: 'http://localhost:8000',
        proxy: 'http://localhost:3000'
        // proxy: 'https://portal.zettatel.com',
    }
}

// module.exports = {
//     devServer: {
//         port: 3000,
//         proxy: "https://portal.zettatel.com"
//     }
// }

// module.exports = {
//     devServer: {
//         host: 'app.vue',
//         port: 8080,
//         https: false
//     }
// }


