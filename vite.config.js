import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css'
                , 'resources/js/app.js'
                , 'resources/js/ClientSide/main.js'
                , 'resources/js/ClientSide/home/main.js'
                , 'resources/js/ClientSide/header.js'
                , 'resources/js/Dashboard/main.js'
                , 'resources/js/Dashboard/Services/OffPlan/main.js'
                , 'resources/js/Dashboard/Services/OffPlan/create.js'
                , 'resources/js/Dashboard/Services/OffPlan/edit.js'
                , 'resources/js/auth/login.js'
                , 'resources/js/Dashboard/Services/Service/main.js'
                , 'resources/js/Dashboard/Services/Cover/main.js'
                , 'resources/scss/main.scss',
                'resources/js/auth/helpers/checkToken.js'
                , 'resources/SCSS/custom/ClientSide/styles.scss'
                , 'resources/SCSS/custom/style.scss'
                , 'resources/SCSS/custom/responsive.scss'
                , 'resources/js/ClientSide/Services/ExclusiveProperty/list.js'
                , 'resources/js/ClientSide/Services/Project/register.js'
                , 'resources/js/Dashboard/Services/Partner/main.js'
                , 'resources/js/Dashboard/Services/Setting/main.js'
                , 'resources/js/Dashboard/Services/ExclusiveProperty/main.js'
                , 'resources/js/Dashboard/Services/Feedback/main.js'
                , 'resources/js/Dashboard/Services/Contact/main.js'
                , 'resources/js/Dashboard/Services/OffPlan/Customer/main.js'

            ],
            refresh: true,
        }),
    ],
});
