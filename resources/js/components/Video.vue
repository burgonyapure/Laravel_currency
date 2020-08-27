<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Videjók</div>

                    <div class="card-body">
                        <!-- <video controls preload="auto" src="rtsp://172.31.1.33:554/user=admin&password=&channel=1&stream=0.sdp?Real_stream" width="100%"></video> -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
