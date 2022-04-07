<template>
    <div>
        <section class="hero-container">
            <div class="container p-0 mb-5">
                <h1>Find your Dream home</h1>
                <h6>
                    Easy to buy, sell or rent your property through homeplore.
                </h6>
                <property-search :form="form"></property-search>
            </div>
        </section>

        <!-- Toronto -->
        <property-listing
            v-if="tr"
            :prop-location="'Toronto'"
        ></property-listing>
        <!-- mississauga -->
        <property-listing
            v-if="ms"
            :prop-location="'Mississauga'"
        ></property-listing>
        <!-- Brampton -->
        <property-listing
            v-if="br"
            :prop-location="'Brampton'"
        ></property-listing>

        <section v-if="0" class="tips bg-theme pe-0">
            <div class="container-fluid pe-0">
                <div class="row pe-0 me-0">
                    <div class="col-lg-5 col-md-5 col-sm-12 ps-0 pe-5 m-auto">
                        <h1 class="text-light fw-bold">
                            7 tips to got approved for a mortgage
                        </h1>
                        <p class="text-light small">
                            If you're looking to dive into homeownership, it's
                            important to be prepared at every step. Besides
                            tracking interest rates and hunting for the perfect
                            home, applying for a mortgage is the biggest step in
                            the process. While it might seem stressful, it can
                            be made much easier if you get your financial
                            affairs in order ahead of time. Here are 7 ways to
                            help get your mortgage application approved.
                        </p>
                        <p class="text-light small">
                            1. Check your credit score
                        </p>
                        <p class="text-light small">
                            In Canada, credit scores run from 300 to 900 across
                            five categories: Poor, Fair, Good, Very Good, and
                            Excellent. The exact categories vary based on which
                            credit bureau is being used, but the process is
                            essentially the same. Your credit score is a
                            snapshot of your overall financial health, so it's
                            important that you know what yours is.
                        </p>
                        <router-link
                            to="/blog"
                            class="
                                btn
                                bg-white
                                text-color
                                fw-bolder
                                btn-rounded
                            "
                        >
                            Learn more
                        </router-link>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-none in p-0">
                        <img
                            src="/assets/images/cards/pexels-andres-ayrton-6578879.jpg"
                            class="img-responsive img-fluid"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </section>

        <section v-if="0" class="market-report bg-theme-light">
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2 class="text-color fw-bold pb-2">
                            Market Report and states
                        </h2>
                        <img
                            src="/assets/images/cards/pexels-burst-373912 1.png"
                            class="img-fluid my-4"
                            width="450px"
                            alt=""
                        />
                        <h3 class="text-color fw-bold py-4">
                            June Market State
                        </h3>
                        <p class="text-color me-5 small">
                            June home sales were up compared to last year, but
                            remained below the March 2021 peak and were lower
                            than the number of transactions reported for May
                            2021, consistent with the regular seasonal trend.
                            The average selling price in June increased by
                            double digits compared to last year as well, but the
                            annual rate of increase moderated compared to the
                            previous three months.
                        </p>
                        <p class="text-color me-5 small">
                            Greater Toronto Area REALTORS@reported 11,106 sales
                            through TRREB'S MLS System in June 2021-up by 28.5
                            per cent compared to June 2020. Looking at the GTA
                            as a whole, year-over-year sales growth was
                            strongest in the condominium apartment segment, both
                            in the City of Toronto and some of the surrounding
                            suburbs. On a monthover-month basis, both actual and
                            seasonally adjusted sales continued to trend lower
                            in June.
                        </p>
                        <p class="text-color me-5 small">
                            "We have seen market activity transition from a
                            record pace to a robust pace over the last three
                            months. While this could provide some relief for
                            home buyers in the near term, a resumption of
                            population growth based on immigration is only
                            months away. While the primary focus of policymakers
                            has been artificially curbing demand, the only
                            longterm solution to affordability is increasing
                            supply to accommodate perpetual housing needs in a
                            growing region," said TRREB President Kevin Crigger.
                        </p>
                        <p class="text-color me-5 small">
                            in all major market segments, year-over-year growth
                            in sales well outpaced growth in new listings over
                            the same period, pointing to the continuation of
                            tight market conditions characterized by competition
                            between buyers and strong price growth. On a
                            month-over-month basis. both actual and seasonally
                            adjusted average prices edged lower in June.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 bstart">
                        <h3 class="text-color fw-bold">June Market State</h3>
                        <div class="row">
                            <div class="col-6 pe-0">
                                <div class="bg-theme text-light p-2 rounded-3">
                                    Graph
                                </div>
                            </div>
                            <div class="col-6 pe-0">
                                <div class="bg-theme text-light p-2 rounded-3">
                                    Graph
                                </div>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div
                                class="
                                    col-4
                                    pe-0
                                    ps-3
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                "
                            >
                                <ul class="list-unstyled me-auto">
                                    <li class="fw-bold">Detached</li>
                                    <li class="fw-bold">Semi-Detached</li>
                                    <li class="fw-bold">Townhouse</li>
                                    <li class="fw-bold">Condo Apt</li>
                                </ul>
                            </div>
                            <div class="col-8 p-0">
                                <div>
                                    <table
                                        class="table table-responsive rounded-2"
                                    >
                                        <tr>
                                            <th
                                                class="
                                                    border border-1
                                                    text-center
                                                    fw-lighter-items
                                                "
                                                colspan="3"
                                            >
                                                Sales
                                            </th>
                                            <th
                                                class="
                                                    border border-1
                                                    text-center
                                                    fw-lighter-items
                                                "
                                                colspan="3"
                                            >
                                                Average Price
                                            </th>
                                        </tr>
                                        <tr class="table-row-theme">
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                85
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                78
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                77
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                81
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                85
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                78
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                77
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                81
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                85
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                78
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                77
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                81
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                85
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                78
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                77
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                81
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div
                                class="
                                    col-4
                                    pe-0
                                    ps-3
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                "
                            >
                                <ul class="list-unstyled me-auto">
                                    <li class="fw-bold">Detached</li>
                                    <li class="fw-bold">Semi-Detached</li>
                                    <li class="fw-bold">Townhouse</li>
                                    <li class="fw-bold">Condo Apt</li>
                                </ul>
                            </div>
                            <div class="col-8 p-0">
                                <div>
                                    <table
                                        class="table table-responsive rounded-2"
                                    >
                                        <tr>
                                            <th
                                                class="
                                                    border border-1
                                                    text-center
                                                    fw-lighter-items
                                                "
                                                colspan="3"
                                            >
                                                Sales
                                            </th>
                                            <th
                                                class="
                                                    border border-1
                                                    text-center
                                                    fw-lighter-items
                                                "
                                                colspan="3"
                                            >
                                                Average Price
                                            </th>
                                        </tr>
                                        <tr class="table-row-theme">
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                85
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                78
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                77
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                81
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                85
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                78
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                77
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                81
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                85
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                78
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                77
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                81
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                85
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                78
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                82
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                77
                                            </td>
                                            <td
                                                class="
                                                    border border-1
                                                    text-center
                                                "
                                            >
                                                81
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <faq v-if="0"></faq>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {},
            tr: false,
            br: false,
            ms: false,
        };
    },
    mounted() {
        this.checkFilterData();
        setTimeout(() => {
            this.tr = true;
            this.getMs();
        }, 1000);
    },
    methods: {
        checkFilterData() {
            this.form = this.$store.state.filterForm;
        },
        getMs() {
            setTimeout(() => {
                this.ms = true;
                this.getBr();
            }, 1000);
        },
        getBr() {
            setTimeout(() => {
                this.br = true;
            }, 1000);
        },
    },
};
</script>
