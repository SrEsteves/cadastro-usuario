<template>
  <v-navigation-drawer app color="primary" dark>
    <v-list nav>
      <v-list-item-group v-model="activeItem" mandatory>
        <v-list-item to="/" exact>
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item to="/cadastro" exact>
          <v-list-item-content>
            <v-list-item-title>Cadastro</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
  name: 'AppSidebar',
  data() {
    return {
      activeItem: null,
    };
  },
  watch: {
    $route: {
      immediate: true,
      handler(to) {
        this.activeItem = to.path;
      },
    },
  },
};
</script>

<style scoped>
.v-list-item {
  display: flex;
  align-items: center;
}

.v-list-item__icon {
  margin-right: 12px; 
}

.v-list-item__title {
  font-size: 20px;
  font-weight: 500; 
}
</style>
