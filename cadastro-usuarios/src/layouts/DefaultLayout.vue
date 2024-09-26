<template>
    <v-app>
      <AppNavbar />
      <AppSidebar />
      <v-main>
        <v-container flui>
          <router-view />
        </v-container>
      </v-main>
      <AppFooter />
    </v-app>
  </template>
  
  <script>
  import AppNavbar from '@/components/AppNavbar.vue';
  import AppSidebar from '@/components/AppSidebar.vue';
  import AppFooter from '@/components/AppFooter.vue';
  
  export default {
    components: {
      AppNavbar,
      AppSidebar,
      AppFooter,
    },
  };
  </script>