<<<<<<< HEAD
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
=======
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
<<<<<<< HEAD
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
=======
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
            },
        },
    },

<<<<<<< HEAD
    plugins: [forms],
=======
    plugins: [require('@tailwindcss/forms')],
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
};
