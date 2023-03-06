
import './bootstrap';
import { createApp } from 'vue';

import  store  from './store';


const app = createApp({
    created() {
        let url = window.location.pathname;
        let slug = url.substring(url.lastIndexOf('/') + 1);
        console.log(url);
        console.log(slug);
        this.$store.commit('SET_SLUG', slug);
        this.$store.dispatch('getArticleData', slug);
        this.$store.dispatch('viewsIncrement', slug);
    }
});
app.use(store);

import ExampleComponent from './components/ExampleComponent.vue';
import ArticleComponent from "./components/ArticleComponent.vue";
import ViewsComponent from "./components/ViewsComponent.vue";
import LikesComponent from "./components/LikesComponent.vue";
import CommentsComponent from "./components/CommentsComponent.vue";

app.component('example-component', ExampleComponent);
app.component('article-component', ArticleComponent);
app.component('views-component', ViewsComponent);
app.component('likes-component', LikesComponent);
app.component('comments-component', CommentsComponent);

app.mount('#app');
