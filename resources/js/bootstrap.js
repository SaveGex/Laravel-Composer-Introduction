import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// HMR для Vite
if (import.meta.hot) {
    import.meta.hot.accept();
}
