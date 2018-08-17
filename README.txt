// SASS directions //

A lot of values can be changed with variables from the sass/abstracts/variables.scss partial.

Add custom @font-face's to sass/base/fonts.scss.

Using rems as units -> 1rem = 10px in the "normal" breakpoints between 1200px - 1800px.

Add global custom styles to sass/themes/default.scss, overwrite values there, it's not recommended to change other partials for easier upgrades.

If you want to overwrite a global value for a particular page only create a new partial in sass/pages/ and then import it in main.scss.

Grid: using bootstrap classes with flex (float as fallback for older browser). Usage is the same as bootstrap: ie. col-md-6 col-xs-9, you can combine multiple classes. You can use the single "col" class to have the same width containers with unspecified or unknown count, these are not floated, you have to do it manually to have the fallback. Don't use col with col-md-6!

// NPM and package.json directions //

It is recommended to autoprefix and minify css, for that you will need the npm modules saved in the package.json.

1. Install modules via the terminal with -> npm install

2. To autoprefix css -> npm run prefix:css

3. To minify css -> npm run compress:css

4. To both autoprefix and minify css -> npm run build:css

The default output is style.min.css so you have to add it to functions.php or change the output file in the package.json

5. To combine and minify javascript -> npm merg-min:js

The default output is pad.min.js so you have to add it to functions.php or change the output file in the package.json

6. To autoprefix and minify css, and minify js all at the same time -> npm run final-build