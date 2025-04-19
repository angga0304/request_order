import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import DataTablesLib from 'datatables.net'; 
import DataTable from 'datatables.net-vue3';
import axios from 'axios';
import VueAxios from 'vue-axios';
// import VueAxios from 'vue-axios';

DataTable.use(DataTablesLib);

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueAxios, axios)
            .component('DataTable', DataTable) 
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
