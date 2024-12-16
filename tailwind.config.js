/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './app/**/*.php',
    './config/**/*.php',
    './resources/**/*.{php,js}',
    './storage/framework/views/*.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: colors.blue,
      },
      fontFamily: {
        'neue-haas': ['"Neue Haas Display"', 'sans-serif'],
      },
      fontWeight: {
        normal: '300', // Standaard font-normal aanpassen naar 300
      },
    },
  },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
