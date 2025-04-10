import {createRouter, createWebHistory} from 'vue-router';

export default createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'HomePage',
      component: () => import('@pages/HomePage.vue'),
    },
    {
      path: '/about',
      name: 'AboutPage',
      component: () => import('@pages/AboutPage.vue'),
    },
    {
      path: '/contact',
      name: 'ContactPage',
      component: () => import('@pages/AboutPage.vue'),
    },
    {
      path: '/career',
      name: 'CareerPage',
      component: () => import('@pages/CareerPage.vue'),
    },
  ],
});
