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
                            <th>DESCRIPCION</th>
                            <th>PRECIO</th>
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
                        <tr v-else v-for="arti, i in this.articulos" :key="arti.id">
                            <td v-text="(i + 1)"></td>
                            <td v-text="arti.id"></td>
                            <td v-text="arti.name"></td>
                            <td v-text="arti.description"></td>
                            <td v-text="arti.price"></td>
                            <td v-text="new Date(arti.created_at).toLocaleDateString('en-US')"></td>
                            <td>
                                <router-link :to="{ path: 'view/' + arti.id }" class="btn btn-info">
                                    <i class="fa-solid fa-eye"></i>
                                </router-link>
                                &nbsp;
                                <router-link :to="{ path: 'edit/' + arti.id }" class="btn btn-warning">
                                    <i class="fa-solid fa-edit"></i>
                                </router-link>
                                &nbsp;
                                <button class="btn btn-danger" v-on:click="eliminar(arti.id, arti.name)">
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
            articulos: null,
            cargando: false
        }
    },
    mounted() {
        this.getArticulos();
    },
    methods: {
        getArticulos() {
            this.cargando = true;
            axios.get('http://prueba-backend.test/api/v1/articulos').then(
                res => {
                    this.articulos = res.data;
                    this.cargando = false;
                }
            );
        },
    }
}
</script>
