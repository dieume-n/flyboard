const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Inter var', ...defaultTheme.fontFamily.sans]
      },

    }
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'active'],
    outline: ['focus', 'responsive', 'hover'],
  },
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
