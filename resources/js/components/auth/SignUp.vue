<template>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form @submit.prevent="registerUser()" method="post">
                <div class="row">
                    <div class="col-6">
                        <fieldset class="mb-4">
                            <input
                                type="text"
                                @keyup.prevent="errors.name = ''"
                                class="form-control"
                                v-model="userData.name"
                                placeholder="First name*"
                            />
                            <small class="text-danger" v-if="errors.name">{{
                                errors.name.toString()
                            }}</small>
                        </fieldset>
                    </div>
                    <div class="col-6">
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
                    <small class="text-danger" v-if="errors.contact">{{
                        errors.contact.toString()
                    }}</small>
                </fieldset>
                <fieldset class="mb-4">
                    <input
                        type="text"
                        @keyup.prevent="errors.email = ''"
                        class="form-control"
                        v-model="userData.email"
                        placeholder="Email Address*"
                    />
                    <small class="text-danger" v-if="errors.email">{{
                        errors.email.toString()
                    }}</small>
                </fieldset>
                <fieldset class="mb-4">
                    <input
                        type="password"
                        @keyup.prevent="errors.password = ''"
                        class="form-control"
                        v-model="userData.password"
                        placeholder="Create Password*"
                    />
                    <small class="text-danger" v-if="errors.password">{{
                        errors.password.toString()
                    }}</small>
                </fieldset>
                <small
                    :class="success.color"
                    class="text-success"
                    v-if="success.message"
                    >{{ success.message }}</small
                >
                <button type="submit" class="btn btn-theme-color w-100 py-2">
                    Sign Up
                </button>
            </form>
            <h6 class="text-dark text-center my-4 divider">OR</h6>
            <h5 class="text-center text-secondary mt-4 mb-3">
                Already a member?
                <router-link to="/login" class="text-color"
                    >Login here</router-link
                >
            </h5>
        </div>
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
// create-user
export default {
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
                mlnum: "",
            },
            errors: {
                name: "",
                contact: "",
                email: "",
                password: "",
            },
        };
    },
    mounted() {},
    methods: {
        async registerUser() {
            this.errors.name = "";
            this.errors.contact = "";
            this.errors.email = "";
            this.errors.password = "";
            this.userData.mlnum = this.$route.params.ml_num;
            const user = this.userData;
            console.log(user);
            await axios
                .post("/api/user/register", user)
                .then((response) => {
                    this.success.message = response.data.message;
                    this.success.color = "text-success";
                    const token = response.data.data.token;
                    const user = response.data.data.user;
                    this.$store.commit("addAuthToken", token);
                    this.$store.commit("addAuthUser", user);
                })
                .catch((err) => {
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
