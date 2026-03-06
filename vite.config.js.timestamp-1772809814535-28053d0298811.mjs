// vite.config.js
import { defineConfig } from "file:///D:/Workspace/base_platform/node_modules/vite/dist/node/index.js";
import laravel from "file:///D:/Workspace/base_platform/node_modules/laravel-vite-plugin/dist/index.mjs";
import sass from "file:///D:/Workspace/base_platform/node_modules/sass/sass.node.mjs";
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.scss",
        "resources/js/app.js",
        "resources/css/app_backend.scss",
        "resources/js/app.backend.js",
        "resources/css/homely.scss",
        "resources/js/homely.js"
      ],
      refresh: true
    })
  ],
  css: {
    preprocessorOptions: {
      scss: {
        sourceMap: true,
        // 👈 bật sourcemap cho scss,
        silenceDeprecations: ["legacy-js-api"]
      }
    },
    devSourcemap: true
  },
  build: {
    sourcemap: false
    // Tắt hoàn toàn source map cho production build
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJEOlxcXFxXb3Jrc3BhY2VcXFxcYmFzZV9wbGF0Zm9ybVwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiRDpcXFxcV29ya3NwYWNlXFxcXGJhc2VfcGxhdGZvcm1cXFxcdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL0Q6L1dvcmtzcGFjZS9iYXNlX3BsYXRmb3JtL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XHJcbmltcG9ydCBsYXJhdmVsIGZyb20gJ2xhcmF2ZWwtdml0ZS1wbHVnaW4nO1xyXG5pbXBvcnQgc2FzcyBmcm9tICdzYXNzJztcclxuXHJcbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XHJcbiAgICBwbHVnaW5zOiBbXHJcbiAgICAgICAgbGFyYXZlbCh7XHJcbiAgICAgICAgICAgIGlucHV0OiBbXHJcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9hcHAuc2NzcycsXHJcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2FwcC5qcycsXHJcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9hcHBfYmFja2VuZC5zY3NzJyxcclxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvanMvYXBwLmJhY2tlbmQuanMnLFxyXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9jc3MvaG9tZWx5LnNjc3MnLFxyXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9qcy9ob21lbHkuanMnXHJcbiAgICAgICAgICAgIF0sXHJcbiAgICAgICAgICAgIHJlZnJlc2g6IHRydWUsXHJcbiAgICAgICAgfSksXHJcbiAgICBdLFxyXG4gICAgY3NzOiB7XHJcbiAgICAgICAgcHJlcHJvY2Vzc29yT3B0aW9uczoge1xyXG4gICAgICAgICAgICBzY3NzOiB7XHJcbiAgICAgICAgICAgICAgICBzb3VyY2VNYXA6IHRydWUsICAgLy8gXHVEODNEXHVEQzQ4IGJcdTFFQUR0IHNvdXJjZW1hcCBjaG8gc2NzcyxcclxuICAgICAgICAgICAgICAgIHNpbGVuY2VEZXByZWNhdGlvbnM6IFsnbGVnYWN5LWpzLWFwaSddXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgfSxcclxuICAgICAgICBkZXZTb3VyY2VtYXA6IHRydWVcclxuICAgIH0sXHJcbiAgICBidWlsZDoge1xyXG4gICAgICAgIHNvdXJjZW1hcDogZmFsc2UsIC8vIFRcdTFFQUZ0IGhvXHUwMEUwbiB0b1x1MDBFMG4gc291cmNlIG1hcCBjaG8gcHJvZHVjdGlvbiBidWlsZFxyXG4gICAgfSxcclxufSk7XHJcbiJdLAogICJtYXBwaW5ncyI6ICI7QUFBc1EsU0FBUyxvQkFBb0I7QUFDblMsT0FBTyxhQUFhO0FBQ3BCLE9BQU8sVUFBVTtBQUVqQixJQUFPLHNCQUFRLGFBQWE7QUFBQSxFQUN4QixTQUFTO0FBQUEsSUFDTCxRQUFRO0FBQUEsTUFDSixPQUFPO0FBQUEsUUFDSDtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsTUFDSjtBQUFBLE1BQ0EsU0FBUztBQUFBLElBQ2IsQ0FBQztBQUFBLEVBQ0w7QUFBQSxFQUNBLEtBQUs7QUFBQSxJQUNELHFCQUFxQjtBQUFBLE1BQ2pCLE1BQU07QUFBQSxRQUNGLFdBQVc7QUFBQTtBQUFBLFFBQ1gscUJBQXFCLENBQUMsZUFBZTtBQUFBLE1BQ3pDO0FBQUEsSUFDSjtBQUFBLElBQ0EsY0FBYztBQUFBLEVBQ2xCO0FBQUEsRUFDQSxPQUFPO0FBQUEsSUFDSCxXQUFXO0FBQUE7QUFBQSxFQUNmO0FBQ0osQ0FBQzsiLAogICJuYW1lcyI6IFtdCn0K
