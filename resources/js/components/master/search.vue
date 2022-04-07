<template>
    <form @submit.prevent="" class="d-flex me-auto search-bar">
        <div class="input-group bg-white input-bar">
            <button @click="search" class="btn bg-transparent p-0">
                <img src="/assets/images/icons/search.png" alt="" />
            </button>
            <input
                v-model="key"
                @blur="masterSearchClose"
                type="text"
                class="form-control border-0 bg-transparent"
                aria-label="Search"
                aria-describedby="search-bar"
                @input="search"
            />
        </div>

        <!-- Search options founded -->
        <div v-if="masterSearchOpen" class="search-outer">
            <div v-if="searching">
                <loader class="pt-3" text="" />
            </div>
            <div v-else>
                <div v-if="listing && listing.length > 0" class="wrapper-outer">
                    <div class="list-heading">
                        <span> LISTINGS </span>
                    </div>
                    <div v-if="listing.length > 0" class="list-content">
                        <span
                            @click="gotolink(`/property/view/${obj.Ml_num}`)"
                            v-for="(obj, index) in listing"
                            :key="index + 'listing'"
                            target="_blank"
                            class="search-result d-flex"
                        >
                            <div class="icon">
                                <img
                                    src="/assets/images/icons/search.png"
                                    alt=""
                                />
                            </div>
                            <div class="content flex-grow-1">
                                <div class="title">
                                    {{ obj.Addr }}
                                </div>
                                <div class="address d-flex">
                                    {{ obj.Ml_num }}
                                    <span class="s_r">{{ obj.S_r }}</span>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div
                    v-if="location && location.length > 0"
                    class="wrapper-outer"
                >
                    <div class="list-heading">
                        <span> LOCATIONS </span>
                    </div>
                    <div v-if="location.length > 0" class="list-content">
                        <a
                            @click="gotolink(`/property/view/${obj.Ml_num}`)"
                            v-for="(obj, index) in location"
                            :key="index + 'location'"
                            target="_blank"
                            class="search-result d-flex"
                        >
                            <div class="icon">
                                <img
                                    src="/assets/images/icons/search.png"
                                    alt=""
                                />
                            </div>
                            <div class="content flex-grow-1">
                                <div class="title">
                                    {{ obj.Addr }}
                                </div>
                                <div class="address d-flex">
                                    ${{ obj.Lp_dol }}
                                    &nbsp;/&nbsp;
                                    <span>Active</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div v-if="pages && pages.length > 0" class="wrapper-outer">
                    <div class="list-heading">
                        <span> PAGES </span>
                    </div>
                    <div v-if="pages.length > 0" class="list-content">
                        <a
                            @click="gotolink(`${obj.url}`)"
                            v-for="(obj, index) in pages"
                            :key="index + 'pages'"
                            target="_blank"
                            class="search-result d-flex"
                        >
                            <div class="icon">
                                <img
                                    src="/assets/images/icons/search.png"
                                    alt=""
                                />
                            </div>
                            <div class="content flex-grow-1">
                                <div class="title">
                                    {{ obj.title.toUpperCase() }}
                                </div>
                                <div class="address d-flex">
                                    <span>PAGE</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import Loader from "../commonComponents/Loader.vue";
export default {
    components: { Loader },
    data() {
        return {
            key: "",
            masterSearchOpen: false,
            location: null,
            listing: null,
            pages: null,
            searching: false,
        };
    },
    methods: {
        masterSearchClose() {
            const self = this;
            setTimeout(() => {
                self.masterSearchOpen = false;
            }, 500);
        },
        gotolink(link) {
            this.key = "";
            this.masterSearchOpen = false;
            this.$router.push(link);
        },
        async search() {
            const self = this;

            if (self.key !== "") {
                //
                self.masterSearchOpen = true;
                self.searching = true;

                // Get result via server
                axios
                    .get(`/api/search?key=${self.key}`)
                    .then((res) => {
                        console.log(res);
                        self.searching = false;
                        self.masterSearchOpen = res.data.data.dataFound;
                        self.listing = res.data.data.listing;
                        self.location = res.data.data.location;
                        self.pages = res.data.data.pages;
                    })
                    .catch((err) => {
                        console.log("err in search:", err);
                        self.masterSearchOpen = false;
                        self.searching = false;
                    });

                //
            } else {
                self.masterSearchOpen = false;
                self.searching = false;
            }
        },
    },
};
</script>

<style lang="scss" scoped>
.search-bar {
    position: relative;

    .search-outer {
        position: absolute;
        background: #fff;
        box-shadow: 0 0 2px 0 #555;
        width: 100%;
        min-height: auto;
        max-height: 80vh;
        border-radius: 10px;
        padding-bottom: 10px;
        overflow-y: auto;
        overflow-x: hidden;
        top: 42px;
        left: 0;
        z-index: 22;

        .wrapper-outer {
            margin-top: 10px;

            .list-content {
                color: #999;
                display: block;
                max-width: 100%;

                .search-result {
                    color: rgba(0, 0, 0, 0.54) !important;
                    background: rgba(0, 0, 0, 0.03);
                    margin-bottom: 4px;
                    padding: 10px;
                    max-width: 100%;
                    cursor: pointer;

                    &:focus,
                    &:hover {
                        background: rgba(0, 0, 0, 0.09);
                        outline: none;
                        -webkit-outline: none;
                        border: none;
                    }

                    .icon {
                        display: flex;
                        align-items: center;
                        padding: 0 15px 0 2px;

                        img {
                            max-height: 35px;
                            max-width: 35px;
                            object-fit: cover;
                        }
                    }

                    .content {
                        display: inline-block;
                        max-width: calc(100% - 50px);

                        .title {
                            font-weight: 400;
                            display: block;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }

                        .address {
                            font-weight: 300;
                            font-size: 13px;
                            color: #232323;
                            display: block;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;

                            .s_r {
                                background: #032646;
                                font-size: 11px;
                                color: #fff;
                                padding: 1px 8px 0 8px;
                                border-radius: 20px;
                                margin-left: 5px;
                                opacity: 0.6;
                            }
                        }
                    }
                }
            }

            .list-heading {
                padding-bottom: 5px;

                span {
                    color: #999;
                    font-size: 12px;
                    font-weight: 600;
                    text-transform: uppercase;
                    padding: 0 20px;
                    letter-spacing: 1px;
                    user-select: none;
                }
            }
        }
    }
}
</style>
