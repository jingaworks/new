<template>
    <div class="col-lg-7 col-md-12 col-sm-12 mb-5">

        <div class="row" v-if="form.errors">
            <div class="col-lg-12">
                <form @submit.prevent="formSubmit" @keydown="form.errors.clear($event.target.name)">

                    <div class="form-group row">
                        <label for="name" class="col-lg-4 form-label">Nume Societate</label>

                        <div class="col-lg-8">
                            <input id="name" type="text" class="form-control" name="name" v-model="form.name" :disabled="form.verified == 1">
                            <span class="text-danger" v-if="form.errors && form.errors.has('name')" v-text="form.errors.get('name')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cui" class="col-lg-4 form-label">CUI/CIF</label>

                        <div class="col-lg-8">
                            <input id="cui" type="text" class="form-control" name="cui" v-model="form.cui" :disabled="form.verified == 1">
                            <span class="text-danger" v-if="form.errors && form.errors.has('cui')" v-text="form.errors.get('cui')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-lg-4 form-label">Telefon</label>

                        <div class="col-lg-8">
                            <input id="phone" type="text" class="form-control" name="phone" v-model="form.phone">
                            <span class="text-danger" v-if="form.errors && form.errors.has('phone')" v-text="form.errors.get('phone')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="region" class="col-lg-4 form-label">Judet</label>

                        <div class="col-lg-8">
                            <input id="region" type="text" class="form-control" name="region" v-model="form.region">
                            <span class="text-danger" v-if="form.errors && form.errors.has('region')" v-text="form.errors.get('region')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="place" class="col-lg-4 form-label">Emitent</label>

                        <div class="col-lg-8">
                            <input id="place" type="text" class="form-control" name="place" v-model="form.place">
                            <span class="text-danger" v-if="form.errors && form.errors.has('place')" v-text="form.errors.get('place')"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="viza" class="col-lg-4 form-label">Adresa</label>

                        <div class="col-lg-8">
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control" v-model="form.address"></textarea>
                            <span class="text-danger" v-if="form.errors && form.errors.has('address')" v-text="form.errors.get('address')"></span>

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block" :disabled="form.errors && form.errors.any()">
                                Editeaza Datele
                            </button>
                        </div>
                    </div>
                </form>
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
                    name: '',
                    cui: '',
                    phone: '',
                    region: '',
                    place: '',
                    address: '',
                    verified: '',
                }
            }
        },

        methods: {
            formSubmit() {
                this.form.submit('post', '/cont/editeaza-companie','/cont/date-companie')
                    .then((data) => {
                        console.log(data)
                    })
                    .catch(errors => console.log(errors));
            },
            
            getDataForm() {
                axios.get('/cont/json-companie')
                    .then(response => {
                        this.form = new Form(
                            response.data.companie
                        )
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },

        mounted() {
            this.getDataForm()
            console.log('Component mounted.')
        }
    }
</script>
