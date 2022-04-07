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
                                    <span class="active">Forget password</span>
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
                    <div class="col-lg-6 col-md-6 col-sm-none">
                        <img
                            src="assets/images/icons/login.png"
                            alt=""
                            class="img-fluid"
                        />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 px-5">
                        <form @submit.prevent="forgetPassword">
                            <fieldset class="mb-4">
                                <span>
                                    We will send a password reset link to your
                                    email address. Please check your inbox and
                                    follow the step.
                                    <br />
                                    If you did not get an email. It can take a
                                    few minutes, or you can check your spam
                                    folder and mark as not a spam.
                                </span>
                                <br />
                            </fieldset>
                            <fieldset class="mb-4">
                                <input
                                    v-model="form.email"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter your email"
                                />
                                <span
                                    class="text-danger"
                                    v-if="eForm && eForm.email"
                                    v-text="eForm.email.toString()"
                                ></span>
                            </fieldset>
                            <button
                                :disabled="sForm"
                                type="submit"
                                class="btn btn-theme-color w-100 py-2"
                            >
                                <span v-if="!sForm">Send Reset Link</span>
                                <span v-else>Sending...</span>
                            </button>
                            <span :class="rFormClass" v-text="rForm"></span>
                        </form>
                        <router-link
                            to="/login"
                            class="text-dark fw-light my-2 text-center fp"
                            >Back to Login</router-link
                        >
                        <h4 class="theme-title">DON'T HAVE AN ACCOUNT?</h4>
                        <p class="text-center">
                            Click to create an account and create a new account
                            to get full access of properties
                        </p>
                        <router-link to="/sign-up" class="text-light">
                            <button
                                type="submit"
                                class="btn btn-theme-color w-100 py-2"
                            >
                                Create Account
                            </button>
                        </router-link>
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
            },
            eForm: null,
            sForm: false,
            rForm: "",
            rFormClass: "",
        };
    },
    mounted() {
        this.authCheck();
    },
    methods: {
        authCheck() {
            if (this.$store.state.auth_token) {
                this.$router.push("/dashboard/my-account");
            }
        },
        async forgetPassword() {
            const self = this;
            self.sForm = true;
            self.eForm = null;
            self.rForm = "Please wait...";
            self.rFormClass = "text-muted";

            await axios
                .post("/api/user/send-reset-password-link", self.form)
                .then((res) => {
                    self.sForm = false;
                    self.form = { email: "" };
                    self.rForm = res.data.message;
                    self.rFormClass = "text-success";
                })
                .catch((err) => {
                    self.sForm = false;
                    self.eForm = err.response.data.errors;
                    self.rForm = "";
                    self.rFormClass = "text-danger";
                });
        },
    },
};
</script>
