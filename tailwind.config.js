module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    height: {
      vid: '65vh',
      smVid: '45vh'
    },
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
    // textColor: theme => theme('colors'),
    // textColor: {
    //   slayText: '#eb822a'
    // },
    extend: {
      stroke: {
        current: '#fcfdff'
      },
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
      
      // backgroundImage: {
      //   cad: "url(/public/assets/footies1.PNG)",
      //   cad2: "url(/public/assets/cloth2.PNG)",
      //   cad3: "url(/public/assets/cloth1.PNG)",
      //   cad4: "url(/public/assets/cloth3.PNG)",
      // }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
