<template>
    <div>
        <div>
            <!-- Breakcrumbs -->
            <section class="breadcrumb-section bg-theme-light py-5">
                <div class="container p-0">
                    <div class="row py-0">
                        <div class="col-12">
                            <h2 class="theme-title text-start">Properties</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <router-link to="/"
                                            ><img
                                                src="/assets/images/icons/Mask Group.svg"
                                                width="14"
                                                class="
                                                    img-fluid
                                                    align-middle
                                                    pb-1
                                                "
                                                alt=""
                                            />
                                            Home</router-link
                                        >
                                    </li>
                                    <li class="breadcrumb-item">
                                        <router-link to="/property/search"
                                            >Properties</router-link
                                        >
                                    </li>
                                    <li class="breadcrumb-item">
                                        <span class="active"
                                            >Property search</span
                                        >
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breakcrumbs -->

            <!-- Banner  -->
            <section class="properties bg-theme-light position-relative">
                <div class="container p-0">
                    <div class="row propp">
                        <div class="col-12 properties-filter">
                            <property-search
                                :form="form"
                                @clicked="getFilteredDataOnClick"
                            ></property-search>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Banner  -->

            <section class="p-0">
                <div class="container">
                    <hr class="m-0" />
                </div>
            </section>

            <!-- hr -->

            <!-- Property Listing  -->
            <section class="property bg-theme-light">
                <div class="container p-0">
                    <h2 class="theme-title">
                        <span v-if="ifSearched"></span>
                        <span v-if="!searching">All Property Listings</span>
                        <span v-else>Results based on your search</span>
                    </h2>
                    <div v-if="!loadingProperties">
                        <div v-if="properties.length > 0" class="row">
                            <div
                                class="page-length mt-3"
                                style="font-size: 13px"
                            >
                                <div class="d-flex justify-content-between">
                                    <div class="counter">
                                        Showing {{ showing }} of {{ total }}
                                    </div>
                                    <div class="page">
                                        Page {{ currentPage }} of
                                        {{ totalPage }}
                                    </div>
                                </div>
                            </div>
                            <div
                                v-for="property in properties"
                                :key="property.Ml_num"
                                class="col-lg-4 col-md-6 col-sm-12 mt-4"
                            >
                                <PropCard :property="property" />
                            </div>
                            <div
                                class="page-length mt-3"
                                style="font-size: 13px"
                            >
                                <div class="d-flex justify-content-between">
                                    <div class="counter">
                                        Showing {{ showing }} of {{ total }}
                                    </div>
                                    <div class="page">
                                        Page {{ currentPage }} of
                                        {{ totalPage }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div v-if="!loadingMoreProperties">
                                    <div
                                        v-if="nextPageUrl"
                                        class="
                                            load-more-button
                                            mt-4
                                            text-center
                                        "
                                    >
                                        <button
                                            class="btn btn-theme-color px-5"
                                            @click="loadMore"
                                        >
                                            Load More
                                            <small class="ps-2"
                                                ><i
                                                    class="fas fa-arrow-right"
                                                ></i
                                            ></small>
                                        </button>
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="mt-5 text-center">
                                        <loader
                                            :text="'Please wait, Loading More Properties for you...'"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <NoData :text="'filterRes'" />
                        </div>
                    </div>
                    <div v-else class="row">
                        <div class="p-5 text-center">
                            <loader />
                        </div>
                    </div>
                </div>
            </section>
            <!-- Property Listing  -->
        </div>
    </div>
</template>

<script>
import Loader from "../../components/commonComponents/Loader.vue";
import PropCard from "../../components/property/cards.vue";
export default {
    components: { PropCard, Loader },
    data() {
        return {
            form: {},
            properties: null,
            loadingProperties: true,
            nextPageUrl: null,
            loadingMoreProperties: false,

            currentPage: 0,
            totalPage: 0,
            showing: 0,
            total: 0,

            searching: false,
        };
    },
    computed: {
        ifSearched() {
            if (this.form) {
                if (!!Object.keys(this.form).length) {
                    this.searching = true;
                }
            }
            return true;
        },
    },
    mounted() {
        this.getFilteredDataOnLoad();
    },
    methods: {
        getFilteredDataOnLoad() {
            // this.form = this.$route.params.data;
            this.form = this.$store.state.filterForm;
            this.getFilteredData(this.form);
        },

        getFilteredDataOnClick(data) {
            this.searching = true;
            this.getFilteredData(data);
        },

        async getFilteredData(data) {
            const self = this;
            self.loadingProperties = true;
            await axios
                .post("/api/property/search", null, {
                    params: data,
                })
                .then((res) => {
                    self.properties = res.data.data.data;
                    self.nextPageUrl = res.data.data.next_page_url;
                    self.loadingProperties = false;

                    self.currentPage = res.data.data.current_page;
                    self.totalPage = res.data.data.last_page;
                    self.showing = res.data.data.to;
                    self.total = res.data.data.total;
                })
                .catch((err) => {
                    self.properties = null;
                    self.loadingProperties = false;
                    console.log(err);
                });
        },

        async loadMore() {
            const self = this;
            self.loadingMoreProperties = true;
            await axios
                .post(self.nextPageUrl, null, {
                    params: self.form,
                })
                .then(async (res) => {
                    await self.updateProperties(res.data.data.data);
                    self.nextPageUrl = res.data.data.next_page_url;
                    self.loadingMoreProperties = false;

                    self.currentPage = res.data.data.current_page;
                    self.totalPage = res.data.data.last_page;
                    self.showing = res.data.data.to;
                    self.total = res.data.data.total;
                })
                .catch((err) => {
                    self.loadingMoreProperties = false;
                    console.log(err);
                });
        },

        async updateProperties(arr) {
            arr.forEach((element) => {
                this.properties.push(element);
            });
        },
    },
};
</script>
