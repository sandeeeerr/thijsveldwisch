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
        normal: '300',
      },
      fontSize: {
        '10xl': '10rem', 
        '11xl': '11rem', 
      },
    },
  },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
