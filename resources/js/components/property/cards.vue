<template>
    <div class="card">
        <ShareProp :mid="property.Ml_num" :property="property" />
        <div class="card-img position-relative">
            <router-link
                :to="{
                    name: 'view-details',
                    params: { ml_num: property.Ml_num },
                }"
            >
                <img
                    v-if="property.images.length > 0"
                    v-lazy="{
                        src: property.images[0].image,
                    }"
                    class="card-img-top"
                    alt="Property image not found"
                />
                <img
                    v-else
                    src="/assets/images/cards/missing_media.jpg"
                    class="card-img-top"
                    alt="Not Found"
                />
            </router-link>
            <div
                role="button"
                data-toggle="modal"
                :data-target="`#shareModal${property.Ml_num}`"
                class="star"
            >
                <img src="/assets/images/icons/share.png" alt="" />
            </div>
            <div class="badge">
                <p class="text-color">{{ property.S_r }}</p>
            </div>
        </div>

        <div class="card-body pb-0">
            <div class="card-header">
                <div class="d-flex">
                    <router-link
                        :to="{
                            name: 'view-details',
                            params: { ml_num: property.Ml_num },
                        }"
                        class="d-flex flex-grow-1 align-items-center"
                    >
                        <div>
                            <h6 class="mb-0 card-title">
                                ${{
                                    property.Lp_dol.toLocaleString("en-ca", {
                                        minimumFractionDigits: 0,
                                    })
                                }}<span v-if="property.S_r === 'Lease'"
                                    >/mo</span
                                >
                            </h6>
                        </div>
                    </router-link>
                    <div class="text-right pl-2">
                        <!-- Make fav -->
                        <small
                            @click="markFavourite(property.Ml_num)"
                            role="button"
                            class="font-weight-bold"
                        >
                            <span
                                v-if="
                                    $store.state.favourite.indexOf(
                                        property.Ml_num
                                    ) > -1
                                "
                            >
                                <img
                                    src="/assets/images/icons/bookmark_blue_saved.png"
                                    alt="Save"
                                    class="bookmark-image"
                                />
                            </span>
                            <span v-else>
                                <img
                                    src="/assets/images/icons/bookmark_blue.png"
                                    alt="Save"
                                    class="bookmark-image"
                                />
                            </span>
                        </small>
                    </div>
                </div>
            </div>
            <router-link
                :to="{
                    name: 'view-details',
                    params: { ml_num: property.Ml_num },
                }"
            >
                <div class="row pt-2">
                    <div class="col-8">
                        <p class="mb-0">
                            {{ property.Addr || "N/A" }}
                        </p>
                    </div>
                </div>
            </router-link>
        </div>
        <router-link
            :to="{
                name: 'view-details',
                params: { ml_num: property.Ml_num },
            }"
        >
            <div class="card-footer">
                <div class="row ps-3 pe-3 pb-2">
                    <div class="col-8 p-0">
                        <ul class="list-unstyled">
                            <li class="">
                                <small class="ps-3 card-title fw-normal"
                                    >MLS® {{ property.Ml_num }}</small
                                >
                                <p
                                    class="
                                        ps-3
                                        card-title
                                        fw-normal
                                        single-line
                                        mb-0
                                        pb-0
                                    "
                                >
                                    {{ property.Rltr }}
                                </p>
                                <small class="ps-3 card-title fw-normal">
                                    {{ addedTime(property.updated_at) }}
                                </small>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4 p-0">
                        <ul class="list-unstyled pt-4">
                            <li v-if="property.Bath_tot" class="float-end">
                                <small class="pe-3"
                                    ><img
                                        src="/assets/images/icons/bathTab.png"
                                        alt=""
                                        width="16px"
                                    />
                                    <span class="count card-title">
                                        {{
                                            property.Bath_tot
                                                ? parseInt(property.Bath_tot)
                                                : "0"
                                        }}</span
                                    >
                                </small>
                            </li>
                            <li v-if="property.Br" class="float-end">
                                <small class="pe-3"
                                    ><img
                                        src="/assets/images/icons/bed.png"
                                        alt=""
                                        width="16px"
                                    />
                                    <span class="count card-title">
                                        {{ property.Br }}</span
                                    >
                                    <span
                                        v-if="property.Br_plus"
                                        class="count card-title"
                                    >
                                        +
                                        {{ property.Br_plus }}</span
                                    >
                                </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
import swal from "sweetalert";
import ShareProp from "./ShareProperty.vue";
export default {
    props: {
        property: {
            type: Object,
            default: () => ({}),
        },
    },
    components: {
        ShareProp,
    },
    data() {
        return {};
    },
    methods: {
        markFavourite(ml_num) {
            // check user is logged in
            const self = this;
            if (this.$store.state.auth_token) {
                const token = this.$store.state.auth_token;
                axios
                    .post(
                        "/api/user/property/manage/favourite-property",
                        {
                            ml_num,
                        },
                        {
                            headers: { Authorization: `Bearer ${token}` },
                        }
                    )
                    .then((res) => {
                        const d = res.data.data;
                        if (d.action == "added") {
                            self.$store.commit("addFavourite", d.ml_num);
                        } else {
                            self.$store.commit("removeFavourite", d.ml_num);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            } else {
                swal({
                    text: "You are not logged in",
                    icon: "warning",
                    buttons: ["Close", "Go to login"],
                }).then((res) => {
                    if (res) {
                        self.$router.push("/login");
                    }
                });
            }
        },

        numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        addedTime(t) {
            // console.log(new Date());
            let addedAt = new Date(t).toLocaleString();
            addedAt = new Date(addedAt);
            // console.log("ADDED:", addedAt);
            const now = new Date();
            // console.log("now:", now);

            const diffTime = now - addedAt;

            const diffSecond = parseInt(diffTime / 1000);
            // console.log("diffSecond:", diffSecond);

            const diffMinute = parseInt(diffTime / (1000 * 60));
            // console.log("diffMinute:", diffMinute);

            const diffHour = parseInt(diffTime / (1000 * 60 * 60));
            // console.log("diffHour:", diffHour);

            const diffDay = parseInt(diffTime / (1000 * 60 * 60 * 24));
            // console.log("diffDay:", diffDay);

            const diffMonth = parseInt(diffTime / (1000 * 60 * 60 * 24 * 30));
            // console.log("diffMonth:", diffMonth);

            const diffYear = parseInt(
                diffTime / (1000 * 60 * 60 * 24 * 30 * 12)
            );
            // console.log("diffYear:", diffYear);

            if (diffYear > 0) {
                return diffYear + " Years ago";
            }
            if (diffMonth > 0) {
                return diffMonth + " Months ago";
            }
            if (diffDay > 0) {
                return diffDay + " Days ago";
            }
            if (diffHour > 0) {
                return diffHour + " Hours ago";
            }
            if (diffMinute > 0) {
                return diffMinute + " Minutes ago";
            }
            if (diffSecond > 0) {
                return diffSecond + " Seconds ago";
            }
            return parseInt(Math.random() * 39) + 1 + " Minutes ago";
        },
    },
};
</script>

<style scoped>
.bookmark-image {
    height: 20px !important;
}
.share-btn > a {
    border: 1px solid #ccc;
    padding: 5px;
    font-size: 12px;
    font-family: Verdana, Arial;
}
.share-btn > a:hover {
    cursor: pointer;
}

.single-line {
    display: block !important;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
