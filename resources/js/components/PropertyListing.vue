<template>
    <div>
        <section class="property bg-theme-light">
            <div class="container p-0">
                <h2 class="theme-title">
                    Featured Properties
                    <span v-if="propLocation"> in {{ locationName }}</span>
                </h2>
                <div v-if="!loadingProperties">
                    <div v-if="properties.length > 0" class="row">
                        <div
                            v-for="property in properties"
                            :key="property.Ml_num"
                            class="col-lg-4 col-md-6 col-sm-12 mt-5"
                        >
                            <PropCard :property="property"/>
                        </div>
                        <div class="mt-4 text-center">
                            <router-link
                                :to="{ name: 'search-property' }"
                                class="btn btn-theme-color px-5"
                            >View All
                            </router-link
                            >
                        </div>
                    </div>
                    <div v-else>
                        <no-data/>
                    </div>
                </div>
                <div v-else class="row">
                    <div class="p-5 text-center">
                        <loader
                            :text="`Loading Featured Properties in ${propLocation}...`"
                        />
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Loader from "./commonComponents/Loader.vue";
import NoData from "./commonComponents/NoData.vue";
import PropCard from "./property/cards.vue";

export default {
    components: { Loader, PropCard, NoData },
    data() {
        return {
            properties: [],
            loadingProperties: true,
        };
    },
    props: {
        propLocation: {
            type: String,
            default: "",
        },
    },
    computed: {
        locationName() {
            return (
                this.propLocation.charAt(0).toUpperCase() +
                this.propLocation.slice(1)
            );
        },
    },
    mounted() {
        this.getAllData();
    },
    methods: {
        async getAllData() {
            const self = this;
            self.loadingProperties = true;
            await axios
                .get(
                    `api/property/properties?property-location=${self.propLocation}`
                )
                .then((res) => {
                    self.properties = res.data.data.data;
                    self.loadingProperties = false;
                })
                .catch((err) => {
                    self.loadingProperties = false;
                    console.log(err);
                });
        },
    },
};
</script>
