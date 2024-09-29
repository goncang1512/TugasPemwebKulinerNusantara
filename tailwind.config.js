/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./*.{php}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    colors: {
      primary: "#22C55E",
    },
    extend: {},
  },
  plugins: [require("flowbite/plugin")],
};
