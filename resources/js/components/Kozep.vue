<template>
    <div class="container-fluid">
        <div class="card-deck">
            <div class="card card-primary">
                <div class="card-header text-center">
                    <h3>Legutóbbi Középárfolyamok</h3>
                </div>
                <div class="card-body">
                    <!--Table-->
                    <table id="tablePreview" class="table table-striped table-hover dataTable">
                        <!--Table head-->
                        <thead>
                            <tr>
                                <th class="sorting">Dátum</th>
                                <th>Valuta</th>
                                <th>Érték</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                            <tr v-for="(kozep,index) in karf.data" :key="index">
                                <td>{{kozep.ervenyes | myDate}}</td>
                                <td>{{kozep.valuta}}</td>
                                <td>{{kozep.ar}}</td>
                            </tr>
                        </tbody>
                        <!--Table body-->
                    </table>        
                    <!--Table-->
                </div>
                <div class="card-footer">
                    <pagination :data="karf" @pagination-change-page="getResultsKozep">
                        <span slot="prev-nav">&lt; Előző</span>
                        <span slot="next-nav">Következő &gt;</span>
                    </pagination>
                </div>     
            </div>

            <div class="card card-primary">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-sm-2 p-0"></div>
                        <div class="col-sm-8 p-0"><h3>Jelenlegi Középárfolyamok</h3></div>
                        <div class="col-sm-2 pt-0 pb-0 pr-4"><button class="float-right btn btn-success" @click="update" >Frissít <i class="fas fa-sync"></i></button></div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tablePreview" class="table table-striped table-hover dataTable" v-if="new Date(karf.data[0].ervenyes).toLocaleDateString() === new Date().toLocaleDateString()">
                        <!--Table head-->
                        <thead>
                            <tr>
                                <th class="sorting">Dátum</th>
                                <th>Valuta</th>
                                <th>Érték</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                            <tr v-for="(kozep,index) in karf.data" :key="index">
                                <td>{{kozep.ervenyes | myDate}}</td>
                                <td>{{kozep.valuta}}</td>
                                <td>{{kozep.ar}}</td>
                            </tr>
                        </tbody>
                        <!--Table body-->
                    </table>
                    <h3 v-else class="text-center">  
                        Nincs árfolyam a mai napra 😢
                    </h3>
                </div>
                <div class="card-footer text-center">
                    <button @click="send" v-if="new Date(karf.data[0].ervenyes).toLocaleDateString() === new Date().toLocaleDateString()" class="btn btn-success">Küldés <i class="fas fa-share"></i></button>
                </div>     
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                karf:{
                    ervenyes: '',
                    valuta: '',
                    ar: ''
                },
                jelenleg: new Form({
                    ervenyes: '',
                    valuta: '',
                    ar: ''
                })
            }
        },
        methods: {
            getResultsKozep(page = 1){
                axios.get('api/kozep?page=' + page)
				.then(response => {
                    this.karf = response.data;
                });
            },    
            update(){
                this.$Progress.start();
                this.jelenleg.post('api/kozep')
                .then(() => {
                Fire.$emit('Update');
                this.$Progress.finish();
                })
            },
            loadKozep(){
                axios.get("api/kozep").then(({ data }) => (this.karf = data));
            },
            send(){
                 swalWithBootstrapButtons.fire({
                    title: 'Biztosan Elküldöd?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Igen, elküldöm!',
                    cancelButtonText: 'Nem!',
                    reverseButtons: true
                })
                .then((result) => {
                    this.$Progress.start();
                    if (result.value) {
                        axios.get('api/mnbMail')
                        .then(response => {
                            console.log(response.data);
                        });
                        swalWithBootstrapButtons.fire(
                        'Elküldve!',
                        'A kért árfolyamot elküldtük!',
                        'success'
                        )
                    }
                    else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                        'Mégsem',
                        'Nem küldtem semmit 😊',
                        'error'
                        )
                    }
                    this.$Progress.finish();
                })      
            }
        },
        created() {
            this.loadKozep();
            Fire.$on('Update',() => {
                this.loadKozep();
            });
        }
    }
</script>