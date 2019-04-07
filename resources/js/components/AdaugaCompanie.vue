<template>
    <div class="col-lg-7 col-md-12 col-sm-12">
                
        <form @submit.prevent="formSubmit" @keydown="form.errors.clear($event.target.name)">

            <div class="form-group row">
                <label for="nume" class="col-lg-4 form-label">Nume Juridic</label>

                <div class="col-lg-8">
                    <input id="nume" type="text" class="form-control" name="nume" v-model="form.nume">
                    <span class="text-danger" v-if="form.errors.has('nume')" v-text="form.errors.get('nume')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="cui" class="col-lg-4 form-label">CUI</label>

                <div class="col-lg-8">
                    <input id="cui" type="text" class="form-control" name="cui" v-model="form.cui">
                    <span class="text-danger" v-if="form.errors.has('cui')" v-text="form.errors.get('cui')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="judet" class="col-lg-4 form-label">Judet</label>

                <div class="col-lg-8">
                    <input id="judet" type="text" class="form-control" name="judet" v-model="form.judet">
                    <span class="text-danger" v-if="form.errors.has('judet')" v-text="form.errors.get('judet')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="localitate" class="col-lg-4 form-label">Localitate</label>

                <div class="col-lg-8">
                    <input id="localitate" type="text" class="form-control" name="localitate" v-model="form.localitate">
                    <span class="text-danger" v-if="form.errors.has('localitate')" v-text="form.errors.get('localitate')"></span>

                </div>
            </div>

            <div class="form-group row">
                <label for="adresa" class="col-lg-4 form-label">Adresa</label>

                <div class="col-lg-8">
                    <textarea name="adresa" id="adresa" cols="30" rows="3" class="form-control" v-model="form.adresa"></textarea>
                    <span class="text-danger" v-if="form.errors.has('adresa')" v-text="form.errors.get('adresa')"></span>

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
                    nume: '',
                    cui: '',
                    judet: '',
                    localitate: '',
                    adresa: '',
                })
            }
        },

        methods: {
            formSubmit() {
                this.form.submit('post', '/cont/companie/creaza')
                    .then(data => console.log(data))
                    .catch(errors => console.log(errors));
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
