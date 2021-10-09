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
      },
      fontFamily: {
        slayFont: ['Nunito']
      },
      // transform: {
      //   cad: 'translate(-50%, -50%)'
      // }
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
