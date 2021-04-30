/* eslint-disable */

const cssnanoconfig = {
  preset: ['default', { discardcomments: { removeall: true } }]
};

module.exports = ({ file, options }) => {
  return {
    parser: options.enabled.optimize ? 'postcss-safe-parser' : undefined,
    plugins: {
      // I’m using the to get the assets path (see config.js),
      // but you could just use the absolute path instead.
      tailwindcss: `${options.paths.assets}/styles/tailwind.config.js`,
      cssnano: options.enabled.optimize ? cssnanoconfig : false,
      autoprefixer: true,
    },
  };
};

const uncssConfig = {
  html: [
    'http://example.test',
    // Your entire sitemap added manually
    // or some other way if you’re clever (wget is handy for this).
  ]
};

// ...

module.exports = ({ file, options }) => {
  return {
    parser: options.enabled.optimize ? 'postcss-safe-parser' : undefined,
    plugins: {
      'postcss-uncss': options.enabled.optimize ? uncssConfig : false, // ← Add the plugin
      cssnano: options.enabled.optimize ? cssnanoConfig : false,
      autoprefixer: true,
    },
  };
};
