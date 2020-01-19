import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        categories: [
            'World',
            'U.S.',
            'Technology',
            'Design',
            'Culture',
            'Business',
            'Politics',
            'Opinion',
            'Science',
            'Health',
            'Style',
            'Travel'
        ],
        posts: [
            {
                title: 'title_1',
                content: 'content_1',
                isFeatured: false,
            },
            {
                title: 'title_2',
                content: 'content_2',
                isFeatured: true,
            }
        ],
    }
});
