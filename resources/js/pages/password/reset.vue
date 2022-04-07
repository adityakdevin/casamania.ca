<template>
    <div>
        <!-- Breakcrumbs -->
        <section class="breadcrumb-section bg-theme-light py-4">
            <div class="container p-0">
                <div class="row py-0">
                    <div class="col-12">
                        <h2 class="theme-title text-start">Account</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link to="/"
                                        ><img
                                            src="assets/images/icons/Mask Group.svg"
                                            width="14"
                                            class="img-fluid align-middle pb-1"
                                            alt=""
                                        />
                                        Home</router-link
                                    >
                                </li>
                                <li class="breadcrumb-item">
                                    <span class="active">Reset password</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breakcrumbs -->

        <!-- Login -->

        <section class="login bg-theme bg-theme-light pt-4">
            <div class="container p-0">
                <div class="row py-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 px-4">
                        <form @submit.prevent="resetPassword">
                            <fieldset class="mb-4">
                                <span> Reset your account password. </span>
                                <br />
                            </fieldset>
                            <fieldset class="mb-4">
                                <label>Create new password</label>
                                <input
                                    v-model="form.newPassword"
                                    type="password"
                                    class="form-control"
                                    placeholder="****************"
                                />
                                <span
                                    class="text-danger"
                                    v-if="eForm && eForm.newPassword"
                                    v-text="eForm.newPassword.toString()"
                                ></span>
                            </fieldset>
                            <fieldset class="mb-4">
                                <label>Confirm new password</label>
                                <input
                                    v-model="form.newPassword_confirmation"
                                    type="password"
                                    class="form-control"
                                    placeholder="****************"
                                />
                                <span
                                    class="text-danger"
                                    v-if="
                                        eForm && eForm.newPassword_confirmation
                                    "
                                    v-text="
                                        eForm.newPassword_confirmation.toString()
                                    "
                                ></span>
                            </fieldset>
                            <button
                                :disabled="sForm"
                                type="submit"
                                class="btn btn-theme-color w-100 py-2"
                            >
                                <span v-if="!sForm">Save new password</span>
                                <span v-else>Saving...</span>
                            </button>
                            <span :class="rFormClass" v-text="rForm"></span>
                        </form>

                        <h4 class="theme-title mt-5 text-uppercase">
                            Back to login?
                        </h4>
                        <p class="text-center">
                            Click on back to login button to go back to login
                            page.
                        </p>
                        <router-link to="/login" class="text-light">
                            <button
                                type="submit"
                                class="btn btn-theme-color w-100 py-2"
                            >
                                Go to login
                            </button>
                        </router-link>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-none">
                        <img
                            src="assets/images/icons/login.png"
                            alt=""
                            class="img-fluid"
                        />
                    </div>
                </div>
            </div>
        </section>
        <!-- Login -->
    </div>
</template>
<script>
// create-user
export default {
    data() {
        return {
            form: {
                email: "",
                key: "",
                newPassword: "",
                newPassword_confirmation: "",
            },
            eForm: null,
            sForm: false,
            rForm: "",
            rFormClass: "",
        };
    },
    mounted() {
        this.validateUrl();
    },
    methods: {
        async resetPassword() {
            const self = this;
            self.sForm = true;
            self.eForm = null;
            self.rForm = "Please wait...";
            self.rFormClass = "text-muted";

            await axios
                .post("/api/user/reset-password", self.form)
                .then((res) => {
                    self.sForm = false;
                    self.form = {};
                    self.rForm = res.data.message;
                    self.rFormClass = "text-success";

                    setTimeout(() => {
                        self.$router.push("/login");
                    }, 2000);
                })
                .catch((err) => {
                    self.sForm = false;
                    self.eForm = err.response.data.errors;
                    self.rForm = err.response.data.message;
                    self.rFormClass = "text-danger";
                });
        },

        validateUrl() {
            if (this.$route.query.email && this.$route.query.key) {
                this.form.email = this.$route.query.email;
                this.form.key = this.$route.query.key;
            } else {
                this.$router.push("/");
            }
        },
    },
};
</script>
