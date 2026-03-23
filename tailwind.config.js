import daisyui from "daisyui"

/** @type {import('tailwindcss').Config} */
export default {
  darkMode: "selector",
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: ["mockup-code"],
  theme: {
    extend: {},
  },
  plugins: [daisyui],

  daisyui: {
    themes: ["light"],
    darkTheme: "light",
    base: true,
    styled: true,
    utils: true,
    prefix: "",
    logs: true,
    themeRoot: ":root",
  },
}
