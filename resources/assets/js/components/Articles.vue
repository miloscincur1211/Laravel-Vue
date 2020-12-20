<style>
  ul li {
    display: inline;
    padding: 10px;
  }
</style>

<template>

  <div class="row">

    <div class="col-8" style="padding-right: 3rem">
      <div class="row">
        <div class="col-12">
          <div style="float:left; margin-bottom:50px"><button type="button"  @click="adminMode()"   class="btn btn-teal btn-rounded btn-warning btn-sm m-0">Admin mode</button></div>
        </div>
      </div>
    <h2>Porucite hranu</h2>
    <table class="table table-striped table-responsive-md btn-table">
      <thead>
      <tr>
        <th  style="width: 2rem; text-align: center">#</th>
        <th   style="width: 12rem; text-align: center">Naziv</th>
        <th  style="width: 20rem; text-align: center">Sastav</th>
        <th  style="width: 12rem; text-align: center">Cijena</th>
        <th   style="width: 10rem; text-align: center">Dodaj u korpu</th>
      </tr>
      </thead>
    </table>

    <h5>Dorucak</h5>
    <div class="" v-for="article in articles"  >
      <div v-if="article.vrsta === 'dorucak'">
        <table class="table table-striped table-responsive-md btn-table">
        <tbody>
        <tr>
          <td style="width: 2rem; text-align: center">{{ article.id }}</td>
          <td  style="width: 12rem; text-align: center">{{ article.naziv }}</td>
          <td  style="width: 20rem; text-align: center">{{ article.sastav }}</td>
          <td  style="width: 12rem; text-align: center">{{ article.cijena }} €</td>
          <td style="width: 10rem; text-align: center" >
            <button type="button"  v-show="toogle" @click="PushItems(article)"  class="btn btn-teal btn-rounded btn-success btn-sm m-0">Dodaj</button>
            <button type="button"  v-show="!toogle"  @click="deleteArticle(article)"  class="btn btn-teal btn-rounded btn-danger btn-sm m-0">Obrisi</button>
            <div id="app">
            </div>
          </td>
        </tr>
        </tbody>
      </table>
      </div>
    </div>

    <h5>Glavna jela</h5>
    <div class="" v-for="article in articles"  >
      <div v-if="article.vrsta === 'glavno jelo'">
        <table class="table table-striped table-responsive-md btn-table">
          <tbody>
          <tr>
            <td style="width: 2rem; text-align: center">{{ article.id }}</td>
            <td  style="width: 12rem; text-align: center">{{ article.naziv }}</td>
            <td  style="width: 20rem; text-align: center">{{ article.sastav }}</td>
            <td  style="width: 12rem; text-align: center">{{ article.cijena }} €</td>
            <td style="width: 10rem; text-align: center">
              <button type="button"  v-show="toogle" @click="PushItems(article)"  class="btn btn-teal btn-rounded btn-success btn-sm m-0">Dodaj</button>
              <button type="button"  v-show="!toogle"  @click="deleteArticle(article)"  class="btn btn-teal btn-rounded btn-danger btn-sm m-0">Obrisi</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
    <h5>Karta pica</h5>
    <div class="" v-for="article in articles" >
      <div v-if="article.vrsta === 'pice'">
        <table class="table table-striped table-responsive-md btn-table">
          <tbody>
          <tr>
            <td style="width: 2rem; text-align: center">{{ article.id }}</td>
            <td  style="width: 12rem; text-align: center">{{ article.naziv }}</td>
            <td  style="width: 20rem; text-align: center">{{ article.sastav }}</td>
            <td  style="width: 12rem; text-align: center">{{ article.cijena }} €</td>
            <td style="width: 10rem; text-align: center">
              <button type="button"  v-show="toogle" @click="PushItems(article)"  class="btn btn-teal btn-rounded btn-success btn-sm m-0">Dodaj</button>
              <button type="button"  v-show="!toogle"  @click="deleteArticle(article)"  class="btn btn-teal btn-rounded btn-danger btn-sm m-0">Obrisi</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    <div class="col-4" v-show="sum" style="margin-top: 5rem">

      <h2>Porduzbina</h2>
      <div class="card">
        <ul class="list-group" style="margin-top: 3rem;"  v-for="array in NewArray"  v-bind:key="array.id">
          <li class=""><a style="float: left">{{array.naziv}} - {{array.cijena}}</a><a style="float: right">
            <button
                  type="button"
                  class="btn btn-teal btn-rounded btn-primary btn-sm m-0"
                  @click="showModal(array)">
              Opis
          </button>
            <button type="button" @click="RemoveItem(array)" class="btn btn-teal btn-rounded btn-danger btn-sm m-0">x</button>
          </a>
          </li>
          <modal :listdata="clickedItem"
                 v-show="isModalVisible"
                 @close="closeModal"
          />
        </ul>
        <div class="card-body" v-show="sum" style="margin-top:20px">
         <h5 class="card-title" style="float: right">Ukupno : {{sum}} €</h5>
        </div>
        <div class="card-body">
          <button type="button" @click="PayOrder(NewArray)" class="btn btn-teal btn-rounded btn-success btn-sm m-0" style="float:right">Plati</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import modal from '../components/modal.vue';

export default {
  name: 'app',
  components: {
    modal,
  },
  data() {
    return {
      articles: [],
      NewArray: [],
      arrays: [],
      article: {
        id: '',
        vrsta: '',
        naziv: '',
        cijena: '',
        sastav: '',
      },
      article_id: '',
      pagination: {},
      edit: false,
      sum: '',
      datas: [],
      toogle: true,
      toogles: false,
      isModalVisible: false,
      clickedItem: [],
    };



  },

  created() {
    this.fetchArticles();
    this.OrdersArticle();
  },


  methods: {

    showModal(array) {
      this.clickedItem = [];
      this.clickedItem.push(array);
      this.isModalVisible = true;
    },
    closeModal() {
      this.isModalVisible = false;
    },

    fetchArticles(page_url) {
      let vm = this;
      page_url = page_url || '/api/articles';
      fetch(page_url)
              .then(res => res.json())
              .then(res => {
                this.articles = res.data;
              })
              .catch(err => console.log(err));

    },

    PushItems(article){
      this.NewArray.push(article);
      this.sum = this.NewArray.reduce(function(total, num){ return total + parseFloat(num.cijena) }, 0);
      console.log(this.NewArray);
    },
    RemoveItem(array) {
      this.NewArray.splice(this.NewArray.indexOf(array), 1);
      this.sum = this.NewArray.reduce(function(total, num){ return total + parseFloat(num.cijena) }, 0);
    },
    adminMode(article){
      this.toogle = !this.toogle;
      this.toogles = !this.toogles;
    },
    deleteArticle(article) {
      this.arrays.push(article);
      if (confirm('Are You Sure?')) {
        fetch(`api/destroy`, {
          method: 'post',
          body: JSON.stringify(this.arrays),
        })
                .then(res => res.json())
                .then(data => {
                  alert('Article Removed');
                  this.fetchArticles();
                  this.arrays = [];
                })
                .catch(err => console.log(err));
      }
    },

    PayOrder(NewArray) {
      this.newData = [
           this.NewArray,
           this.sum,
      ];
      if (confirm('Are You Sure?')) {
        fetch(`api/data`, {
          method: 'post',
          body: JSON.stringify(this.newData),
        }).then(datas => {
            this.NewArray = [];
            this.sum = '';
          })
          .catch(err => console.log(err));
      }
    },

  }
};
</script>


