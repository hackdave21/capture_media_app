import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                'montserrat': ['Montserrat', ...defaultTheme.fontFamily.sans],
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                yellow: {
                    50: '#fffbeb',
                    100: '#fef3c7',
                    200: '#fde68a',
                    300: '#fcd34d',
                    400: '#fbbf24',
                    500: '#f59e0b',
                    600: '#d97706',
                    700: '#b45309',
                    800: '#92400e',
                    900: '#78350f',
                },
                gray: {
                    50: '#f9fafb',
                    100: '#f3f4f6',
                    200: '#e5e7eb',
                    300: '#d1d5db',
                    400: '#9ca3af',
                    500: '#6b7280',
                    600: '#4b5563',
                    700: '#374151',
                    800: '#1f2937',
                    900: '#111827',
                },
            },
            spacing: {
                '18': '4.5rem',
                '88': '22rem',
                '92': '23rem',
                '96': '24rem',
                '100': '25rem',
                '104': '26rem',
                '108': '27rem',
                '112': '28rem',
                '116': '29rem',
                '120': '30rem',
            },
            maxWidth: {
                '8xl': '88rem',
                '9xl': '96rem',
            },
            animation: {
                'bounce-slow': 'bounce 3s infinite',
                'ping-slow': 'ping 3s cubic-bezier(0, 0, 0.2, 1) infinite',
                'pulse-slow': 'pulse 3s ease-in-out infinite',
                'spin-slow': 'spin 3s linear infinite',
                'fade-in': 'fadeIn 0.5s ease-in',
                'slide-in': 'slideIn 0.5s ease-out',
                'scale-in': 'scaleIn 0.3s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideIn: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                scaleIn: {
                    '0%': { transform: 'scale(0.9)', opacity: '0' },
                    '100%': { transform: 'scale(1)', opacity: '1' },
                },
            },
            aspectRatio: {
                '4/3': '4 / 3',
                '16/10': '16 / 10',
                '21/9': '21 / 9',
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        '--tw-prose-body': theme('colors.gray.700'),
                        '--tw-prose-headings': theme('colors.gray.900'),
                        '--tw-prose-links': theme('colors.yellow.600'),
                        '--tw-prose-links-hover': theme('colors.yellow.700'),
                        '--tw-prose-bold': theme('colors.gray.900'),
                        '--tw-prose-counters': theme('colors.gray.500'),
                        '--tw-prose-bullets': theme('colors.gray.400'),
                        '--tw-prose-hr': theme('colors.gray.200'),
                        '--tw-prose-quotes': theme('colors.gray.900'),
                        '--tw-prose-quote-borders': theme('colors.yellow.500'),
                        '--tw-prose-captions': theme('colors.gray.500'),
                        '--tw-prose-kbd': theme('colors.gray.900'),
                        '--tw-prose-kbd-shadows': theme('colors.gray.900'),
                        '--tw-prose-code': theme('colors.gray.900'),
                        '--tw-prose-pre-code': theme('colors.gray.100'),
                        '--tw-prose-pre-bg': theme('colors.gray.800'),
                        '--tw-prose-th-borders': theme('colors.gray.300'),
                        '--tw-prose-td-borders': theme('colors.gray.200'),
                        
                        // Dark mode
                        '--tw-prose-invert-body': theme('colors.gray.300'),
                        '--tw-prose-invert-headings': theme('colors.white'),
                        '--tw-prose-invert-links': theme('colors.yellow.400'),
                        '--tw-prose-invert-links-hover': theme('colors.yellow.300'),
                        '--tw-prose-invert-bold': theme('colors.white'),
                        '--tw-prose-invert-counters': theme('colors.gray.400'),
                        '--tw-prose-invert-bullets': theme('colors.gray.500'),
                        '--tw-prose-invert-hr': theme('colors.gray.700'),
                        '--tw-prose-invert-quotes': theme('colors.gray.100'),
                        '--tw-prose-invert-quote-borders': theme('colors.yellow.500'),
                        '--tw-prose-invert-captions': theme('colors.gray.400'),
                        '--tw-prose-invert-kbd': theme('colors.white'),
                        '--tw-prose-invert-kbd-shadows': theme('colors.white'),
                        '--tw-prose-invert-code': theme('colors.white'),
                        '--tw-prose-invert-pre-code': theme('colors.gray.300'),
                        '--tw-prose-invert-pre-bg': theme('colors.gray.900'),
                        '--tw-prose-invert-th-borders': theme('colors.gray.600'),
                        '--tw-prose-invert-td-borders': theme('colors.gray.700'),
                    },
                },
            }),
        },
    },

    plugins: [
        forms,
        typography,
        function({ addUtilities }) {
            const newUtilities = {
                '.text-shadow': {
                    textShadow: '0 2px 4px rgba(0,0,0,0.10)',
                },
                '.text-shadow-md': {
                    textShadow: '0 4px 8px rgba(0,0,0,0.12), 0 2px 4px rgba(0,0,0,0.08)',
                },
                '.text-shadow-lg': {
                    textShadow: '0 15px 35px rgba(0,0,0,0.1), 0 5px 15px rgba(0,0,0,0.07)',
                },
                '.text-shadow-none': {
                    textShadow: 'none',
                },
            }
            addUtilities(newUtilities)
        }
    ],
};