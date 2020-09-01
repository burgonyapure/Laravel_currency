<template>
    <div class="container">
        <div class="row justify-content-center">
            <line-chart :data="test1"></line-chart>
            
        </div>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                tomb:{},
                test1:[],
                test2: [
                    {
                        name: 'GBP', 
                        data: {
                            '2020-08-10': 383.64, 
                            '2020-08-07': 383.43,
                            '2020-08-06': 383.00,
                            '2020-08-05': 383.20,
                            '2020-08-04': 383.50,
                        }
                    },
                    {
                        name:'AUD',
                        data: {
                            '2020-08-10': 210.07,
                            '2020-08-07': 211.07,
                            '2020-08-06': 212.13,
                            '2020-08-05': 212.04,
                            '2020-08-04': 211.31
                        }
                    }
                ],
                result:[],
                loaded:false
            }
            
        },
        methods: {
            loadKozep(){
                this.$Progress.start();
                axios.get("api/kozep").then(({ data }) => (
                    this.tomb = data.data,
                    this.test(),
                    this.loaded=true
                ));
                this.$Progress.finish();
            },
           test(){
               var asd;
               for (let index = 0; index < this.tomb.length; index++) {
                  asd = {name:this.tomb[index].valuta,data:{[this.tomb[index].ervenyes]:this.tomb[index].ar}};
                  this.test1.push(asd);
               }
               console.log(this.test1);
               
            }
        },
        created() {
            this.loadKozep();      
        },
    }
</script>