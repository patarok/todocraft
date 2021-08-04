module.exports = {
    corePlugins: {opacity: true,},
    mode: 'jit',
    purge: ["./templates/**/*.twig"],
    //purge: false,
    theme: {
        screens: {
            sm: '640px',
            md: '768px',
            st: '864px',
            lg: '1024px',
            xl: '1280px',
            '2xl': '1536px',
        },
        container: {
            center: true,

            padding: {
                DEFAULT: '0',
                sm: '0',
                lg: '0',
                xl: '0',
                '2xl': '0',
            },
        },
        extend: {
            margin: {
                '-32': '-8rem',
            },
            spacing: {
                13: "3.25rem",
                15: "3.75rem",
                56: "14rem",
                80: "20rem",
                84: "21rem",
                88: "22rem",
                92: "23rem",
                96: "24rem",
                104: "26rem",
                112: "28rem",
                120: "30rem",
                128: "32rem",
                136: "34rem",
                144: "36rem",
                160: "40rem",
                184: "46rem",
                200: "50rem",
                220: "55rem",
            },
            colors: {
                "green": {
                    DEFAULT: "#94C120", // bg-green
                    light: 'rgba(148,193,32,0.52)', // bg-green-light
                },
                "blue": {
                    DEFAULT: "#0086ac",
                },
                "orange": {
                    DEFAULT: "#ec7506",
                    light: "#ffa556"
                }
            },
            padding: {
                "inherit": 'inherit',
            },
            maxWidth: {
                16: '4rem',
                20: '5rem',
                24: '6rem',
                28: '7rem',
                36: '9rem',
                40: '10rem',
                56: "14rem",
                80: "20rem",
                84: "21rem",
                88: "22rem",
                92: "23rem",
                96: "24rem",
                104: "26rem",
                128: '32rem',
                144: '36rem',
                160: '40rem',
                184: "46rem",
                200: "50rem",
                220: "55rem",
            },
            maxHeight: {
                16: '4rem',
                20: '5rem',
                24: '6rem',
                28: '7rem',
                36: '9rem',
                40: '10rem',
                56: "14rem",
                80: "20rem",
                84: "21rem",
                88: "22rem",
                92: "23rem",
                96: "24rem",
                104: "26rem",
                128: '32rem',
                144: '36rem',
                160: '40rem',
                184: "46rem",
                200: "50rem",
                220: "55rem",
            },
            minWidth: {
                16: '4rem',
                20: '5rem',
                28: '7rem',
                40: '10rem',
                56: "14rem",
                80: "20rem",
                84: "21rem",
                88: "22rem",
                92: "23rem",
                96: "24rem",
                104: "26rem",
                128: '32rem',
                144: '36rem',
                160: '40rem',
                184: "46rem",
                200: "50rem",
                220: "55rem",
            },
            minHeight: {
                0: "0px",
                16: '4rem',
                20: '5rem',
                28: '7rem',
                40: '10rem',
                56: "14rem",
                80: "20rem",
                84: "21rem",
                88: "22rem",
                92: "23rem",
                96: "24rem",
                104: "26rem",
                120: "30rem",
                128: '32rem',
                144: '36rem',
                160: '40rem',
                184: "46rem",
                200: "50rem",
                220: "55rem",
                'full': "100%",
                'screen': "100%",
            },
            fontFamily: {//entsprechend design anpassen
                "sans": ["Fira", "sans-serif"],
                "serif": ["\"Bodoni Moda\"", "serif"] // Ensure fonts with spaces have " " surrounding it.
            },
            fontSize: {
                '2xs': ['0.5rem', {
                    lineHeight: '0.75rem',
                }],
            },
        },
    },
    variants: {
        width: ['responsive', 'first', 'last'],
        height: ['responsive', 'first', 'last'],
        margin: ['responsive', 'first', 'last'],
        padding: ['responsive', 'first', 'last'],
    },
    plugins: [],
};
