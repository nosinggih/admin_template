const fs = require("fs");
const path = require("path");

module.exports = function(eleventyConfig) {
  // Passthrough copy assets and fonts
  eleventyConfig.addPassthroughCopy({ "src/assets": "assets" });
  eleventyConfig.addPassthroughCopy({ "src/assets/img/favicon.svg": "favicon.ico" });
  eleventyConfig.addPassthroughCopy({ "node_modules/@fontsource/inter/files": "assets/fonts" });
  eleventyConfig.addPassthroughCopy({ "node_modules/flatpickr/dist/flatpickr.min.js": "assets/vendor/flatpickr.min.js" });
  eleventyConfig.addPassthroughCopy({ "node_modules/flatpickr/dist/flatpickr.min.css": "assets/vendor/flatpickr.min.css" });
  eleventyConfig.addPassthroughCopy({ "node_modules/tom-select/dist/js/tom-select.complete.min.js": "assets/vendor/tom-select.complete.min.js" });
  eleventyConfig.addPassthroughCopy({ "node_modules/tom-select/dist/css/tom-select.bootstrap5.min.css": "assets/vendor/tom-select.bootstrap5.min.css" });

  // Inline SVG Tabler Icons shortcode
  eleventyConfig.addShortcode("icon", function(name, opts = {}) {
    const type = opts.type || "outline";
    let iconPath = path.join(__dirname, "node_modules/@tabler/icons/icons", type, `${name}.svg`);
    if (!fs.existsSync(iconPath)) {
      iconPath = path.join(__dirname, "node_modules/@tabler/icons/icons/outline", `${name}.svg`);
    }
    if (!fs.existsSync(iconPath)) {
      iconPath = path.join(__dirname, "node_modules/@tabler/icons/icons", `${name}.svg`);
    }
    if (!fs.existsSync(iconPath)) {
      return `<!-- icon ${name} not found -->`;
    }

    let svg = fs.readFileSync(iconPath, "utf-8");
    if (opts.class) {
      svg = svg.replace("<svg", `<svg class="${opts.class}"`);
    }
    return svg;
  });

  return {
    dir: {
      input: "src",
      includes: "_includes",
      data: "_data",
      output: "dist"
    },
    htmlTemplateEngine: "njk",
    markdownTemplateEngine: "njk",
    templateFormats: ["html", "njk", "md"]
  };
};
