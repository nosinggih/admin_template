module.exports = {
  eleventyComputed: {
    permalink: (data) => {
      let stem = data.page.filePathStem; // e.g. "/pages/index" or "/pages/components/buttons"
      if (stem.startsWith('/pages/')) {
        stem = stem.substring(6); // remove "/pages" -> "/index" or "/components/buttons"
      }
      if (stem === '/index') {
        return '/index.html';
      }
      if (stem.endsWith('/index')) {
        return stem.substring(0, stem.length - 6) + '/index.html';
      }
      return `${stem}/index.html`;
    }
  }
};
