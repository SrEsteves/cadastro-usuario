<template>
  <v-footer app>
    <v-col class="text-center" cols="12">
      &copy; {{ new Date().getFullYear() }} - Minha Aplicação
    </v-col>
  </v-footer>
</template>

<script>
export default {
  name: 'AppFooter',
};
</script>