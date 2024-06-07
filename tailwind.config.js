/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './public/**/*.{php, html}',
    './templates/**/*.{php, html}',
    './src/**/*.{js,jsx,ts,tsx}',
    './dist/**/*.{js,jsx,ts,tsx}',
  ],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui'),],
}
