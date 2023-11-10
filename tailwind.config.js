/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/**/*.{html,js,php}"], // Memuat semua file HTML, JS, dan PHP dalam folder views di dalam app
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: ["light", "dark", "cupcake"],
  },
};
