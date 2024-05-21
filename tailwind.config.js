/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    ldfy: {
      "primary": "#1c1917",
      "secondary": "#ea580c",
      "accent": "#2563eb",
      "neutral": "#fff",
      "base-100": "#6b7280",
      "info": "#6366f1",
      "success": "#4ade80",
      "warning": "#e11d48",
      "error": "#ff0000",
    },
  },
  plugins: [require('daisyui')],
}

