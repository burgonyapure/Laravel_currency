<template>
    <div class="container">  
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" v-for="valto in valtok" :key="valto.name">
                    <a class="nav-link" @click="loadValto(valto)" :id="valto.name +'-tab'" data-toggle="tab" :href="'#'+valto.name.split(' ')[0]" role="tab" :aria-controls="valto.name" aria-selected="true">{{valto.name}}</a>
                </li>
            </ul>

            <form @submit.prevent="send">
                <div class="tab-content" id="myTabContent">
                    <div v-for="valto in valtok" :key="valto.name" class="tab-pane fade show" :id="valto.name.split(' ')[0]" role="tabpanel" :aria-labelledby="valto.name+'-tab'">
                        <div class="card card-primary">
                            <div class="card-header">
                                {{valto.name}}<button type="submit" class="btn btn-success float-right">Küldés <i class="fas fa-share"></i></button>
                            </div>
                            <!-- IF nem empty a result -->
                            <div v-if="Valto_val !== 'empty'" class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 10px">Valuta</th>
                                            <th>Vétel</th>
                                            <th>Eladás</th>
                                        </tr>
                                        <tr v-for="(valuta,i) in Valto_val" :key="i">
                                            <td class="align-middle" style="text-align:center;">{{valuta.valutanev}}</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="number" step=".01" class="form-control" v-model="valuta.vetel" placeholder="Vétel"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="number" step=".01" class="form-control" v-model="valuta.eladas" placeholder="Eladás">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- ELSE amúgymeg (nem igazán fordulhatna elő, csak ha üres a db) -->
                            <div v-else class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 10px">Valuta</th>
                                            <th>Vétel</th>
                                            <th>Eladás</th>
                                        </tr>
                                        <tr v-for="valuta in valutak" :key="valuta">
                                            <td class="align-middle" style="text-align:center;">{{valuta}}</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="number" step=".01" class="form-control"  placeholder="Vétel"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="number" step=".01" class="form-control"  placeholder="Eladás">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
</template>

<script>
    export default {
        data(){
            return {
                valtok: [
                    {name:"Pesti út",sqlname:"Pesti utca", varos:"Debrecen"},
                    {name:"Unió", sqlname:"Uni", varos:"Debrecen"},
                    {name:"Berettyóújfalu", sqlname:"Berettyóújfalu", varos:"Berettyóújfalu"},
                    {name:"Szoboszló", sqlname:"Szoboszló", varos:"Hajdúszoboszló"},
                    {name:"Tisza Lajos", sqlname:"Tisza", varos:"Szeged"},
                    {name:"Kárász 5/1", sqlname:"Kar", varos:"Szeged"},
                    {name:"Dunakeszi", sqlname:"Dunakeszi", varos:"Dunakeszi"},
                    {name:"Budapest", sqlname:"Budapest",varos:"Budapest"}
                ],

                Valto_val: {},

                valutak: ['USD','EUR','GBP','AUD','CZK','DKK','HRK','CAD','CHF','SEK','PLN','RON','RSD'],

                arf: {},

                form: new Form({
                    datum: [],
                    valuta: [],
                    eladas: [],
                    vetel: [],
                    valto: []
                }),
            }
        },
        methods: {
            acitvatePageOnLoad(){
                var element = document.getElementById("Pesti út-tab");
                var el2 = document.getElementById("Pesti");
                element.classList.add("active");
                el2.classList.add("show");
                el2.classList.add("active");
            },
            loadAll(){
                axios.get("api/kuldottek").then(({ data }) => (this.arf = data));
            },
            loadValto(valto){
                axios.get("api/kuldottek/"+valto.sqlname).then(({data}) => (this.Valto_val = {} ,this.Valto_val = data));
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
                }).then((result) => {
                    if (result.value) {
                        axios.post("api/kuldottek",this.Valto_val);
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
                }).catch(() => {
                    Swal.fire({
                      icon: 'error',
                      title: 'Hopika...',
                      text: 'Valami elromlott!',
                    })
                });
            }
        },
        mounted() {
            //this.loadAll();
            this.loadValto(this.valtok[0]);
            this.acitvatePageOnLoad();
        }
    }
</script>