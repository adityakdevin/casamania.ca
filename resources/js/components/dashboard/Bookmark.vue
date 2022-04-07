<template>
    <div>
        <div class="container px-4">
            <h2 class="theme-title">Bookmarked Properties</h2>
            <div class="row justify-content-center mt-2">
                <div v-if="!loadingProperties">
                    <div v-if="properties.length > 0" class="row">
                        <div
                            v-for="property in properties"
                            :key="property.Ml_num"
                            class="col-lg-4 col-md-6 col-sm-12 mt-5"
                        >
                            <PropCard :property="property" />
                        </div>

                        <div>
                            <div v-if="!loadingMoreProperties">
                                <div
                                    v-if="nextPageUrl"
                                    class="load-more-button mt-4 text-center"
                                >
                                    <button
                                        class="btn btn-theme-color px-5"
                                        @click="loadMore"
                                    >
                                        Load More
                                        <small class="ps-2"
                                            ><i class="fas fa-arrow-right"></i
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
                        <no-data />
                    </div>
                </div>
                <div v-else class="row">
                    <div class="p-5 text-center">
                        <loader />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Loader from "../commonComponents/Loader.vue";
import NoData from "../commonComponents/NoData.vue";
import PropCard from "../property/cards.vue";
export default {
    components: { Loader, PropCard, NoData },
    data() {
        return {
            properties: [],
            loadingProperties: true,
            nextPageUrl: null,
            loadingMoreProperties: false,
        };
    },
    computed: {
        bookmarks() {
            return this.$store.state.favourite;
        },
    },
    mounted() {
        this.getSavedProp();
    },
    methods: {
        async getSavedProp() {
            // get properties
            const token = this.$store.state.auth_token;
            // console.log({ headers: {"Authorization" : `Bearer ${token}`} })
            const self = this;
            self.loadingProperties = true;
            await axios
                .get("/api/user/property/bookmarks", {
                    headers: { Authorization: `Bearer ${token}` },
                })
                .then((response) => {
                    self.properties = response.data.data.data;
                    self.nextPageUrl = response.data.data.next_page_url;
                    // console.log(self.properties);
                    self.loadingProperties = false;
                })
                .catch((err) => {
                    self.loadingProperties = false;
                    console.log(err);
                });
        },

        async loadMore() {
            const self = this;
            const token = this.$store.state.auth_token;
            self.loadingMoreProperties = true;
            console.log(self.nextPageUrl);
            await axios
                .get(self.nextPageUrl, {
                    headers: { Authorization: `Bearer ${token}` },
                })
                .then(async (res) => {
                    await self.updateProperties(res.data.data.data);
                    self.nextPageUrl = res.data.data.next_page_url;
                    self.loadingMoreProperties = false;
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
