import {createStore} from "vuex";

export default createStore({
    state: {
        firstname: 'Alexey',
        lastname: 'Sokolov'
    },
    actions: {
        testAction(context, payload) {
            context.commit('SET_FIRSNAME', response.data.name)
            context.commit('SET_LASTNAME', response.data.lastname)

        }
    },
    getters: {
        getFullName(state) {
            return state.firstname + ' ' + state.lastname;
        }
    },
    mutations: {
        SET_FIRSNAME(state, payload) {
            state.firstname = payload;
        },
        SET_LASTNAME(state, payload)
        {
            state.lastname = payload;
        }
    }
});

