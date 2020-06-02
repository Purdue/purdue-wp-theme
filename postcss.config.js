module.exports = {
    plugins: {
        'postcss-preset-env': {
            autoprefixer: {
                grid: 'autoplace'
            },
            browsers: [
                'IE >= 11',
                '> 0.1%'
            ]
        }
    }
};