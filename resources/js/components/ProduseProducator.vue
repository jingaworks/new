<template>
    <div class="col-lg-12">

        <form @submit.prevent="newProducts">
            <div v-for="category in categories" :key="category.id" class="row">
              <div class="col-lg-12">

                <div class="col-lg-12 pb-3"><h2>{{ category.nume }}</h2></div>

                <div class="form-group row" >
                    <!-- <div class="col-lg-12"> -->
                        <div v-for="product in category.subcategorii" :key="product.id" class="col-lg-4 px-4">
                            <!-- <div class="field" v-if="product.active == 1 || product.user_id == owner_id"> -->
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

            <div class="form-group row">
              <div class="col-lg-12 pb-3">
                <hr>
              </div>
                <div class="col-lg-6">
                    <input class="form-control" type="text" name="new_category" v-model="newCategory" placeholder="Adauga Categorie noua">
                </div>
                <div class="col-lg-6">
                    <button type="button" :disabled="!newCategory" class="btn btn-info btn-block" @click="addCategory">Adauga Categorie</button>
                </div>
            </div>

        </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
      newCategory: null,
      selectedProducts: [],
      newProduct: [],
      currentProduct: null,
      owner_id: null
    };
  },

  methods: {
    syncProducts() {
      axios.post('/cont/produse_json', { products: this.selectedProducts , current: this.currentProduct})
        .then((response) => {
          if(this.currentProduct) {
            if(response.data.new) {
              this.$toasted.success(response.data.msg, { 
                              theme: "outline", 
                              position: "top-right", 
                              duration : 2000
                            })
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
            this.$toasted.error(error.data, { action : {
                              text : 'X',
                              onClick : (e, toastObject) => {
                                  toastObject.goAway(0);
                              }
                          }}).goAway(5000)
        })
    },

    addCategory() {
      axios.post('/cont/adauga-categorie', { category: this.newCategory })
        .then((response) => {
          this.newCategory = null;
          this.$toasted.show(response.data, { 
                          theme: "outline", 
                          position: "top-right", 
                          duration : 3000
                        })
          this.getData();
        })
        .catch((error) => {
            this.$toasted.show(error.response.data.errors.category[0], { action : {
                              text : 'X',
                              onClick : (e, toastObject) => {
                                  toastObject.goAway(0);
                              }
                          }}).goAway(5000)
        });
    },

    addProduct(id) {
      axios.post('/cont/adauga-produs', { category: id, product: this.newProduct[id] })
        .then((response) => {
          this.newProduct = [];
          this.$toasted.show(response.data, { 
                          theme: "outline", 
                          position: "top-right", 
                          duration : 3000
                        })
          this.getData();
        })
        .catch((error) => {
            this.$toasted.error(error.response.data.errors.product[0], { action : {
                              text : 'X',
                              onClick : (e, toastObject) => {
                                  toastObject.goAway(0);
                              }
                          }}).goAway(5000)
        });
    },

    getData() {
      axios.get('/cont/produse_json')
        .then((response) => {
          this.categories = response.data.categories
          this.selectedProducts = response.data.current.map(obj => obj.id)
          this.owner_id = response.data.user_id
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
  },

  created() {
    this.getData();
  },

  watch: {
    selectedProducts() {
      if(this.currentProduct) {
        this.syncProducts()
      }
    }
  }

};
</script>
