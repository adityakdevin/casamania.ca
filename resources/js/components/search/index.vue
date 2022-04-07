<template>
    <div>
        <div class="wrapper">
            <div class="tabs">
                <div class="row">
                    <!-- Tabs / Prop type -->
                    <div class="col-12">
                        <div class="tab">
                            <input
                                type="radio"
                                name="css-tabs"
                                id="forSale"
                                class="tab-switch"
                                value="Sale"
                                :checked="form.listedFor == 'Sale'"
                                v-model="form.listedFor"
                            />
                            <label
                                for="forSale"
                                class="tab-label"
                                @click="searchPropertyViaCategory"
                                >Buy</label
                            >
                        </div>
                        <div class="tab">
                            <input
                                type="radio"
                                name="css-tabs"
                                id="for_lease"
                                class="tab-switch"
                                value="Lease"
                                :checked="form.listedFor == 'Lease'"
                                v-model="form.listedFor"
                            />
                            <label
                                for="for_lease"
                                class="tab-label"
                                @click="searchPropertyViaCategory"
                                >Rent</label
                            >
                        </div>
                    </div>
                    <!-- Tabs / Opotions -->
                    <div class="col-12">
                        <div class="tab w-100">
                            <div class="tab-content d-block">
                                <div class="row g-3">
                                    <div class="input-width">
                                        <label for="">Location/MLS#</label>
                                        <vue-google-autocomplete
                                            ref="address"
                                            id="map"
                                            classname="form-control"
                                            placeholder="Location/MLS"
                                            v-on:placechanged="getAddressData"
                                            @keyup="getAddressInputData"
                                            :value="form.addr"
                                            types="(cities)"
                                            country="ca"
                                        >
                                        </vue-google-autocomplete>
                                    </div>
                                    <div class="input-width">
                                        <label for="">Property Type</label>
                                        <select
                                            v-model="form.propertyType"
                                            class="form-control"
                                        >
                                            <option value="" disabled selected>
                                                Select Property Type
                                            </option>
                                            <option value="type=Residential">
                                                Residential
                                            </option>
                                            <option value="type=Commercial">
                                                Commercial
                                            </option>
                                            <option value="type=Condo">
                                                Condo
                                            </option>
                                            <option value="zonig=townhouse">
                                                townhouse
                                            </option>
                                            <option value="zonig=single family">
                                                single family
                                            </option>
                                            <option value="zonig=detached">
                                                detached
                                            </option>
                                            <option value="zonig=semi-detached">
                                                semi-detached
                                            </option>
                                            <option value="zonig=vacant land">
                                                vacant land
                                            </option>
                                            <option value="zonig=office">
                                                office
                                            </option>
                                            <option value="zonig=industrial">
                                                industrial
                                            </option>
                                            <option value="zonig=apartment">
                                                apartment
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input-width">
                                        <label for="">Pricing ($)</label>
                                        <input
                                            v-model="form.minPrice"
                                            type="number"
                                            class="form-control"
                                            aria-label="Last name"
                                            placeholder="Min"
                                            list="minPrices"
                                            min="1"
                                        />
                                        <datalist id="minPrices">
                                            <option value="0"></option>
                                            <option value="500"></option>
                                            <option value="1000"></option>
                                            <option value="5000"></option>
                                            <option value="10000"></option>
                                            <option value="20000"></option>
                                            <option value="50000"></option>
                                            <option value="100000"></option>
                                            <option value="500000"></option>
                                        </datalist>
                                    </div>
                                    <div class="input-width">
                                        <label for=""></label>
                                        <input
                                            v-model="form.maxPrice"
                                            type="number"
                                            class="form-control"
                                            aria-label="Last name"
                                            placeholder="Max"
                                            min="1"
                                            list="maxPrices"
                                        />
                                        <datalist id="maxPrices">
                                            <option value="5000"></option>
                                            <option value="10000"></option>
                                            <option value="20000"></option>
                                            <option value="50000"></option>
                                            <option value="100000"></option>
                                            <option value="500000"></option>
                                            <option value="1000000"></option>
                                            <option value="5000000"></option>
                                            <option value="10000000"></option>
                                        </datalist>
                                    </div>
                                    <div class="input-width">
                                        <label for="">Beds</label>
                                        <select
                                            v-model="form.bedRoom"
                                            class="form-control"
                                        >
                                            <option value="0">Any</option>
                                            <option value="1">1+</option>
                                            <option value="2">2+</option>
                                            <option value="3">3+</option>
                                            <option value="4">4+</option>
                                            <option value="5">5+</option>
                                        </select>
                                    </div>
                                    <div
                                        class="
                                            col
                                            justify-content-center
                                            d-flex
                                            align-items-end
                                        "
                                    >
                                        <button
                                            type="button"
                                            class="
                                                btn btn-theme-color
                                                input-full-wth
                                                w-100
                                            "
                                            @click="moreFilter"
                                        >
                                            <img
                                                src="/assets/images/icons/menu_bar.svg"
                                                alt=""
                                            />
                                            <span>
                                                <span v-if="!more">more</span>
                                                <span v-else>less</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div v-if="more" class="row g-3">
                                        <div class="input-width">
                                            <label for="">Baths</label>
                                            <select
                                                v-model="form.bath"
                                                class="form-control"
                                            >
                                                <option value="0">Any</option>
                                                <option value="1">1+</option>
                                                <option value="2">2+</option>
                                                <option value="3">3+</option>
                                                <option value="4">4+</option>
                                                <option value="5">5+</option>
                                            </select>
                                        </div>
                                        <div class="input-width">
                                            <label for="">Square Feet</label>
                                            <select
                                                v-model="form.sqft"
                                                class="form-control"
                                            >
                                                <option value="0">Any</option>
                                                <option value="500">
                                                    500+
                                                </option>
                                                <option value="1000">
                                                    1000+
                                                </option>
                                                <option value="1500">
                                                    1500+
                                                </option>
                                                <option value="2000">
                                                    2000+
                                                </option>
                                                <option value="2500">
                                                    2500+
                                                </option>
                                                <option value="5000">
                                                    5000+
                                                </option>
                                                <option value="10000">
                                                    10000+
                                                </option>
                                                <option value="20000">
                                                    20000+
                                                </option>
                                                <option value="25000">
                                                    25000+
                                                </option>
                                                <option value="50000">
                                                    50000+
                                                </option>
                                                <option value="100000">
                                                    100000+
                                                </option>
                                            </select>
                                        </div>
                                        <div class="input-width">
                                            <label for="">Listed Since</label>
                                            <input
                                                v-model="form.addedFrom"
                                                type="date"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="input-width">
                                            <label for="">Keywords</label>
                                            <input
                                                v-model="form.key"
                                                class="form-control"
                                                type="text"
                                            />
                                        </div>
                                        <div class="input-width">
                                            <label for=""> </label>
                                            <label class="form-control">
                                                <input
                                                    v-model="form.openHouse"
                                                    type="checkbox"
                                                    value="true"
                                                />
                                                Open Houses Only</label
                                            >
                                        </div>
                                    </div>
                                    <div
                                        class="
                                            col
                                            justify-content-center
                                            d-flex
                                            align-items-end
                                        "
                                    >
                                        <button
                                            type="button"
                                            class="
                                                btn btn-theme-color
                                                input-full-wth
                                                w-100
                                            "
                                            @click="searchProperty"
                                        >
                                            Search
                                        </button>
                                    </div>

                                    <div
                                        v-if="checkFilterApplied"
                                        class="row mt-2"
                                    >
                                        <div class="col-12 text-right">
                                            <small>
                                                <u>
                                                    <a
                                                        @click="clearFilter"
                                                        href="javascript:0;"
                                                    >
                                                        Clear filter
                                                    </a>
                                                </u>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VueGoogleAutocomplete from "vue-google-autocomplete";
