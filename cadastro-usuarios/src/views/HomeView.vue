<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" md="8">
        <v-card>
          <v-card-title class="headline">Dashboard</v-card-title>
          <v-card-text>
            <v-row>
              <v-col cols="12" sm="6">
                <v-card outlined>
                  <v-card-title>Total de Usuários</v-card-title>
                  <v-card-text class="display-1 text-center">
                    {{ totalUsers }}
                  </v-card-text>
                </v-card>
              </v-col>
              <v-col cols="12" sm="6">
                <v-card outlined>
                  <v-card-title>Usuários Criados Hoje</v-card-title>
                  <v-card-text class="display-1 text-center">
                    {{ usersCreatedToday }}
                  </v-card-text>
                </v-card>
              </v-col>
            </v-row>
            <v-data-table
              :headers="headers"
              :items="recentUsers"
              class="mt-4"
            ></v-data-table>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: 'HomeView',
  data() {
    return {
      totalUsers: 0,
      usersCreatedToday: 0,
      headers: [
        { text: 'Nome', value: 'name' },
        { text: 'E-mail', value: 'email' },
        { text: 'Data de Criação', value: 'created_at' },
      ],
      recentUsers: [],
    };
  },
  mounted() {
    // Aqui você fará uma chamada à API para obter os dados reais
    this.fetchDashboardData();
  },
  methods: {
    async fetchDashboardData() {

      this.totalUsers = 100;
      this.usersCreatedToday = 5;
      this.recentUsers = [
        { name: 'João Silva', email: 'joao@example.com', created_at: '2023-09-26' },
        { name: 'Maria Santos', email: 'maria@example.com', created_at: '2023-09-25' },
        
      ];
    },
  },
};
</script>