<template>
    <div>
        <section class="footer">
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <router-link to="/" class="text-color fw-bold">
                            <img
                                src="/assets/images/logo/logo.svg"
                                alt="Casamania"
                                width="150"
                            />
                        </router-link>
                        <p class="pt-2">
                            Multiple Listing Service® and the associated logos
                            identify professional services rendered by REALTOR®
                            members of CREA to effect the purchase, sale and
                            lease of real estate as part of a cooperative
                            selling system.
                        </p>
                        <ul class="list-unstyled">
                            <li class="social-icons">
                                <a
                                    href="https://www.facebook.com/remaxmillenniumrealestate/"
                                    target="_blank"
                                    class="w-100 h-100"
                                >
                                    <img
                                        src="/assets/images/icons/facebook-logo.png"
                                        class="img-fluid m-auto"
                                        alt=""
                                    />
                                </a>
                            </li>
                            <li class="social-icons">
                                <a
                                    href="https://twitter.com/MillenniumRemax"
                                    target="_blank"
                                    class="w-100 h-100"
                                >
                                    <img
                                        src="/assets/images/icons/twitter.png"
                                        class="img-fluid m-auto"
                                        alt=""
                                    />
                                </a>
                            </li>
                            <li class="social-icons">
                                <a
                                    href="https://www.instagram.com/remaxmillennium/"
                                    target="_blank"
                                    class="w-100 h-100"
                                    style="color: white; font-size: 18px"
                                >
                                    <i
                                        class="fab fa-instagram"
                                        aria-hidden="true"
                                    ></i>
                                </a>
                            </li>
                            <li class="social-icons">
                                <a
                                    href="https://www.youtube.com/channel/UCDBISvKl8ipeM1dFFKOAH4w"
                                    target="_blank"
                                    class="w-100 h-100"
                                    style="color: white; font-size: 18px"
                                >
                                    <i
                                        class="fab fa-youtube"
                                        aria-hidden="true"
                                    ></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h6 class="text-secondary h6 fw-bold">Contact Us</h6>
                        <p class="small p-0 m-0">
                            © RE/MAX Millennium Real Estate Brokerage
                            Independently Owned & Operated
                        </p>
                        <p class="small p-0 m-0">
                            Address: <br />
                            81 Zenway Boulevard #25, Woodbridge, Ontario L4H 0S5
                        </p>
                        <p class="small p-0 m-0">Office: (905) 265-2200</p>
                        <p class="small p-0 m-0">Fax: (905) 265-2203​</p>

                        <h6 class="text-secondary h6 fw-bold mt-2">
                            OUR HOURS
                        </h6>

                        <p class="small p-0 m-0">
                            Monday to Friday 9:00AM – 8:00 PM
                        </p>
                        <p class="small p-0 m-0">
                            Saturday 10:00 AM – 5:00 PM​
                        </p>
                        <p class="small p-0 m-0">Sunday 10:00 AM – 4:00PM​</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <p class="text-secondary fw-bold">Newsletter</p>
                        <p>
                            Subscribe our newletter to got updates about our
                            services
                        </p>
                        <form @submit.prevent="subscribe">
                            <input
                                v-model="form.email"
                                type="text"
                                class="form-control mb-3"
                                placeholder="Enter your email address"
                            />
                            <button
                                :disabled="sSubscribeEmail"
                                type="submit"
                                class="btn btn-theme-color w-100"
                            >
                                <i
                                    v-if="sSubscribeEmail"
                                    class="fa fa-spinner fa-spin pl-2"
                                    aria-hidden="true"
                                ></i>
                                Subscribe
                            </button>
                            <span v-html="rSubscribeEmail"></span>
                        </form>
                        <br />
                        <div class="row">
                            <div class="col-12 text-center">
                                <h6
                                    class="
                                        text-secondary text-start
                                        h6
                                        fw-bold
                                        mt-2
                                    "
                                >
                                    Quick Links
                                </h6>
                                <span class="text-darker fw-lighter-items">
                                    <u>
                                        <router-link
                                            class="text-muted"
                                            to="/about-us"
                                            >About</router-link
                                        ></u
                                    >
                                </span>
                                |
                                <span class="text-darker fw-lighter-items">
                                    <u>
                                        <router-link
                                            class="text-muted"
                                            to="/contact-us"
                                            >Contact</router-link
                                        ></u
                                    >
                                </span>
                                |
                                <span class="text-darker fw-lighter-items">
                                    <u>
                                        <router-link
                                            class="text-muted"
                                            to="/terms-of-use"
                                            >Copyright/Terms of Use</router-link
                                        ></u
                                    >
                                </span>
                                |
                                <span class="text-darker fw-lighter-items">
                                    <u>
                                        <router-link
                                            class="text-muted"
                                            to="/privacy-policy"
                                            >Privacy Policy</router-link
                                        ></u
                                    >
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-0 footer">
            <div class="container">
                <hr class="m-0" />
            </div>
        </section>

        <!-- bottom footer -->
        <section class="sub-footer footer py-5">
            <div class="container p-0">
                <h6 class="text-center text-secondary fw-light">
                    Copyright © {{ new Date().getFullYear() }} RE/MAX
                    Millennium. All rights reserved RE/MAX Millennium.
                </h6>
            </div>
            <div class="b-t-t">
                <button
                    @onclick="backToTop"
                    id="backToTopBtn"
                    title="Go to top"
                >
                    Top
                </button>
            </div>
        </section>
        <!-- bottom footer -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: { email: "" },
            sSubscribeEmail: false,
            rSubscribeEmail: "",
        };
    },
    methods: {
        backToTop() {
            window.scrollTo(0, 0);
        },
        async subscribe() {
            const self = this;

            self.sSubscribeEmail = true;
            self.rSubscribeEmail =
                "<span class='text-muted'>Subscribing...</span>";

            await axios
                .post("/api/newsletter/subscribe", self.form)
                .then((res) => {
                    self.sSubscribeEmail = false;
                    self.rSubscribeEmail =
                        "<span class='text-success'>" +
                        res.data.message +
                        "</span>";
                    self.form.email = "";
                })
                .catch((err) => {
                    self.sSubscribeEmail = false;
                    self.rSubscribeEmail =
                        "<span class='text-danger'>" +
                        err.response.data.error.email.toString() +
                        "</span>";
                });
        },
    },
};
</script>

<style scoped>
#backToTopBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: #555; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 10px; /* Rounded corners */
    font-size: 18px; /* Increase font size */
}

#backToTopBtn:hover {
    background-color: #032646; /* Add a dark-grey background on hover */
}
</style>
