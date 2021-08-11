# Purdue WordPress Theme
WordPress theme based on Purdue University's digital brand standards.

## Getting Started

### Prerequisites

In order to effectively use this theme please become familar with the following materials
1. [The Gutenberg editing experience](https://wordpress.org/gutenberg/)
2. [Developers Adoption Guide - WordPress Gutenberg Editor](https://pantheon.io/sites/default/files/pdf/Pantheon-ebook-GutenbergAdoptionGuide.pdf)
3. [Purdue Digital Brand Standards](https://brand.purdue.edu/digital)
4. [Bulma CSS Framework](https://bulma.io/documentation/)

### Installing

The prefered method of using this theme is by including it in the composer.json file of your project.

```

"require": {
    "purdue/purdue-wp-theme": "1.6.*",
},

```

You will also need to add the Purdue repository to your composer.json file 

```
"repositories": [
    {
      "type": "composer",
      "url": "https://wpackagist.org"
    },
    {
      "type": "composer",
      "url": "https://purdue.github.io"
    }
  ],

```

If your project does not use composer for dependency management, the theme can be installed by adding the folder to the wp-content/themes folder in your WordPress install.  For the best experience, you should also install [BoilerUp WP](https://github.com/Purdue/boilerup-wp), [Bulma Blocks](https://github.com/Purdue/bulma-blocks) and [Purdue Blocks](https://github.com/Purdue/purdue-blocks) plugins.

