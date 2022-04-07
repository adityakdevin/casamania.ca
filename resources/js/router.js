import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import PropertyDetails from "./pages/property/details.vue";
import PropertySearch from "./pages/property/search.vue";
import Login from "./pages/Login.vue";
import ForgetPassword from "./pages/password/forget.vue";
import ResetPassword from "./pages/password/reset.vue";

import Signup from "./pages/Signup.vue";
import UserDashboard from "./pages/user/Dashboard.vue";
import NotFound from "./pages/notFound/404.vue";

import Blogs from "./pages/Blog.vue";

import About from "./pages/about/index.vue";
import Contact from "./pages/contact/index.vue";
import TermnsOfUses from "./pages/termnsOfUses/index.vue";
import PrivacyPolicy from "./pages/privacyPolicy/index.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    // linkExactActiveClass: "active",
    routes: [
        {
            path: "*",
            name: "404",
            component: NotFound,
        },
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/blog",
            name: "blog",
            component: Blogs,
        },
        {
            path: "/about-us",
            name: "home",
            component: About,
        },
        {
            path: "/contact-us",
            name: "home",
            component: Contact,
        },
        {
            path: "/terms-of-use",
            name: "home",
            component: TermnsOfUses,
        },
        {
            path: "/privacy-policy",
            name: "home",
            component: PrivacyPolicy,
        },
        {
            path: "/property/view/:ml_num",
            name: "view-details",
            component: PropertyDetails,
        },
        {
            path: "/property/search/",
            name: "search-property",
            component: PropertySearch,
            props: true,
        },
        {
            path: "/login",
            name: "login",
            component: Login,
        },
        {
            path: "/forget-password",
            name: "forget-password",
            component: ForgetPassword,
        },
        {
            path: "/reset-password",
            name: "reset-password",
            component: ResetPassword,
        },
        {
            path: "/sign-up",
            name: "sign-up",
            component: Signup,
        },
        {
            path: "/dashboard/my-account",
            name: "my-account",
            component: UserDashboard,
        },
        {
            path: "/dashboard/bookmarks",
            name: "bookmarks",
            component: UserDashboard,
        },
        {
            path: "/dashboard/notifications",
            name: "notifications",
            component: UserDashboard,
        },
        {
            path: "/dashboard/recent-visited",
            name: "recent-visited",
            component: UserDashboard,
        },
    ],
});

router.beforeEach((to, from, next) => {
    if (!to.meta.middleware) {
        return next();
    }
    const middleware = to.meta.middleware;

    const context = {
        to,
        from,
        next,
        store,
    };
    return middleware[0]({
        ...context,
    });
});

export default router;
