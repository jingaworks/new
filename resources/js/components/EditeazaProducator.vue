<template>
    <div class="col-lg-12 col-md-12 col-sm-12 mb-5">

        <div class="row" v-if="form.errors">
            <div class="col-lg-7">
                <form @submit.prevent="formSubmit" @keydown="form.errors.clear($event.target.name)">

                    <div class="form-group row">
                        <label for="titular" class="col-lg-4 form-label">Titular</label>

                        <div class="col-lg-8">
                            <input id="titular" type="text" class="form-control" name="titular" v-model="form.titular" :disabled="form.verified == 1">
                            <span class="text-danger" v-if="form.errors && form.errors.has('titular')" v-text="form.errors.get('titular')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="serie" class="col-lg-4 form-label">Serie</label>

                        <div class="col-lg-8">
                            <input id="serie" type="text" class="form-control" name="serie" v-model="form.serie" :disabled="form.verified == 1">
                            <span class="text-danger" v-if="form.errors && form.errors.has('serie')" v-text="form.errors.get('serie')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="numar" class="col-lg-4 form-label">Numar</label>

                        <div class="col-lg-8">
                            <input id="numar" type="text" class="form-control" name="numar" v-model="form.numar" :disabled="form.verified == 1">
                            <span class="text-danger" v-if="form.errors && form.errors.has('numar')" v-text="form.errors.get('numar')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="region" class="col-lg-4 form-label">Judet</label>

                        <div class="col-lg-8">
                            <input id="region" type="text" class="form-control" name="region" v-model="form.region" :disabled="form.verified == 1">
                            <span class="text-danger" v-if="form.errors && form.errors.has('region')" v-text="form.errors.get('region')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="place" class="col-lg-4 form-label">Emitent</label>

                        <div class="col-lg-8">
                            <input id="place" type="text" class="form-control" name="place" v-model="form.place" :disabled="form.verified == 1">
                            <span class="text-danger" v-if="form.errors && form.errors.has('place')" v-text="form.errors.get('place')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="viza" class="col-lg-4 form-label">Anul vizat</label>

                        <div class="col-lg-8">
                            <select id="viza" class="form-control" name="viza" v-model="form.viza">
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                            <span class="text-danger" v-if="form.errors && form.errors.has('viza')" v-text="form.errors.get('viza')"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block" :disabled="form.errors && form.errors.any()">
                                Editeaza Datele
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <a href="/cont/date-producator" class="btn btn-danger btn-block">
                                Anuleaza
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5">
                <img id="show-modal" :src="imageLink" class="img-thumbnail" @click="showModal = true">
                <!-- use the modal component, pass in the prop -->
                <modal v-if="showModal" @close="showModal = false">
                    <img slot="body" :src="imageLink" class="rounded mx-auto d-block" @click="showModal = false">
                </modal>
            </div>
        </div>
        <div class="row" v-else>
            <div class="col-lg-12">
                Loading...
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            
        data() {

            return {
                form: {
                    titular: '',
                    serie: '',
                    numar: '',
                    region: '',
                    place: '',
                    viza: '',
                    verified: '',
                },
                imageLink: '',
                showModal: false,
            }
        },

        methods: {
            formSubmit() {
                this.form.submit('post', '/cont/editeaza-producator','/cont/date-producator')
                    .then((data) => {
                        console.log(data)
                    })
                    .catch(errors => console.log(errors));
            },
            
            getDataForm() {
                axios.get('/cont/json-producator')
                    .then(response => {
                        this.form = new Form(
                            response.data.producator
                        )
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            setImage() {
                axios.post('/cont/producator/atestat', this.form)
                    .then(response => {
                        this.imageLink = '/storage/atestate/' + response.data.link  + '?time=' + new Date().getTime()
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },

        mounted() {
            this.getDataForm()
        },

        watch: {
            form: {
                handler(val){
                    this.setImage()
                },
                deep: true
            }
        }
    }
</script>

<style scoped>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: flex;
}

.modal-container {
  width: 100%;
  padding: 20px 30px;
  transition: all .3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body img {  
    height: 85vh;
}
.modal-footer {
    margin: 0 auto;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>

