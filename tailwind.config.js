const { NOT_ON_DEMAND } = require('tailwindcss/lib/lib/sharedState');

module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/wireui/wireui/resources/**/*.blade.php',
      './vendor/wireui/wireui/ts/**/*.ts',
      './vendor/wireui/wireui/src/View/**/*.php',
      "./node_modules/tw-elements/dist/js/**/*.js"
    ],
    theme: {
      extend: {
        flexGrow: {
            2: '2',
            3: '3',
            4: '4'
          },
          flexBasis: {
            '1/5': '20%',
            '2/5': '40%',
            '3/5': '60%',
            '4/5': '80%',
            '1/7': '14.2857143%',
            '2/7': '28.5714286%',
            '3/7': '42.8571429%',
            '4/7': '57.1428571%',
            '5/7': '71.4285714%',
            '6/7': '85.7142857%',
          },


          animation:{
            entrance:'entrance 0.6s ease-in-out ',
            dropdown:'dropdown 0.6s ease-out ',
            entrance000:'entrance 0.3s ease-in-out',
            entrance100:'entrance 0.6s ease-in 0.1s',
            entrance200:'entrance 0.6s ease-in 0.2s',
            entrance300:'entrance 0.6s ease-in 0.3s',
            entrance400:'entrance 0.6s ease-in 0.6s',
            entrance500:'entrance 0.6s ease-in 0.5s',
            entrance600:'entrance 0.6s ease-in 0.6s',
            entrance700:'entrance 0.6s ease-in 0.7s',
            entrance800:'entrance 0.6s ease-in 0.8s',
            entrance900:'entrance 0.6s ease-in 0.9s',

          },
          keyframes:{
              entrance:{
                  '0%':{
                      opacity:'0.25',
                    transform:'translateX(-25%)',
                  },
                  '25%':{
                    opacity:'0.25',
                    transform:'translateX(-15%)',
                    // AnimationTimingFunction:'ease-in-out'
                  },
                  '50%':{
                    opacity:'0.75',
                    transform:'translateX(-5%)',
                  },
                  '75%':{
                    opacity:'1',
                    transform:'translateX(5%)',
                  },
                  '100%':{
                    transform:'translateX(0%)',
                  }
              },
              dropdown:{
                  '0%':{
                      visibility:'visible',
                      opacity:'0',
                    transform:'translateY(-20px)',
                  },
                  '25%':{
                    visibility:'visible',
                    opacity:'0.25',
                    transform:'translateY(-10px)',
                    // AnimationTimingFunction:'ease-in-out'
                },
                  '50%':{
                      opacity:'0.75',
                    transform:'translateY(-5px)',
                },
                '75%':{
                    opacity:'1',
                    transform:'translateY(10px)',
                },
                '100%':{
                    opacity:'1',
                    visibility:'visible',
                      transform:'translateY(0px)',
                  }
              }
          }
      },
    },
    plugins: [require('tailwind-scrollbar'),require("tw-elements/dist/plugin.cjs")],
    variants: {
        scrollbar: ['rounded']
    }
  }
