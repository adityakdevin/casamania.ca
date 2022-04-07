<template>
    <div>
        <!-- Breakcrumbs -->
        <section class="breadcrumb-section bg-theme-light py-5">
            <div class="container p-0">
                <div class="row py-0">
                    <div class="col-12">
                        <h2 class="theme-title text-start">Account</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link to="/"
                                        ><img
                                            src="/./assets/images/icons/Mask Group.svg"
                                            width="14"
                                            class="img-fluid align-middle pb-1"
                                            alt=""
                                        />
                                        Home</router-link
                                    >
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link to="/dashboard/my-account"
                                        >Dashboard</router-link
                                    >
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link
                                        to="/dashboard/notifications"
                                        class="active text-capitalize"
                                        >{{
                                            activeTab.replace("-", " ")
                                        }}</router-link
                                    >
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breakcrumbs -->

        <!-- Notification -->
        <section class="notify px-0 pt-0 bg-theme-light">
            <div class="container-fluid p-0 pb-5">
                <div class="wrapper p-0">
                    <div class="n-tabs">
                        <div class="notification-tab container">
                            <!--To run tabs -->
                            <ul class="list-unstyled m-0">
                                <li class="d-inline-block float-start">
                                    <router-link to="/dashboard/my-account">
                                        <button
                                            class="btn"
                                            :class="
                                                activeTab == 'my-account'
                                                    ? 'active'
                                                    : ''
                                            "
                                        >
                                            <img
                                                src="/../../assets/images/icons/ac.svg"
                                                alt=""
                                                width="18px"
                                            />
                                            <span
                                                :class="
                                                    activeTab == 'my-account'
                                                        ? ''
                                                        : 'col-md-none'
                                                "
                                                >My Account</span
                                            >
                                        </button>
                                    </router-link>
                                    <router-link to="/dashboard/bookmarks">
                                        <button
                                            class="btn"
                                            :class="
                                                activeTab == 'bookmarks'
                                                    ? 'active'
                                                    : ''
                                            "
                                        >
                                            <img
                                                src="/../../assets/images/icons/bookmark.svg"
                                                alt=""
                                                width="18px"
                                            />
                                            <span
                                                :class="
                                                    activeTab == 'bookmarks'
                                                        ? ''
                                                        : 'col-md-none'
                                                "
                                                >Bookmarked</span
                                            >
                                        </button>
                                    </router-link>
                                    <router-link to="/dashboard/notifications">
                                        <button
                                            class="btn"
                                            :class="
                                                activeTab == 'notifications'
                                                    ? 'active'
                                                    : ''
                                            "
                                        >
                                            <img
                                                src="/../../assets/images/icons/alarm.svg"
                                                alt=""
                                                width="18px"
                                            />
                                            <span
                                                :class="
                                                    activeTab == 'notifications'
                                                        ? ''
                                                        : 'col-md-none'
                                                "
                                                >Notifications</span
                                            >
                                        </button>
                                    </router-link>
                                    <router-link to="/dashboard/recent-visited">
                                        <button
                                            class="btn"
                                            :class="
                                                activeTab == 'recent-visited'
                                                    ? 'active'
                                                    : ''
                                            "
                                        >
                                            <img
                                                src="/../../assets/images/icons/clock.svg"
                                                alt=""
                                                width="18px"
                                            />
                                            <span
                                                :class="
                                                    activeTab ==
                                                    'recent-visited'
                                                        ? ''
                                                        : 'col-md-none'
                                                "
                                                >Recent Visited</span
                                            >
                                        </button>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div v-if="activeTab == 'my-account'">
                    <my-account />
                </div>
                <div v-if="activeTab == 'bookmarks'">
                    <bookmarks />
                </div>
                <div v-if="activeTab == 'notifications'">
                    <notifications />
                </div>
                <div v-if="activeTab == 'recent-visited'">
                    <recent-visit />
                </div>
            </div>
        </section>

        <!-- Notification -->
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
    computed: {
        // a computed getter
        activeTab() {
            // `this` points to the vm instance
            return this.$route.name;
        },
    },
    mounted() {
        this.isAuthorized();
    },
    methods: {
        isAuthorized() {
            if (!this.$store.state.auth_token) {
                this.$router.push("/login");
            }
        },
    },
};
</script>
