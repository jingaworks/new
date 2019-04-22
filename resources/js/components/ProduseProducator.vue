<template>
  <div>


    <div class="col-lg-12">

        <form @submit.prevent="onSubmit">
            <div v-for="category in categories" :key="category.id" class="row">
              <div class="col-lg-12">

                <div class="col-lg-12 pb-3"><h2>{{ category.nume }}</h2></div>

                <div class="form-group row">
                    <!-- <div class="col-lg-12"> -->
                        <div v-for="product in category.subcategorii" :key="product.id" class="col-lg-4 px-4">
                            <div class="field">
                                <div class="" :class="{ selectedBox: selectedProducts.includes(product.id) }">
                                    <label class="form-label">
                                        <input type="checkbox" :value="product.id" :name="product.id" v-model="selectedProducts" :checked="selectedProducts.includes(product.id)" @click="check($event)">
                                        {{ product.nume }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>

                <div class="form-group row">
                    <div class="col-lg-6 mb-3">
                        <input class="form-control" type="text" :name="category.id" v-model="newProduct[category.id]" :key="category.id" placeholder="Adauga produs nou">
                    </div>
                    <div class="col-lg-6">
                        <button type="button" :disabled="!newProduct[category.id]" class="btn btn-warning btn-block" @click="addProduct(category.id)">Adauga produs in {{ category.nume }}</button>
                    </div>
                </div>

              </div>
            </div>

            <!-- <div class="field is-grouped is-grouped-centered">
              <p class="control">
                <input type="submit" class="btn btn-info btn-block" value="Inregistreaza datele">
              </p>
            </div> -->

        </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
      newProduct: [],
      selectedProducts: [],
      currentProduct: null
    };
  },

  created() {
    this.getData();
  },

  watch: {
    selectedProducts() {
      this.onSubmit()
    }
  },

  methods: {

    onSubmit() {
      axios.post('/cont/produse_json', { produse: this.selectedProducts , current: this.currentProduct})
        .then((response) => {
          if(this.currentProduct) {
            if(response.data.new) {
              this.$toasted.success(response.data.msg, { 
                              theme: "outline", 
                              position: "top-right", 
                              duration : 2000
                            })
              // this.$toasted.success(response.data.msg).goAway(1500)
            } else {
              this.$toasted.info(response.data.msg, { 
                              theme: "outline", 
                              position: "top-right", 
                              duration : 2000
                            })
            }
          }

            this.currentProduct = null
        })
        .catch((error) => {
            this.$toasted.show(error.data).goAway(1500)
        })
    },

    addProduct(id) {
      console.log(this.newProduct[id])
      axios.post('/cont/agauga-produs', { category: id, nume: this.newProduct[id] })
        .then((response) => {
          this.newProduct = [];
          this.$toasted.success(response.data).goAway(3000)
          this.getData();
        })
        .catch((error) => {
            this.$toasted.show(error.response.data.errors.name[0]).goAway(2500)
        });
    },

    getData() {
      axios.get('/cont/produse_json')
        .then((response) => {
          this.categories = response.data.categories
          this.selectedProducts = response.data.current.map(obj => obj.id)
        })
        .catch(error => {
          console.log(error);
        });
    },

    check: function(e) {
      this.currentProduct = e.target
      if (e.target.checked) {
      }
    }
  }

};
</script>
