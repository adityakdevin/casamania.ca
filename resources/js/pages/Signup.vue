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
                                    <a href="#"
                                        ><img
                                            src="assets/images/icons/Mask Group.svg"
                                            width="14"
                                            class="img-fluid align-middle pb-1"
                                            alt=""
                                        />
                                        Home</a
                                    >
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#" class="active">Sign In</a>
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
                        <form @submit.prevent="registerUser()" method="post">
                            <div class="row">
                                <div class="col-6 pe-0">
                                    <fieldset class="mb-4">
                                        <input
                                            type="text"
                                            @keyup.prevent="errors.name = ''"
                                            class="form-control"
                                            v-model="userData.name"
                                            placeholder="First name*"
                                        />
                                        <small
                                            class="text-danger"
                                            v-if="errors.name"
                                            >{{ errors.name.toString() }}</small
                                        >
                                    </fieldset>
                                </div>
                                <div class="col-6 ps-0">
                                    <fieldset class="mb-4">
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="userData.last_name"
                                            placeholder="Last name"
                                        />
                                    </fieldset>
                                </div>
                            </div>

                            <fieldset class="mb-4">
                                <input
                                    type="text"
                                    @keyup.prevent="errors.contact = ''"
                                    class="form-control"
                                    v-model="userData.contact"
                                    placeholder="Contact Number*"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.contact"
                                    >{{ errors.contact.toString() }}</small
                                >
                            </fieldset>
                            <fieldset class="mb-4">
                                <input
                                    type="text"
                                    @keyup.prevent="errors.email = ''"
                                    class="form-control"
                                    v-model="userData.email"
                                    placeholder="Email Address*"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.email"
                                    >{{ errors.email.toString() }}</small
                                >
                            </fieldset>
                            <fieldset class="mb-4">
                                <input
                                    type="password"
                                    @keyup.prevent="errors.password = ''"
                                    class="form-control"
                                    v-model="userData.password"
                                    placeholder="Create Password*"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.password"
                                    >{{ errors.password.toString() }}</small
                                >
                            </fieldset>
                            <small
                                :class="success.color"
                                class="text-success"
                                v-if="success.message"
                                >{{ success.message }}</small
                            >
                            <button
                                type="submit"
                                class="btn btn-theme-color w-100 py-2"
                                :disabled="logginIn"
                            >
                                <i
                                    v-if="logginIn"
                                    class="fa fa-spinner fa-spin"
                                ></i>
                                Sign Up
                            </button>
                        </form>
                        <br />
                        <auth-start />
                        <hr class="fw-bold" />
                        <h6 class="text-center text-secondary mt-4 mb-3">
                            Already a member?
                            <router-link to="/login" class="text-color"
                                ><u>Login here</u></router-link
                            >
                        </h6>
                    </div>
                </div>
            </div>
        </section>

        <!-- Login -->
    </div>
</template>
<style scoped>
.divider {
    position: relative;
}
.divider:after {
    content: "";
    width: 100px;
    background: #9f9f9f;
    height: 2px;
    position: absolute;
    top: 8px;
    left: calc(50% + 15px);
}
.divider:before {
    content: "";
    width: 100px;
    background: #9f9f9f;
    height: 2px;
    position: absolute;
    top: 8px;
    right: calc(50% + 15px);
}
.social-icon {
    text-align: center;
    display: inline-block;
}
.social-icon img {
    border-radius: 6px;
    padding: 6px;
    height: 40px;
    display: inline-block;
    margin: 0px 15px;
}
</style>
<script>
import AuthStart from "../components/auth/Social.vue";
export default {
    components: {
        AuthStart,
    },
    data() {
        return {
            success: {
                message: "",
                color: "",
            },
            userData: {
                name: "",
                last_name: "",
                contact: "",
                email: "",
                password: "",
            },
            errors: {
                name: "",
                contact: "",
                email: "",
                password: "",
            },
            logginIn: false,
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
        async registerUser() {
            this.errors.name = "";
            this.errors.contact = "";
            this.errors.email = "";
            this.errors.password = "";
            this.logginIn = true;
            const user = this.userData;
            await axios
                .post("/api/user/register", user)
                .then((response) => {
                    this.logginIn = false;
                    this.success.message = response.data.message;
                    this.success.color = "text-success";
                    const token = response.data.data.token;
                    const user = response.data.data.user;
                    this.$store.commit("addAuthToken", token);
                    this.$store.commit("addAuthUser", user);
                    this.$router.push("/dashboard/my-account");
                })
                .catch((err) => {
                    this.logginIn = false;
                    const errorData = err.response.data;
                    this.errors.name = errorData.error.name;
                    this.errors.contact = errorData.error.contact;
                    this.errors.email = errorData.error.email;
                    this.errors.password = errorData.error.password;
                    if (errorData.success == false) {
                        this.success.message = errorData.message;
                        this.success.color = "text-danger";
                    }
                });
        },
    },
};
</script>
