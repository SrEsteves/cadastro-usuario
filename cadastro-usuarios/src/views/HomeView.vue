<template>
  <v-container fluid class="dashboard-container">
    <v-row justify="center">
      <v-col cols="12" md="10">
        <h1 class="text-h3 mb-6 text-center">Dashboard de Usuários</h1>
        <v-row>
          <v-col cols="12" sm="6">
            <v-card class="mx-auto" elevation="2">
              <v-card-text class="d-flex align-center">
                <v-icon size="48" color="primary" class="mr-4">mdi-account-group</v-icon>
                <div>
                  <div class="text-h6">Total de Usuários</div>
                  <div class="text-h4">{{ totalUsers }}</div>
                </div>
              </v-card-text>
            </v-card>
          </v-col>
          <v-col cols="12" sm="6">
            <v-card class="mx-auto" elevation="2">
              <v-card-text class="d-flex align-center">
                <v-icon size="48" color="success" class="mr-4">mdi-account-plus</v-icon>
                <div>
                  <div class="text-h6">Usuários Criados Hoje</div>
                  <div class="text-h4">{{ usersCreatedToday }}</div>
                </div>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
        <v-card outlined class="mt-6" elevation="2">
          <v-card-title>Novos Usuários nos Últimos 3 Meses</v-card-title>
          <v-card-text>
            <canvas ref="chartCanvas"></canvas>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios';
import Chart from 'chart.js/auto';

export default {
  name: 'HomeView',
  data() {
    return {
      totalUsers: 0,
      usersCreatedToday: 0,
      chart: null,
    };
  },
  mounted() {
    this.fetchDashboardData();
  },
  methods: {
    async fetchDashboardData() {
      try {
        const response = await axios.get('/api/dashboard');
        const data = response.data;
        this.totalUsers = data.totalUsers;
        this.usersCreatedToday = data.usersCreatedToday;
        this.createChart(data.lastThreeMonths);
      } catch (error) {
        console.error('Erro ao buscar dados do dashboard:', error);
      }
    },
    createChart(lastThreeMonths) {
      const ctx = this.$refs.chartCanvas.getContext('2d');
      if (this.chart) {
        this.chart.destroy();
      }
      this.chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: lastThreeMonths.map(item => item.month),
          datasets: [{
            label: 'Novos Usuários',
            data: lastThreeMonths.map(item => item.count),
            borderColor: '#4CAF50',
            backgroundColor: 'rgba(76, 175, 80, 0.1)',
            tension: 0.1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });
    }
  },
};
</script>

<style scoped>
.dashboard-container {
  background-color: #f5f5f5;
  min-height: 100vh;
  padding-top: 2rem;
}
</style>