<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" md="8">
        <v-card>
          <v-card-title class="headline">Cadastro de Usuário</v-card-title>
          <v-card-text>
            <v-form ref="form" v-model="valid" @submit.prevent="submitForm">
              <v-text-field
                v-model="nome"
                :rules="[rules.required]"
                label="Nome"
                prepend-icon="mdi-account"
                required
              ></v-text-field>
              <v-text-field
                v-model="email"
                :rules="[rules.required, rules.email]"
                label="E-mail"
                prepend-icon="mdi-email"
                required
              ></v-text-field>
              <v-text-field
                v-model="senha"
                :rules="[rules.required, rules.min(8)]"
                label="Senha"
                type="password"
                prepend-icon="mdi-lock"
                required
              ></v-text-field>
              <v-text-field
                v-model="confirmarSenha"
                :rules="[rules.required, rules.match(senha)]"
                label="Confirme a Senha"
                type="password"
                prepend-icon="mdi-lock-check"
                required
              ></v-text-field>
              <v-btn :disabled="!valid" color="primary" type="submit" class="mt-4">Cadastrar</v-btn>
            </v-form>
          </v-card-text>
        </v-card>
        
        <v-alert v-if="errorMessage" type="error" class="mt-4">
          {{ errorMessage }}
        </v-alert>
      </v-col>
    </v-row>

    <v-dialog v-model="mostrarModal" max-width="500">
      <v-card>
        <v-card-title class="headline">Sucesso!</v-card-title>
        <v-card-text>
          <p>Nome: {{ nome }}</p>
          <p>Email: {{ email }}</p>
        </v-card-text>
        <v-card-actions>
          <v-btn color="primary" @click="fecharModal">Fechar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
import api from '@/services/api';

export default {
  data() {
    return {
      nome: "",
      email: "",
      senha: "",
      confirmarSenha: "",
      mostrarModal: false,
      valid: false,
      
      rules: {
        required: (value) => !!value || "Campo obrigatório.",
        email: (value) => /.+@.+\..+/.test(value) || "E-mail inválido.",
        min: (min) => (value) => value.length >= min || `Mínimo de ${min} caracteres.`,
        match: (other) => (value) => value === other || "As senhas não coincidem.",
      },
    };
  },
  methods: {
    async submitForm() {
      if (this.$refs.form.validate()) {
        try {
          const response = await api.post('/register', {
            name: this.nome,
            email: this.email,
            password: this.senha
          });
          console.log(response.data);
          this.mostrarModal = true;
          this.errorMessage = "";
        } catch (error) {
          console.error('Erro ao cadastrar:', error);
          if (error.response) {
            
            this.errorMessage = error.response.data.message || "Erro ao cadastrar usuário.";
          } else if (error.request) {
            
            this.errorMessage = "Não foi possível conectar ao servidor.";
          } else {
            
            this.errorMessage = "Erro ao processar a requisição.";
          }
        }
      }
    },
    fecharModal() {
      this.mostrarModal = false;
      this.nome = "";
      this.email = "";
      this.senha = "";
      this.confirmarSenha = "";
      this.$refs.form.reset();
    },
  },
};
</script>