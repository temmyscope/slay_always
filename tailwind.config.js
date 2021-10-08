module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    backgroundColor: theme => ({
      ...theme('colors'),
      bgPry: '#010101'
    }),
    extend: {
      stroke: {
        current: '#ffffff'
      },
      width: {
        navWidth: '96%',
        smWidth: '97%',
        inptW: '25%',
        iconW: '35%',
        slid: '50%'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
