<template>
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>EMAIL</th>
              <th>REGISTRO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody class="table-group-divider" id="contenido">
            <tr v-if="this.cargando">
              <td colspan="6">
                <h3>Cargando...</h3>
              </td>
            </tr>
            <tr v-else v-for="usu, i in this.usuarios" :key="usu.id">
              <td v-text="(i + 1)"></td>
              <td v-text="usu.id"></td>
              <td v-text="usu.first_name"></td>
              <td v-text="usu.last_name"></td>
              <td v-text="usu.email"></td>
              <td v-text="new Date(usu.created_at).toLocaleDateString('en-US')"></td>
              <td>
                <router-link :to="{ path: 'view/' + usu.id }" class="btn btn-info">
                  <i class="fa-solid fa-eye"></i>
                </router-link>
                &nbsp;
                <router-link :to="{ path: 'edit/' + usu.id }" class="btn btn-warning">
                  <i class="fa-solid fa-edit"></i>
                </router-link>
                &nbsp;
                <button class="btn btn-danger" v-on:click="eliminar(usu.id,usu.first_name)">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      usuarios: null,
      cargando: false
    }
  },
  mounted() {
    this.getUsuarios();
  },
  methods: {
    getUsuarios() {
      this.cargando = true;
      axios.get('http://prueba-backend.test/api/v1/usuarios').then(
        res => {
          this.usuarios = res.data;
          this.cargando = false;
        }
      );
    },
  }
}
</script>
