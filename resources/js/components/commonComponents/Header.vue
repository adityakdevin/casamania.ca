<template>
    <div>
        <header :class="$route.path == '/' ? 'home-header py-2' : 'py-2'">
            <div class="container p-0">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid p-0">
                        <router-link class="navbar-brand me-5" to="/">
                            <img
                                src="/assets/images/logo/logo.svg"
                                alt="Casamania"
                                width="150"
                            />
                        </router-link>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon header-icons"
                                ><img
                                    src="/assets/images/icons/menu_bar.svg"
                                    alt=""
                            /></span>
                        </button>
                        <div
                            class="collapse navbar-collapse right-menu"
                            id="navbarSupportedContent"
                        >
                            <master-search />
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <router-link
                                        class="nav-link active"
                                        aria-current="home"
                                        to="/"
                                        >Home</router-link
                                    >
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        class="nav-link"
                                        aria-current="properties"
                                        :to="{ name: 'search-property' }"
                                        >Properties</router-link
                                    >
                                </li>
                                <!-- <li class="nav-item">
                                    <router-link
                                        class="nav-link"
                                        aria-current="blog"
                                        to="/blog"
                                        >Blog</router-link
                                    >
                                </li> -->
                                <li class="nav-item p-0">
                                    <router-link
                                        class="
                                            nav-link
                                            t
                                            header-icons
                                            text-decoration-none
                                        "
                                        aria-current="favourate"
                                        to="/dashboard/bookmarks"
                                        ><img
                                            src="/assets/images/icons/bookmark.svg"
                                            alt="Bookmarks"
                                            class="mobile-m-v-hidden"
                                        />
                                        <div class="mobile-m-v">Bookmark</div>
                                    </router-link>
                                </li>
                                <li class="nav-item me-3">
                                    <router-link
                                        class="
                                            nav-link
                                            t
                                            header-icons
                                            text-decoration-none
                                        "
                                        aria-current="favourate"
                                        to="/dashboard/notifications"
                                        ><img
                                            src="/assets/images/icons/alarm.svg"
                                            alt="Notification"
                                            class="mobile-m-v-hidden"
                                        />
                                        <div class="mobile-m-v">
                                            Notifications
                                        </div>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <div v-if="!$store.state.auth_token">
                                        <router-link
                                            to="/login"
                                            class="text-light"
                                            ><button>
                                                <img
                                                    src="/assets/images/icons/refer.svg"
                                                    alt=""
                                                />Sign in
                                            </button></router-link
                                        >
                                    </div>
                                    <div v-else>
                                        <div class="dropdown">
                                            <button
                                                class="
                                                    btn btn-theme
                                                    dropdown-toggle
                                                "
                                                type="button"
                                                id="userDDBtn"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <i class="fa fa-user"></i>
                                                <div class="mobile-m-v">
                                                    &nbsp;&nbsp; My Account
                                                </div>
                                            </button>
                                            <div
                                                class="
                                                    dropdown-menu
                                                    dropdown-menu-right
                                                "
                                                aria-labelledby="userDDBtn"
                                            >
                                                <div class="dropdown-header">
                                                    Hi, {{ user.name }}
                                                </div>
                                                <div
                                                    class="dropdown-divider"
                                                ></div>
                                                <router-link
                                                    to="/dashboard/my-account"
                                                    role="button"
                                                    aria-hidden="true"
                                                    class="dropdown-item"
                                                    >Dashboard</router-link
                                                >
                                                <span
                                                    @click="logout"
                                                    role="button"
                                                    aria-hidden="true"
                                                    class="dropdown-item"
                                                    >Logout</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
</template>

<script>
import MasterSearch from "../master/search.vue";
export default {
    components: {
        MasterSearch,
    },
    computed: {
        user() {
            return this.$store.state.auth_user;
        },
    },
    methods: {
        async logout() {
            const token = this.$store.state.auth_token;

            this.$store.commit("removeAuthToken");
            this.$store.commit("removeAuthUser");
            this.$store.commit("removeBookMark");
            this.$router.push("/");
            await axios.post("/api/user/logout", {
                headers: { Authorization: `Bearer ${token}` },
            });
        },
    },
};
</script>

<style scoped>
.dropdown-menu-right {
    right: 0;
}
.navbar-toggler-icon {
    padding-top: 1.5px;
}

.home-header .navbar-toggler {
    box-shadow: none !important;
}

.mobile-m-v {
    opacity: 0;
    visibility: hidden;
    display: none;
}

.mobile-m-v-hidden {
    opacity: 1;
    visibility: visible;
    display: inline-block;
}

@media (max-width: 991px) {
    .mobile-m-v {
        opacity: 1;
        visibility: visible;
        display: inline-block;
    }

    .mobile-m-v-hidden {
        opacity: 0;
        visibility: hidden;
        display: none;
    }

    .search-bar,
    .search-bar .input-bar {
        width: 100%;
        max-width: 100% !important;
    }
    .nav-item {
        border-bottom: 1px solid rgba(0, 0, 0, 0.13);
    }

    .nav-item:last-child {
        border-bottom: none !important;
        padding-top: 10px;
        text-align: right;
    }
    .nav-item.me-3 {
        margin-right: 0 !important;
    }

    .home-header .nav-item {
        border-bottom: 1px solid rgba(255, 255, 255, 0.13);
    }
}
</style>
