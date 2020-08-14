<template>

  <div class="container-fluid">
      <v-app style=" background: none;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="eladas-tab" data-toggle="tab" href="#eladas" role="tab" aria-controls="eladas" aria-selected="true">Eladások</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="vetel-tab" data-toggle="tab" href="#vetel" role="tab" aria-controls="vetel" aria-selected="false">Vételek</a>
            </li>
        </ul>
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="eladas" role="tabpanel" aria-labelledby="eladas-tab">
                <div class="card card-primary">
                    <div class="card-body">
                    
                        <v-card v-if="this.b_loaded">
                            <v-card-title>
                            <v-text-field
                                v-model="search"
                                append-icon=""
                                label="Keresés"
                                single-line
                                hide-details
                            ></v-text-field>
                            </v-card-title>
                            <v-data-table
                            :headers="headers"
                            :items="bizonylatok"
                            :search="search"
                            ></v-data-table>
                        </v-card>
                        <v-card v-else>
                            <v-data-table item-key="name" class="elevation-1" loading loading-text="Töltök... Várj egy picit"></v-data-table>
                        </v-card>
                        
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="vetel" role="tabpanel" aria-labelledby="vetel-tab">
                <div class="card card-primary">
                    <div class="card-body">
                        <v-card v-if="this.v_loaded">
                            <v-card-title>
                            <v-text-field
                                v-model="search"
                                append-icon=""
                                label="Keresés"
                                single-line
                                hide-details
                            ></v-text-field>
                            </v-card-title>
                            <v-data-table
                            :headers="headers"
                            :items="vetelek"
                            :search="search"
                            ></v-data-table>
                        </v-card>
                         <v-card v-else>
                            <v-data-table item-key="name" class="elevation-1" loading loading-text="Töltök... Várj egy picit"></v-data-table>
                        </v-card>
                    </div>
                </div>
            </div>   
        </div>
       </v-app>
    </div>
     
</template>

<script>
    export default {
        data() {
          return{
              search: '',
                headers: [
                    {
                        text: 'Dátum',
                        align: 'start',
                        filterable: false,
                        value: 'Ido',
                    },
                    { text: 'Összeg', value: 'Osszeg' },
                    { text: 'Valuta', value: 'Valuta' },
                    { text: 'Árfolyam', value: 'Arfolyam' },
                    { text: 'HUF', value: 'HUF_ertek' },
                    { text: 'Váltó', value: 'Valto' },
                    { text: 'Banki Árf.', value: '' },
                    { text: 'Árrés', value: '' },
                    { text: 'Nyereség', value: '' },
                    { text: 'Pénztáros', value: 'Penztaros' },
                    { text: 'Bizonylat', value: 'Bizonylat' },
                    { text: 'Ügyfél', value: 'Ugyfel' },
                ],
              bizonylatok: {
                id: '',
                Valto: '',
                Bizonylat: '',
                Ido: '',
                Osszeg: '',
                Valuta: '',
                Arfolyam: '',
                HUF_ertek: '',
                Ugyfel: '',
                Penztaros: '',
                ceg: '',
                storno: '',
                storno_ido: '',
                storno_penztaros: '',
                storno2: '',
                storno2_ido: '',
                storno2_penztaros: '',
                Tranz_dij: '',
                Okmany: '',
                Azonosító: ''
              },
              vetelek: {
                Valto: '',
                Bizonylat: '',
                Ido: '',
                Osszeg: '',
                Valuta: '',
                Arfolyam: '',
                HUF_ertek: '',
                Osszeg2: '',
                Valuta2: '',
                Arfolyam2: '',
                HUF_ertek2: '',
                Jutalek: '',
                Ugyfel: '',
                Penztaros: '',
                Ceg: '',
                storno: '',
                storno_ido : '',
                storno_penztaros: '',
                storno2: '',
                storno2_ido: '',
                storno2_penztaros: '',
                Tranz_dij: '',
                Tranz_dij2: '',
                Okmany: '',
                Azonosító: ''
              },
              b_loaded:false,
              v_loaded:false,
          }
        },
        methods:{
            getResults(page = 1){
                axios.get('api/eladas?page=' + page)
				.then(response => {
                    this.bizonylatok = response.data;
				});
            },
            getResultsVetelek(page = 1){
                axios.get('api/vetel?page=' + page)
				.then(response => {
                    this.vetelek = response.data;
				});
            },
            loadEladas(){
                axios.get("api/eladas").then(({ data }) => (this.bizonylatok = data,this.b_loaded=true));
            },
            loadVetelek(){
                axios.get("api/vetel").then(({ data }) => (this.vetelek = data,this.v_loaded=true));
            },
            
        },
        created() {
            this.loadEladas();
            this.loadVetelek();
        }
        

    }
</script>