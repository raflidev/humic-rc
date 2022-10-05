/** @type {import('tailwindcss').Config} */
module.exports = {
content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
],
  theme: {
    extend: {
        fontFamily: {
            poppins: ['poppins', 'sans-serif'],
        },
        spacing: {
            '128': '32rem',
        },
    },
  },
  plugins: [],
}
