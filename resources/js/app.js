require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'

const el = document.getElementById('app')

createApp({
    render:() => h(App, {
        initial
    })
})
