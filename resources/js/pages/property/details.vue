<template>
    <div>
        <div v-if="!loadingProperty">
            <div v-if="property">
                <!-- Breakcrumbs -->
                <section class="breadcrumb-section bg-theme-light py-5">
                    <div class="container p-0">
                        <div class="row py-0">
                            <div class="col-12">
                                <h2 class="theme-title text-start">
                                    Property Details
                                </h2>
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
                                            <router-link to="/"
                                                >Properties</router-link
                                            >
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span class="active"
                                                >Property details</span
                                            >
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Breakcrumbs -->

                <!-- slider -->
                <div>
                    <div v-if="property.images && property.images.length > 0">
                        <Carousel
                            :autoplay="true"
                            :centerMode="true"
                            :paginationEnabled="false"
                            :perPageCustom="[
                                [500, 1],
                                [768, 2],
                                [992, 3],
                                [1199, 4],
                            ]"
                        >
                            <Slide
                                v-for="img in property.images"
                                :key="img.property_ml_num + '_' + img.id"
                            >
                                <div
                                    v-if="img"
                                    class="
                                        carousel-outer
                                        border
                                        bg-light
                                        text-center
                                        craousel-image-outer
                                    "
                                >
                                    <img
                                        v-lazy="{
                                            src: img.image,
                                        }"
                                        alt="Not Found"
                                        class="crouse-image"
                                    />
                                </div>
                            </Slide>
                        </Carousel>
                    </div>
                    <div v-else>
                        <Carousel
                            :autoplay="true"
                            :centerMode="true"
                            :paginationEnabled="false"
                            :perPageCustom="[
                                [500, 1],
                                [768, 2],
                                [992, 3],
                                [1199, 4],
                            ]"
                        >
                            <Slide v-for="i in 10" :key="i + '_' + i">
                                <div
                                    v-if="i"
                                    class="
                                        carousel-outer
                                        border
                                        bg-light
                                        text-center
                                        craousel-image-outer
                                    "
                                >
                                    <img
                                        v-lazy="{
                                            src: '/assets/images/cards/missing_media.jpg',
                                        }"
                                        alt="Not Found"
                                        class="crouse-image"
                                    />
                                </div>
                            </Slide>
                        </Carousel>
                    </div>
                </div>
                <!-- slider -->

                <!-- Details -->
                <section class="bg-theme-light pt-0">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-6 mt-5">
                                <div class="row property">
                                    <div class="col-7">
                                        <h4 class="text-color fw-bold">
                                            {{ property.Addr }}
                                        </h4>
                                        <h6 class="text-color fw-light">
                                            {{ property.Rltr }}
                                        </h6>
                                    </div>
                                    <div class="col-5 pt-0 text-end">
                                        <h4 class="text-color fw-bold mb-1">
                                            ${{
                                                property.Lp_dol.toLocaleString(
                                                    "en-ca",
                                                    {
                                                        minimumFractionDigits: 0,
                                                    }
                                                )
                                            }}<span
                                                v-if="property.S_r === 'Lease'"
                                                >/mo</span
                                            >
                                        </h4>
                                        <div class="badge">
                                            <p class="text-color">
                                                For {{ property.S_r }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 py-1">
                                        <ul class="list-unstyled">
                                            <li
                                                v-if="property.Br"
                                                class="float-start"
                                            >
                                                <small class="pe-3"
                                                    ><img
                                                        src="/assets/images/icons/bed.png"
                                                        alt="Washroom"
                                                        width="24px"
                                                    />
                                                    <span
                                                        class="count card-title"
                                                        >{{ property.Br }}</span
                                                    >
                                                    <span
                                                        v-if="property.Br_plus"
                                                        class="count card-title"
                                                    >
                                                        +
                                                        {{
                                                            property.Br_plus
                                                        }}</span
                                                    >
                                                </small>
                                            </li>
                                            <li
                                                v-if="property.Bath_tot"
                                                class="float-start"
                                            >
                                                <small class="pe-3"
                                                    ><img
                                                        src="/assets/images/icons/bathTab.png"
                                                        alt="BathRoom"
                                                        width="24px"
                                                    />
                                                    <span
                                                        class="count card-title"
                                                    >
                                                        {{
                                                            parseInt(
                                                                property.Bath_tot
                                                            )
                                                        }}</span
                                                    >
                                                </small>
                                            </li>
                                            <li class="float-start">
                                                <small class="pe-3 card-title"
                                                    >MLS®
                                                    {{ property.Ml_num }}</small
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <span
                                                    class="
                                                        border
                                                        px-4
                                                        text-color
                                                        property-badge
                                                    "
                                                >
                                                    {{
                                                        property.property_type.replace(
                                                            "Property",
                                                            " Property"
                                                        )
                                                    }}
                                                </span>
                                            </div>
                                            <div
                                                v-if="property.Zoning"
                                                class="col-sm-12"
                                            >
                                                <p class="ps-1 mt-3 mb-0 pb-0">
                                                    <i
                                                        class="fas fa-map-signs"
                                                    ></i>
                                                    {{ property.Zoning }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pb-3 pt-2">
                                        <ul class="list-unstyled">
                                            <li class="float-start pt-2">
                                                <input
                                                    type="button"
                                                    name="css-tabs"
                                                    id="tab-1"
                                                    class="tab-switch"
                                                />
                                                <label
                                                    for="tab-1"
                                                    class="tab-label"
                                                    @click="
                                                        markFavourite(
                                                            property.Ml_num
                                                        )
                                                    "
                                                    :class="
                                                        $store.state.favourite.indexOf(
                                                            property.Ml_num
                                                        ) > -1
                                                            ? 'book-marked'
                                                            : ''
                                                    "
                                                >
                                                    <span
                                                        v-if="
                                                            $store.state.favourite.indexOf(
                                                                property.Ml_num
                                                            ) > -1
                                                        "
                                                        ><img
                                                            src="/assets/images/icons/bookmark-check.png"
                                                            alt=""
                                                            width="18px"
                                                            class="me-2"
                                                        />
                                                        Bookmarked
                                                    </span>
                                                    <span v-else>
                                                        <img
                                                            src="/assets/images/icons/bookmark.png"
                                                            alt=""
                                                            width="18px"
                                                            class="me-2"
                                                        />

                                                        Bookmark</span
                                                    >
                                                </label>
                                            </li>
                                            <li class="float-start pt-2">
                                                <input
                                                    type="button"
                                                    name="css-tabs"
                                                    id="tab-1"
                                                    class="tab-switch"
                                                />
                                                <label
                                                    for="tab-1"
                                                    class="tab-label"
                                                    data-toggle="modal"
                                                    :data-target="`#shareModal${property.Ml_num}`"
                                                    ><img
                                                        src="/assets/images/icons/shareLight.png"
                                                        alt=""
                                                        width="18px"
                                                        class="me-2"
                                                    />
                                                    Share</label
                                                >

                                                <ShareProp
                                                    :mid="property.Ml_num"
                                                    :property="property"
                                                />
                                            </li>
                                            <li class="float-start pt-2">
                                                <input
                                                    type="button"
                                                    name="css-tabs"
                                                    id="tab-1"
                                                    class="tab-switch"
                                                />
                                                <label
                                                    for="tab-1"
                                                    class="tab-label"
                                                    @click="scrollToBookShowing"
                                                    ><img
                                                        src="/assets/images/icons/book_showing.png"
                                                        alt=""
                                                        width="18px"
                                                        class="me-2"
                                                    />

                                                    Book Showing</label
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr />
                                <span>
                                    <span v-if="userLoggedIn">
                                        <span class="text-color me-5">{{
                                            property.Ad_text
                                        }}</span>
                                        <br />
                                        <span
                                            v-if="property.Extras"
                                            class="text-color me-5"
                                            ><br />
                                            <strong>Extras:</strong>
                                            <br />
                                            {{ property.Extras }}
                                        </span>
                                    </span>
                                    <span v-else class="dummy-blur-text">
                                        Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Nobis doloribus
                                        tempore quod impedit ipsam hic corrupti
                                        vero laboriosam. Voluptatem optio maxime
                                        voluptatum sed placeat possimus
                                        blanditiis, perspiciatis praesentium
                                        laborum libero?
                                        <br />
                                        Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Earum unde repudiandae
                                        ea, nobis odit placeat officia accusamus
                                        consequuntur officiis neque dicta a hic
                                        dolorum reiciendis aspernatur provident
                                        tenetur exercitationem doloribus.
                                    </span>
                                </span>
                            </div>
                            <div
                                class="
                                    col-md-6
                                    mt-5
                                    d-flex
                                    justify-content-center
                                    p-0
                                "
                            >
                                <div v-if="userLoggedIn" class="row details">
                                    <div class="col-12 d-flex p-0">
                                        <ul class="row list-unstyled w-100">
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Property Type
                                                </h6>
                                                <small>
                                                    {{
                                                        property.property_type.replace(
                                                            "Property",
                                                            " Property"
                                                        )
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Walk Score
                                                </h6>
                                                <small>
                                                    {{ property.Sqft || "N/A" }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Style
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Style || "N/A"
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Added
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Timestamp_sql ||
                                                        property.Idx_dt
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Size
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Tot_area ||
                                                        "N/A"
                                                    }}
                                                </small>
                                            </li>

                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Lot Size
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Lotsz_code ||
                                                        "N/A"
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Last Checked
                                                </h6>
                                                <small> Now (Today) </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Age
                                                </h6>
                                                <small>
                                                    {{
                                                        property.Yr_built ||
                                                        "N/A"
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    MLS
                                                </h6>
                                                <small>
                                                    #
                                                    {{
                                                        property.Ml_num || "NA"
                                                    }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Taxes
                                                </h6>
                                                <small>
                                                    {{ property.Yr || "N/A" }}
                                                </small>
                                            </li>
                                            <li class="col-6 py-2">
                                                <h6
                                                    class="
                                                        text-dark
                                                        fw-bold
                                                        mb-0
                                                    "
                                                >
                                                    Listed by
                                                </h6>
                                                <small>
                                                    Remax Real Estate
                                                </small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div v-else class="row">
                                    <div class="col-12 details">
                                        <h5 class="text-color">
                                            Create a free account to view the
                                            listing details
                                        </h5>
                                        <br />
                                        <sign-up />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Details -->

                <!-- Banner middle -->
                <div
                    v-if="property.images && userLoggedIn"
                    class="container-fluid pb-5 bg-theme"
                >
                    <div class="row">
                        <div class="col-md-6 ps-0 mt-5">
                            <img
                                v-if="property.images.length > 0"
                                :src="property.images[0].image"
                                alt="Not Found"
                                class="middle-banner-image"
                            />
                            <img
                                v-else
                                src="/assets/images/cards/missing_media.jpg"
                                alt="Not Found"
                                class="middle-banner-image"
                            />
                        </div>
                        <div
                            class="
                                col-md-6
                                mt-5
                                text-white
                                mid-content
                                ps-md-5
                                pe-sm-2
                            "
                        >
                            <h3 class="text-white pt-4">Home Value</h3>
                            <span class="text-muted">
                                Price estimate and comparrables near
                                {{ property.Addr }}
                                The approximate value of
                                <span v-if="property.Br">
                                    a {{ property.Br }} bedroom house in the
                                    area is
                                </span>
                            </span>
                            <h3 class="mt-2">${{ property.Lp_dol }}</h3>
                            <div>
                                <table class="table mt-5 table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="p-2 text-white">
                                                <img
                                                    src="/assets/images/icons/calender-ico.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-2 text-white">
                                                <h5>
                                                    Schedule a tour immediately.
                                                </h5>
                                                <span class="text-muted"
                                                    >Homes like this sell on
                                                    avarage in 6 days. There in
                                                    an 73% chance that this home
                                                    will be sold within one week
                                                    of listing</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-white">
                                                <img
                                                    src="/assets/images/icons/share-market.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-2 text-white">
                                                <h5>Expect to bid higher.</h5>
                                                <span class="text-muted"
                                                    >6 out of 10 homes like this
                                                    one have sold over
                                                    asking</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-white">
                                                <img
                                                    src="/assets/images/icons/dolor.png"
                                                    alt=""
                                                />
                                            </td>
                                            <td class="p-2 text-white">
                                                <h5>
                                                    you're unlikely to get a
                                                    deal.
                                                </h5>
                                                <span class="text-muted"
                                                    >Only 3 in 100 homes like
                                                    this sell bellow 93% of
                                                    asking</span
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="p-0">
                    <div class="container">
                        <hr class="m-0" />
                    </div>
                </section>

                <!-- Details in tabular format -->
                <property-details-tab
                    v-if="userLoggedIn"
                    :property="property"
                />

                <div v-if="userLoggedIn" class="container mb-2">
                    <h4 class="text-color fw-bold">Neighbourhood</h4>
                    <p class="text-color">
                        Schhol, amenities, travel times, and market trends near
                        {{ property.Addr }}
                    </p>
                </div>

                <div v-if="userLoggedIn" class="container-fluid p-0 mb-0">
                    <iframe
                        :src="
                            'https://maps.google.com/maps?q=' +
                            property.Addr.replace(' ', '+') +
                            '&output=embed'
                        "
                        style="border: 0; width: 100%; height: 400px"
                        allowfullscreen="true"
                        loading="lazy"
                    ></iframe>
                </div>

                <!-- Banner middle -->
                <div
                    v-if="property.images"
                    class="container-fluid pb-5 bg-theme"
                >
                    <div class="row" id="book-showing">
                        <div class="col-lg-6 mt-5 text-white">
                            <div class="row">
                                <div class="col-12 book-showing-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="text-white fw-bold">
                                                Book Showing
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 mt-2">
                                            <form @submit.prevent="saveLaed">
                                                <div class="row">
                                                    <div class="col-6 pe-0">
                                                        <fieldset class="my-3">
                                                            <input
                                                                v-model="
                                                                    lead.name
                                                                "
                                                                type="text"
                                                                aria-label="First name"
                                                                placeholder="First name"
                                                                class="
                                                                    form-control
                                                                "
                                                            />
                                                            <small
                                                                v-if="
                                                                    leadError.name
                                                                "
                                                                class="
                                                                    text-danger
                                                                "
                                                            >
                                                                {{
                                                                    leadError.name.toString()
                                                                }}</small
                                                            >
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-6 ps-0">
                                                        <fieldset class="my-3">
                                                            <input
                                                                v-model="
                                                                    lead.last_name
                                                                "
                                                                type="text"
                                                                aria-label="Last name"
                                                                placeholder="Last name"
                                                                class="
                                                                    form-control
                                                                "
                                                            />
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <fieldset class="my-3">
                                                    <input
                                                        v-model="lead.email"
                                                        type="text"
                                                        aria-label="Email"
                                                        placeholder="Email"
                                                        class="form-control"
                                                    />
                                                    <small
                                                        v-if="leadError.email"
                                                        class="text-danger"
                                                        >{{
                                                            leadError.email.toString()
                                                        }}</small
                                                    >
                                                </fieldset>
                                                <fieldset class="my-3">
                                                    <input
                                                        v-model="lead.contact"
                                                        type="text"
                                                        aria-label="Phone Number"
                                                        placeholder="Phone Number"
                                                        class="form-control"
                                                    />
                                                    <small
                                                        v-if="leadError.contact"
                                                        class="text-danger"
                                                        >{{
                                                            leadError.contact.toString()
                                                        }}</small
                                                    >
                                                </fieldset>
                                                <fieldset class="my-3">
                                                    <textarea
                                                        v-model="lead.remark"
                                                        rows="3"
                                                        col="3"
                                                        type="text"
                                                        aria-label="I would like more information abour the property"
                                                        placeholder="I would like more information abour the property"
                                                        class="form-control"
                                                    ></textarea>
                                                    <small
                                                        v-if="leadError.remark"
                                                        class="text-danger"
                                                        >{{
                                                            leadError.remark.toString()
                                                        }}</small
                                                    >
                                                </fieldset>
                                                <fieldset class="my-3">
                                                    <button
                                                        :disabled="sLead"
                                                        class="
                                                            btn btn-light
                                                            text-color
                                                        "
                                                        style="
                                                            border-radius: 14px
                                                                14px;
                                                        "
                                                    >
                                                        <i
                                                            v-if="sLead"
                                                            class="
                                                                fa
                                                                fa-spinner
                                                                fa-spin
                                                                pl-2
                                                            "
                                                            aria-hidden="true"
                                                        ></i>
                                                        Submit
                                                    </button>
                                                </fieldset>
                                                <small v-html="rLead"></small>
                                            </form>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pe-0 mt-5 right-image">
                            <img
                                v-if="property.images.length > 0"
                                :src="property.images[0].image"
                                alt="Not Found"
                                class="middle-banner-image"
                            />
                            <img
                                v-else
                                src="/assets/images/cards/missing_media.jpg"
                                alt="Not Found"
                                class="middle-banner-image"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <p class="p-5 text-center">Oops! no data found.</p>
            </div>
        </div>
        <div v-else>
            <section>
                <div class="text-center">
                    <loader :text="'Please wait... Loading details'" />
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
import ShareProp from "../../components/property/ShareProperty.vue";
import SignUp from "../../components/auth/SignUp.vue";
import propertyDetailsTab from "../../components/property/detailsTab.vue";
export default {
    components: {
        Carousel,
        Slide,
        ShareProp,
        SignUp,
        propertyDetailsTab,
    },
    data() {
        return {
            lead: {
                user_id: null,
                name: "",
                email: "",
                contact: "",
                remark: "",

                // 23 Jan 2021
                Ml_num: "",
                tags: "",
            },
            sLead: false,
            rLead: "",
            leadError: {},
            property: null,
            loadingProperty: true,

            recent: {},
        };
    },
    mounted() {
        this.getAllData();
        this.updateIfLoggedIN();
    },

    computed: {
        userLoggedIn() {
            if (this.$store.state.auth_user) {
                (this.lead.name = this.$store.state.auth_user.name),
                    (this.lead.last_name =
                        this.$store.state.auth_user.last_name),
                    (this.lead.email = this.$store.state.auth_user.email),
                    (this.lead.contact = this.$store.state.auth_user.contact);
            }
            this.addToRecent();
            return this.$store.state.auth_user;
        },

        recentVisited() {
            return this.$store.state.recent;
        },
    },

    watch: {
        $route(to, from) {
            this.getAllData();
        },
    },

    methods: {
        addToRecent() {
            const ml = this.$route.params.ml_num;
            this.$store.commit("addRecent", ml);
            this.saveRecent();
        },

        async saveRecent() {
            if (this.$store.state.auth_user) {
                this.recent.user_id = this.$store.state.auth_user.id;
                this.recent.ml_num = this.$route.params.ml_num;
                const token = this.$store.state.auth_token;
                const self = this;
                await axios.post("/api/user/save-recent", self.recent, {
                    headers: { Authorization: `Bearer ${token}` },
                });
            }
        },

        async saveLaed() {
            let url = `/api/lead/new-guest`;
            // Check a user is logged in or not.
            if (this.$store.state.auth_user) {
                url = `/api/user/save-lead`;
                this.lead.user_id = this.$store.state.auth_user.id;
            }
            this.lead.Ml_num = this.$route.params.ml_num;
            this.lead.tags = `${this.property.Municipality},${this.property.property_type}`;

            // Creating first name last name

            const self = this;

            self.sLead = true;
            self.rLead = "<span class='text-muted'>Sending...</span>";
            self.leadError = {};

            const token = this.$store.state.auth_token;

            await axios
                .post(url, self.lead, {
                    headers: { Authorization: `Bearer ${token}` },
                })
                .then((res) => {
                    self.lead = {};
                    self.sLead = false;
                    self.rLead =
                        "<span class='text-success'>" +
                        res.data.message +
                        "</span>";
                    self.leadError = {};
                })
                .catch((err) => {
                    console.log(err.response);
                    self.sLead = false;
                    self.rLead =
                        "<span class='text-danger'>" +
                        err.response.data.message +
                        "</span>";
                    self.leadError = err.response.data.error;
                });
        },

        updateIfLoggedIN() {
            this.lead.ml_num = this.$route.params.ml_num;
            if (this.$store.state.auth_user) {
                // (this.lead.name = this.$store.state.auth_user.name),
                (this.lead.email = this.$store.state.auth_user.email),
                    (this.lead.contact = this.$store.state.auth_user.contact);
            }
        },

        async getAllData() {
            const self = this;
            self.loadingProperty = true;
            await axios
                .get(
                    `/api/property/get-details?id=${self.$route.params.ml_num}`
                )
                .then((res) => {
                    self.property = res.data.data[0];

                    // Update remark field
                    self.lead.remark =
                        "I would like more information regarding." +
                        self.property.Addr +
                        " At " +
                        self.property.Rltr;
                    self.loadingProperty = false;
                })
                .catch((err) => {
                    self.loadingProperty = false;
                    console.log(err);
                });
        },

        async markFavourite(ml_num) {
            // check user is logged in
            const self = this;
            if (this.$store.state.auth_token) {
                const token = this.$store.state.auth_token;
                await axios
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
                            // swal({
                            //     icon: "success",
                            //     text: "Item bookmarked.",
                            //     buttons: false,
                            //     timer: 2000,
                            // });
                        } else {
                            self.$store.commit("removeFavourite", d.ml_num);
                            // swal({
                            //     icon: "error",
                            //     text: "Item removed from your bookmark.",
                            //     buttons: false,
                            //     timer: 2000,
                            // });
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

        scrollToBookShowing() {
            $("html, body").animate(
                {
                    scrollTop: $("#book-showing").offset().top,
                },
                200
            );
        },
    },
};
</script>

<style scoped>
.dummy-blur-text {
    filter: blur(4px);
}
.badge {
    background-color: #9ffdd4;
    padding: 4px 10px;
    width: auto;
    height: 1.8rem;
    line-height: 1.3rem;
    border-radius: 4px;
    display: inline-block;
    margin-left: auto;
}
.details {
    background-color: rgba(215, 219, 218, 1);
    background-color: rgba(215, 219, 218, 1);
    width: 100%;
    padding: 40px;
    border-radius: 0px 0px 0px 74px;
}
.craousel-image-outer {
    object-fit: cover;
}
.crouse-image {
    height: 350px;
    width: 100%;
}
.middle-banner-image {
    width: 100%;
    max-height: 500px;
    border-radius: 0px 200px 0px 0px;
    object-fit: cover;
}
.right-image img {
    width: 100%;
    max-height: 500px;
    border-radius: 200px 0px 0px 0px;
    -o-object-fit: cover;
    object-fit: cover;
}
.mid-content {
    max-width: 620px;
}
.book-marked {
    background: #0b810b;
}
.property-badge {
    background: rgba(200, 200, 200, 1);
    cursor: pointer;
    border-radius: 10px;
    font-size: 12px;
    padding: 4px;
}
.tab-label {
    padding: 0 1rem;
    font-weight: 400;
    margin-right: 5px;
}
</style>
