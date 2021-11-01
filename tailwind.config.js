module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    backgroundColor: theme => ({
      ...theme('colors'),
      bgPry: '#b7b7b7',
      bgSec: '#010101',
      slay: '#eb822a'
    }),
    textColor: theme => ({
      ...theme('colors'),
      slayText: '#eb822a'
    }),
    minWidth: {
      profie: '80%',
      odd: '18%'
    },
    extend: {
      width: {
        navWidth: '96%',
        smWidth: '97%',
        inptW: '25%',
        iconW: '35%',
        slid: '50%',
        sideNav: '18%',
        slide: '20%',
      },
      fontFamily: {
        slayFont: ['Nunito']
      },
      stroke: {
        current: '#ffffff'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