export default {
    components: { VueGoogleAutocomplete },
    props: {
        form: {
            type: Object,
            default: () => ({}),
        },
    },
    computed: {
        checkFilterApplied() {
            if (this.$store.state.filterForm) {
                if (!!Object.keys(this.$store.state.filterForm).length) {
                    return true;
                }
            } else {
                return false;
            }
        },
        more() {
            return this.$store.state.advanceFilterOpened;
        },
    },
    methods: {
        clearFilter() {
            this.$store.commit("clearFilter");
            window.location.reload();
        },

        moreFilter() {
            this.$store.commit("toggleAdvanceFilter");
        },

        getAddressData(addressData, placeResultData, id) {
            this.form.addr = addressData.locality;
        },
        getAddressInputData() {
            this.form.addr = event.target.value;
        },

        searchProperty() {
            this.$store.commit("preventFilter", this.form);
            const self = this;
            if (self.$route.name !== "search-property") {
                self.$router.push({
                    name: "search-property",
                    params: {
                        data: self.form,
                    },
                });
            } else {
                this.$emit("clicked", self.form);
            }
        },

        searchPropertyViaCategory() {
            const self = this;
            setTimeout(() => {
                self.searchProperty();
            }, 500);
        },
    },
};
</script>

<style scoped>
.tab-content {
    opacity: 1;
}
select:checked {
    color: #5c5c5c;
}

.tab-switch:checked + .tab-label {
    position: relative;
}
.tab-switch:checked + .tab-label::before {
    content: "";
    height: 6px;
    width: 6px;
    position: absolute;
    background: green;
    display: block;
    left: 5px;
    top: 5px;
    border-radius: 30px;
    animation: pulse 1s linear infinite;
}
@-webkit-keyframes pulse {
    0% {
        -webkit-box-shadow: 0 0 0 0 rgba(82, 245, 117, 0.8);
    }
    70% {
        -webkit-box-shadow: 0 0 0 10px rgba(204, 169, 44, 0);
    }
    100% {
        -webkit-box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
    }
}
@keyframes pulse {
    0% {
        -moz-box-shadow: 0 0 0 0 rgba(82, 245, 117, 0.8);
        box-shadow: 0 0 0 0 rgba(82, 245, 117, 0.8);
    }
    70% {
        -moz-box-shadow: 0 0 0 10px rgba(204, 169, 44, 0);
        box-shadow: 0 0 0 10px rgba(204, 169, 44, 0);
    }
    100% {
        -moz-box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
        box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
    }
}
</style>
