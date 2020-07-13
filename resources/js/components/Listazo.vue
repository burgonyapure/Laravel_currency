<template>
    <div class="container-fluid">
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
                            <!--Table-->
                            <table id="tablePreview" class="table table-striped table-hover dataTable">
                                <!--Table head-->
                                <thead>
                                    <tr>
                                        <th class="sorting">Dátum</th>
                                        <th>Összeg</th>
                                        <th>Valuta</th>
                                        <th>Árfolyam</th>
                                        <th>HUF</th>
                                        <th>Váltó</th>
                                        <th>Banki Árfolyam</th>
                                        <th>Árrés</th>
                                        <th>Nyereség</th>
                                        <th>Pénztáros</th>
                                        <th>Bizonylat</th>
                                        <th>Ügyfél</th>
                                    </tr>
                                </thead>
                                <!--Table head-->
                                <!--Table body-->
                                <tbody>
                                    <tr v-for="bizonylat in bizonylatok.data" :key="bizonylat.Bizonylat">
                                        <td>{{bizonylat.Ido}}</td>
                                        <td>{{bizonylat.Osszeg}}</td>
                                        <td>{{bizonylat.Valuta}}</td>
                                        <td>{{bizonylat.Arfolyam}}</td>
                                        <td>{{bizonylat.HUF_ertek | formatHUF}}.-</td>
                                        <td>{{bizonylat.Valto}}</td>
                                        <td>Banki arf</td>
                                        <td>árrés</td>
                                        <td>nyereség</td>
                                        <td>{{bizonylat.Penztaros}}</td>
                                        <td>{{bizonylat.Bizonylat}}</td>
                                        <td>{{bizonylat.Ugyfel}}</td>
                                    </tr>
                                </tbody>
                                <!--Table body-->
                            </table>        
                            <!--Table-->
                        </div>
                    </div>
                    <pagination :data="bizonylatok" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Előző</span>
                        <span slot="next-nav">Következő &gt;</span>
                    </pagination>
                </div>
                
            <div class="tab-pane fade show" id="vetel" role="tabpanel" aria-labelledby="vetel-tab">
                    <div class="card card-primary">
                        <div class="card-body">
                            <!--Table-->
                            <table id="tablePreview" class="table table-striped table-hover dataTable">
                                <!--Table head-->
                                <thead>
                                    <tr>
                                        <th class="sorting">Dátum</th>
                                        <th>Összeg</th>
                                        <th>Valuta</th>
                                        <th>Árfolyam</th>
                                        <th>HUF</th>
                                        <th>Váltó</th>
                                        <th>Banki Árfolyam</th>
                                        <th>Árrés</th>
                                        <th>Nyereség</th>
                                        <th>Pénztáros</th>
                                        <th>Bizonylat</th>
                                        <th>Ügyfél</th>
                                    </tr>
                                </thead>
                                <!--Table head-->
                                <!--Table body-->
                                <tbody>
                                    <tr v-for="vetel in vetelek.data" :key="vetel.Bizonylat">
                                        <td>{{vetel.Ido}}</td>
                                        <td>{{vetel.Osszeg}}</td>
                                        <td>{{vetel.Valuta}}</td>
                                        <td>{{vetel.Arfolyam}}</td>
                                        <td>{{vetel.HUF_ertek | formatHUF}}.-</td>
                                        <td>{{vetel.Valto}}</td>
                                        <td>Banki arf</td>
                                        <td>árrés</td>
                                        <td>nyereség</td>
                                        <td>{{vetel.Penztaros}}</td>
                                        <td>{{vetel.Bizonylat}}</td>
                                        <td>{{vetel.Ugyfel}}</td>
                                    </tr>
                                </tbody>
                                <!--Table body-->
                            </table>        
                            <!--Table-->
                        </div>
                    </div>
                <pagination :data="vetelek" @pagination-change-page="getResultsVetelek">
                    <span slot="prev-nav">&lt; Előző</span>
                    <span slot="next-nav">Következő &gt;</span>
                </pagination>
            </div>   
        </div>
       
    </div>
</template>

<script>
    export default {
        data() {
          return{
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
              }
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
                axios.get("api/eladas").then(({ data }) => (this.bizonylatok = data));
            },
            loadVetelek(){
                axios.get("api/vetel").then(({ data }) => (this.vetelek = data));
            },
            
        },
        created() {
            this.loadEladas();
            this.loadVetelek();
        }
        

    }
</script>