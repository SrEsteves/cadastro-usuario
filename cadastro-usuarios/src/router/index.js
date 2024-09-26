import { createRouter, createWebHistory } from 'vue-router';
import DefaultLayout from '@/layouts/DefaultLayout.vue';
import HomeView from '@/views/HomeView.vue';
import CadastroView from '@/views/CadastroView.vue';

const routes = [
  {
    path: '/',
    component: DefaultLayout,
    children: [
      {
        path: '',
        name: 'Home',
        component: HomeView,
      },
      {
        path: 'cadastro',
        name: 'Cadastro',
        component: CadastroView,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;