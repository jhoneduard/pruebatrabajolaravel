<template>
    <div class="container">
        <h1 class="text-center">Gestionar Pedidos</h1>
        <hr>

<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" @click="AbrirModal();">
  Registrar Pedido
</button>

<!-- The Modal -->
<div class="modal" :class="{mostrar:modal}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Registro de Pedidos</h4>
        <button type="button" @click="CerrarModal();">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <label for="Descripcion">Descripcion</label>
        <textarea id="nombre" class="form-control" v-model="pedido.nombre"></textarea>
<br>

         <label for="Fecha">Fecha</label>
     <input type="text" id="fecha_transaccion" class="form-control" v-model="pedido.fecha_transaccion"/>

<br>
<label for="Hora">Hora</label>
<input type="text" class="form-control"  id="hora_transaccion" v-model="pedido.hora_transaccion">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
                  <button type="button" class="btn btn-success" @click="guardar()">Guardar</button>
        <button type="button" class="btn btn-secondary" @click="CerrarModal();">Cancelar</button>
      </div>

    </div>
  </div>
</div>

        <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col" class="text-center">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <tr  v-for="ped in pedidos" :key="ped.id">
      <td>{{ped.id}}</td>
     <td>{{ped.nombre}}</td>
     <td>{{ped.fecha_transaccion}}</td>
       <td>{{ped.hora_transaccion}}</td>
                 <td>
            <button class="btn btn-danger">
              <i class="far fa-eye"></i>
            </button>
          </td>

    </tr>

  </tbody>
</table>




    </div>
</template>

<script>
    export default {

        data(){
            return{
            pedido:{
                nombre: 'y',
                fecha_transaccion:'',
                hora_transaccion : '',
            },
            pedidos:[],
            modal:0,
            }
        },

        methods:{
           async listar(){
              const res = await axios.get('/pedidos');
               this.pedidos= res.data;
            },

            AbrirModal(data={}){
                this.modal=1;
            },

            CerrarModal(){
                this.modal=0;
            },
             async guardar() {
   const res = await axios.post('/pedidos/',this.pedido);
           this.CerrarModal();
        this.listar();
             }

        },

        created(){
            this.listar();
        },
     

    }
</script>


<style>
.mostrar{
    display: list-item;
    opacity: 100%;
    background: black;
}

</style>