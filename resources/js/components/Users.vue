<template>
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Felhasználók</h3>

              <div class="card-tools">
                  <button class="btn btn-success" @click="newModal" >Új <i class="fas fa-user-plus fa-fw"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tbody>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Registered At</th>
                      <th>Modify</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.type | upText}}</td>
                    <td>{{user.created_at | myDate}}</td>
                    <td>
                      <a href="#" @click="editModal(user)">
                        <i class="fa fa-edit"></i>
                      </a>
                      /
                      <a v-if="user.name !='sysadmin'" href="#" @click="deleteUser(user.id)">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
               </tbody>
             </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="addNew" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 v-show="!editmode" class="modal-title" id="staticBackdropLabel">Új Felhasználó</h5>
              <h5 v-show="editmode" class="modal-title" id="staticBackdropLabel">Módosítás</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form @submit.prevent="editmode ? updateUser() : createUser()">
              <div class="modal-body">
                <!-- Felhasználónév -->
                <div class="form-group">
                  <label>Felhasználónév</label>
                  <input v-model="form.name" type="text" name="name"
                    placeholder="Név"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                  <has-error :form="form" field="name"></has-error>
                </div>
                <!-- Email -->
                <div class="form-group">
                  <label>E-mail</label>
                  <input v-model="form.email" type="email" name="email"
                    placeholder="E-mail"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                  <has-error :form="form" field="email"></has-error>
                </div>

                <!-- Leírás -->
                <div class="form-group">
                  <label>Rövid leírás</label>
                  <textarea v-model="form.bio" name="bio" id="bio"
                    placeholder="Rövid leírás (Opcionális)"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                  <has-error :form="form" field="bio"></has-error>
                </div>

                <!-- User tipus -->
                <div class="form-group">
                    <label>Felhasználó típusa</label>
                    <select name="type" v-model="form.type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                        <option value="">Válassz!</option>
                        <option value="user">Felhasználó</option>
                        <option value="admin">Admin</option>
                        <option value="author">Valami más</option>
                    </select>
                    <has-error :form="form" field="type"></has-error>
                </div>

                <!-- Pass -->
                <div class="form-group">
                  <label>Jelszó</label>
                  <input v-model="form.password" type="password" name="password" id="password"
                    placeholder="Jelszó"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                  <has-error :form="form" field="password"></has-error>
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Mégse</button>
                <button v-show="editmode" type="submit" class="btn btn-success">Frissít</button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">Hozzád</button>
              </div>
          </form>

          </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        data() {
          return{
              editmode: true,
              users: {},
              form: new Form({
                id: '',
                name: '',
                email: '',
                password: '',
                type: '',
                bio: '',
                photo: ''
              })
          }
        },
        methods: {
          updateUser(id){
            this.$Progress.start();
            this.form.put('api/user/' + this.form.id)
            .then(() => {
              //success
              swalWithBootstrapButtons.fire(
                'Frissítve!',
                'A frissítés sikeres.',
                'success'
              )
              Fire.$emit('Update');
              $('#addNew').modal('hide')
              this.$Progress.finish();
            })
            .catch(() => {
              this.$Progress.fail();
            });
          },
          editModal(user){
            this.editmode = true;
            this.form.reset();
            $('#addNew').modal('show');
            this.form.fill(user);
          },

          newModal(){
            this.editmode = false;
            this.form.reset();
            $('#addNew').modal('show');
          },

          deleteUser(id){
            swalWithBootstrapButtons.fire({
                title: 'Biztosan törlöd?',
                text: "A művelet nem vonható vissza!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Igen, törlöm!',
                cancelButtonText: 'Nem!',
                reverseButtons: true
              }).then((result) => {
              //Küldjük az ajax requestet törlésre ha azt választjuk
                if (result.value) {
                    swalWithBootstrapButtons.fire(
                      'Törölve!',
                      'A kért dolgot eltávolítottam.',
                      'success'
                    ),
                    this.form.delete('api/user/'+id).then(() => {
                    Fire.$emit('Update');
                    }).catch(() => {
                    Swal.fire({
                      icon: 'error',
                      title: 'Hopika...',
                      text: 'Valami elromlott!',
                      footer: '<a href="https://lmgtfy.com/?q=Laravel+could+not+delete+user">Mi lehet ez a hiba?</a>'
                    })
                  });
                }
                else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                      'Mégsem',
                      'Minden maradt ahogy volt :)',
                      'error'
                    )
              }

              })
          },

          loadUsers(){
            axios.get("api/user").then(({ data }) => (this.users = data.data));
          },

          createUser(){
            this.$Progress.start();

            this.form.post('api/user')
            .then(() => {
              Fire.$emit('Update');
              $('#addNew').modal('hide')
              Toast.fire({
                icon: 'success',
                title: 'Felhasználó hozzáadva!'
              })
              this.$Progress.finish();
            })

            .catch(() => {

            })
          }
        },
        created() {
          this.loadUsers();
          Fire.$on('Update',() => {
            this.loadUsers();
          });
          // setInterval(() => this.loadUsers(), 4000);
          }
        }
</script>
