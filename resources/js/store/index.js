import {createStore} from "vuex";
import axios from "axios";

export default createStore({
    state: {
        article: {
            comments: [],
            tags: [],
            statistic: {
                likes: 0,
                views: 0
            }
        },
        slug: '',
        likeIt: true
    },
    actions: {
        getArticleData(context, payload) {
            console.log('context', context);
            console.log('payload', payload);
            axios.get('/api/article-json', {params: {slug:payload}}).then((response) => {
                context.commit('SET_ARTICLE', response.data.data);
            }).catch(() => {
            })
        },
        viewsIncrement(context, payload) {
            setTimeout(() => {
                axios.put('/api/article-views-increment', {slug:payload}).then((response) => {
                    context.commit('SET_ARTICLE', response.data.data);
                }).catch(() => {
                    console.log('Ошибка');
                })
            }, 5000);
        },
        addLike(context, payload){
            axios.put('/api/article-likes-increment', {slug:payload.slug, increment:payload.increment }).then((response) =>{
                context.commit('SET_ARTICLE', response.data.data)
                context.commit('SET_LIKE', !context.state.likeIt)
            }).catch(()=>{
                console.log('Ошибка addLike')
            });
            console.log("После клика по кнопке", context.state.likeIt);
        }
    },
    getters: {
        articleViews(state) {
            return state.article.statistic.views;
        },
        articleLikes (state) {
            return state.article.statistic.likes;
        }
    },
    mutations: {
        SET_ARTICLE(state, payload) {
            return state.article = payload;
        },
        SET_SLUG(state, payload) {
            return state.slug = payload;
        },
        SET_LIKE(state, payload) {
            return state.likeIt = payload;
        }
    }
});

