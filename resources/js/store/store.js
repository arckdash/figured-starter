import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        token: null,
        userId: null,
        categories: [],
        posts: [],
    },
    mutations: {
        authUser (state, userData) {
            state.token = userData.access_token;
        },
        logout(state) {
            state.token = null;
        },
        loadPosts (state, postData) {
            state.posts = postData;
        }
    },
    actions: {
        signIn({commit}, authData) {
            axios.post('/oauth/token', authData)
                .then(res => {
                    if (res.status === 200) {
                        commit('authUser', res.data);
                    }
                })
                .catch(err => console.log(err));
        },
        signOut({commit, state}) {
            if (!state.token) {
                return;
            }

            axios.delete('/api/v1/auth/logout', {
                headers: {
                    Authorization: 'Bearer ' + state.token
                }
            })
                .then(res => {
                    if (res.status === 200) {
                        commit('logout');
                    }
                });
        },
        getPostList({commit}) {
            axios.get('/api/v1/posts')
                .then(res => {
                    if (res.status === 200) {
                        commit('loadPosts', res.data.posts);
                    }
                })
                .catch(err => console.log(err));
        },
        savePost({commit, state, dispatch}, postData) {
            if (!state.token) {
                return;
            }
            axios.post('/api/v1/posts', postData, {
                headers: {
                    Authorization: 'Bearer ' + state.token
                }
            })
                .then(res => {
                    if (res.status === 200) {
                        dispatch('getPostList');
                    }
                })
                .catch(err => console.log(err));
        },
        updatePost({commit, state, dispatch}, postData) {
            if (!state.token) {
                return;
            }
            axios.put('/api/v1/posts', postData, {
                headers: {
                    Authorization: 'Bearer ' + state.token
                }
            })
                .then(res => {
                    if (res.status === 200) {
                        dispatch('getPostList');
                    }
                })
                .catch(err => console.log(err));
        },
        deletePost({commit, state, dispatch}, postId) {
            if (!state.token) {
                return;
            }

            axios.delete('/api/v1/posts?id=' + postId,  {
                headers: {
                    Authorization: 'Bearer ' + state.token
                }
            }).then(res => {
                dispatch('getPostList');
            }).catch(err => console.log(err));
        }
    },
    getters: {
        isAuthenticated (state) {
            return state.token ? true : false;
        }
    }
});
