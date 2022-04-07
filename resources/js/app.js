require("./bootstrap");

window.Vue = require("vue").default;
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";
import "vue-select/dist/vue-select.css";

import router from "./router";
import App from "./layouts/App.vue";
import Vue from "vue";
import VueSocialSharing from "vue-social-sharing";

import vSelect from "vue-select";
Vue.component("v-select", vSelect);

import VueLazyload from "vue-lazyload";

Vue.use(Vuex);
Vue.use(VueSocialSharing);

Vue.use(VueLazyload, {
    preLoad: 1.3,
    error: "/assets/images/loader/Image-404.jpg",
    loading: "/assets/images/loader/loader.gif",
    attempt: 1,
});

Vue.component(
    "loader",
    require("./components/commonComponents/Loader.vue").default
);

Vue.component(
    "NoData",
    require("./components/commonComponents/NoData.vue").default
);

Vue.component(
    "add-header",
    require("./components/commonComponents/Header.vue").default
);

Vue.component(
    "add-footer",
    require("./components/commonComponents/Footer.vue").default
);

Vue.component(
    "property-search",
    require("./components/search/index.vue").default
);

Vue.component(
    "property-listing",
    require("./components/PropertyListing.vue").default
);

Vue.component(
    "notifications",
    require("./components/dashboard/Notification.vue").default
);

Vue.component(
    "bookmarks",
    require("./components/dashboard/Bookmark.vue").default
);

Vue.component(
    "my-account",
    require("./components/dashboard/Profile.vue").default
);

Vue.component(
    "recent-visit",
    require("./components/dashboard/RecentVisit.vue").default
);

Vue.component("faq", require("./components/Faq.vue").default);

const store = new Vuex.Store({
    state: {
        auth_token: null,
        auth_user: null,
        favourite: [],
        recent: [],
        filterForm: {},
        advanceFilterOpened: false,
    },
    plugins: [createPersistedState()],
    mutations: {
        addAuthToken(state, token) {
            state.auth_token = token;
        },
        removeAuthToken(state) {
            state.auth_token = null;
        },
        addAuthUser(state, user) {
            state.auth_user = user;
        },
        removeAuthUser(state) {
            state.auth_user = null;
        },
        addFavourite(state, ml_num) {
            state.favourite.push(ml_num);
        },
        removeFavourite(state, ml_num) {
            var index = state.favourite.indexOf(ml_num);
            if (index !== -1) {
                state.favourite.splice(index, 1);
            }
        },
        removeBookMark(state) {
            state.favourite = [];
        },
        addRecent(state, ml_num) {
            var index = state.recent.indexOf(ml_num);
            if (index < 0) {
                // Not exists --- add new
                // check length
                if (state.recent.length >= 9) {
                    state.recent.splice(0, 1);
                }
                state.recent.push(ml_num);
            }
        },
        removeRecent(state) {
            state.recent = [];
        },
        preventFilter(state, form) {
            state.filterForm = form;
        },
        clearFilter(state) {
            state.filterForm = {};
        },
        toggleAdvanceFilter(state) {
            state.advanceFilterOpened = !state.advanceFilterOpened;
        },
        UpdateUserAvatar(state, avatar) {
            state.auth_user.avatar = avatar;
        },
    },
});

const app = new Vue({
    router,
    el: "#app",
    store,
    render: (h) => h(App),
});
