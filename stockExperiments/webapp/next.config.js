const withCSS = require('@zeit/next-css');
const { publicRuntimeConfig } = require('./next.runtimeConfig');
/*
require('dotenv').config();
const path = require('path');
const Dotenv = require('dotenv-webpack');
 */

module.exports = withCSS({
    publicRuntimeConfig,
    webpack: (config) => {

        config.module.rules.push({
            test: /\.(graphql|gql)$/,
            exclude: /node_modules/,
            loader: 'graphql-tag/loader',
        });

        config.plugins = config.plugins || []

        config.plugins = [
            ...config.plugins,

            /* Read the .devEnv file; however, we are not going to use .env anymore
            new Dotenv({
              path: path.join(__dirname, '.devEnv'),
              systemvars: true,
            }),
            */
        ];

        config.node = {
            fs: 'empty',
        };

        return config;
    },
});
