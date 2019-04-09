<template>
    <div class="col-lg-7 col-md-12 col-sm-12">
                
        <form @submit.prevent="formSubmit" @keydown="form.errors.clear($event.target.name)">

            <div class="form-group row">
                <label for="titular" class="col-lg-4 form-label">Titular</label>

                <div class="col-lg-8">
                    <input id="titular" type="text" class="form-control" name="titular" v-model="form.titular">
                    <span class="text-danger" v-if="form.errors.has('titular')" v-text="form.errors.get('titular')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="serie" class="col-lg-4 form-label">Serie</label>

                <div class="col-lg-8">
                    <input id="serie" type="text" class="form-control" name="serie" v-model="form.serie">
                    <span class="text-danger" v-if="form.errors.has('serie')" v-text="form.errors.get('serie')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="numar" class="col-lg-4 form-label">Numar</label>

                <div class="col-lg-8">
                    <input id="numar" type="text" class="form-control" name="numar" v-model="form.numar">
                    <span class="text-danger" v-if="form.errors.has('numar')" v-text="form.errors.get('numar')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="region" class="col-lg-4 form-label">Judet</label>

                <div class="col-lg-8">
                    <input id="region" type="text" class="form-control" name="region" v-model="form.region">
                    <span class="text-danger" v-if="form.errors.has('region')" v-text="form.errors.get('region')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="place" class="col-lg-4 form-label">Emitent</label>

                <div class="col-lg-8">
                    <input id="place" type="text" class="form-control" name="place" v-model="form.place">
                    <span class="text-danger" v-if="form.errors.has('place')" v-text="form.errors.get('place')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="viza" class="col-lg-4 form-label">Anul vizat</label>

                <div class="col-lg-8">
                    <select id="viza" class="form-control" name="viza" v-model="form.viza">
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                    <span class="text-danger" v-if="form.errors.has('viza')" v-text="form.errors.get('viza')"></span>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-block" :disabled="form.errors.any()">
                        Adauga Datele
                    </button>
                </div>
            </div>
        </form>

    </div>
</template>

<script>
    export default {
            
        data() {

            return {
                form: new Form({
                    titular: '',
                    serie: '',
                    numar: '',
                    region: '',
                    place: '',
                    viza: '',
                })
            }
        },

        methods: {
            formSubmit() {
                this.form.submit('post', '/cont/producator/creaza','/cont/date-producator')
                    .then(data => console.log(data))
                    .catch(errors => console.log(errors));
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
