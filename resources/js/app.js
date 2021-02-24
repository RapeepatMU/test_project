require('./bootstrap');

window.Vue = require('vue').default

Vue.component('transaction',require('./components/TransactionPage').default)


const app  = new Vue({
   
}).$mount('#app');