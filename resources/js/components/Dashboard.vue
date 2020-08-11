<template>
    <div class="container">
        <div class="row justify-content-center">
            <line-chart :data="test2"></line-chart>
            
            
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tomb:{},
                test2: [
                    {
                        name: 'GBP', 
                        data: {
                            '2020-08-10': 383.64, 
                            '2020-08-07': 383.43
                        }
                    },
                    {
                        name:'AUD',
                        data: {
                            '2020-08-10': 210.07,
                            '2020-08-07': 211.07
                        }
                    }
                ],
                result:[]
            }
        },
        methods: {
            loadKozep(){
                axios.get("api/kozep").then(({ data }) => (
                    this.tomb = data.data
                ));
                
            },
            test(){
               this.test2[0].data.ervenyes = this.tomb[0].ervenyes;
            }
        },
        created() {
            this.loadKozep();
            //this.test();
        }
    }
</script>