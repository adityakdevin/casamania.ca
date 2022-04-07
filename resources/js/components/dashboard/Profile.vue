<template>
    <div>
        <div class="row w-100">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- <img
                    src="/../../assets/images/icons/login.png"
                    class="img-responsive img-fluid"
                    alt=""
                    style="transform: rotateY(180deg)"
                /> -->
                <div class="w-100 h-100 d-flex justify-content-center">
                    <div v-if="!updatingAvatar" class="text-center pb-3">
                        <div v-if="userDetails.avatar">
                            <img
                                v-lazy="{
                                    src: userDetails.avatar,
                                }"
                                :alt="userDetails.name"
                                class="img-fluid user-avatar"
                            />
                        </div>
                        <div v-else>
                            <img
                                src="/../../assets/images/avatar/useravtar.png"
                                alt="NOT UPDATED"
                                class="img-fluid user-avatar"
                            />
                        </div>
                        <div>
                            <label
                                for="user-avatar"
                                class="btn btn-theme-color mt-3 px-4"
                            >
                                <input
                                    type="file"
                                    id="user-avatar"
                                    class="file-avatar"
                                    @change="changeAvatar"
                                />
                                <span>Change Image</span>
                            </label>
                            <br />
                            <span
                                class="text-danger"
                                v-text="avatarError"
                            ></span>
                        </div>
                    </div>
                    <div v-else class="pt-5 pb-3">
                        <loader
                            text="Validating and updating profile image..."
                        />
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 px-4 notify-col">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <h5 class="text-color fw-bold">User Profile</h5>
                        <button
                            @click="isEdit = !isEdit"
                            class="
                                text-color text-decoration-underline
                                btn btn-default
                            "
                            data-toggle="tooltip"
                            data-html="true"
                            title="Click here to edit your profile"
                            style="cursor: pointer"
                        >
                            <span v-if="!isEdit">
                                Edit
                                <img
                                    class="img-fluid"
                                    src="/../../assets/images/icons/edit.png"
                                    alt=""
                                    style="width: 16px; padding-bottom: 6px"
                                />
                            </span>

                            <span v-else>
                                Close
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                    <form @submit.prevent="update()">
                        <fieldset class="my-3">
                            <div class="row">
                                <div class="col-sm-3 pe-0">
                                    <label class="text-color"
                                        >First Name:</label
                                    >
                                </div>
                                <div class="col-sm-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="Name"
                                        :class="isEdit != true ? 'active' : ''"
                                        placeholder="Name"
                                        v-model="userDetails.name"
                                        @keyup.prevent="errors.name = ''"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.name"
                                        >{{ errors.name.toString() }}</small
                                    >
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="my-3">
                            <div class="row">
                                <div class="col-sm-3 pe-0">
                                    <label class="text-color">Last Name:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="LastName"
                                        :class="isEdit != true ? 'active' : ''"
                                        placeholder="Last Name"
                                        v-model="userDetails.last_name"
                                    />
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="my-3">
                            <div class="row">
                                <div class="col-sm-3 pe-0">
                                    <label class="text-color">Contact:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="Contact"
                                        :class="isEdit != true ? 'active' : ''"
                                        placeholder="XXXXXX"
                                        v-model="userDetails.contact"
                                        @keyup.prevent="errors.contact = ''"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.contact"
                                        >{{ errors.contact.toString() }}</small
                                    >
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="my-3">
                            <div class="row">
                                <div class="col-sm-3 pe-0">
                                    <label class="text-color">Gmail:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="google_link"
                                        :class="isEdit != true ? 'active' : ''"
                                        placeholder="update google_link"
                                        v-model="userDetails.google_link"
                                        @keyup.prevent="errors.google_link = ''"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.google_link"
                                        >{{
                                            errors.google_link.toString()
                                        }}</small
                                    >
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="my-3">
                            <div class="row">
                                <div class="col-sm-3 pe-0">
                                    <label class="text-color"
                                        >Facebook Link:</label
                                    >
                                </div>
                                <div class="col-sm-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="facebook_link"
                                        :class="isEdit != true ? 'active' : ''"
                                        placeholder="update facebook_link"
                                        v-model="userDetails.facebook_link"
                                        @keyup.prevent="
                                            errors.facebook_link = ''
                                        "
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.facebook_link"
                                        >{{
                                            errors.facebook_link.toString()
                                        }}</small
                                    >
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="my-3">
                            <div class="row">
                                <div class="col-sm-3 pe-0">
                                    <label class="text-color"
                                        >Instagram Link:</label
                                    >
                                </div>
                                <div class="col-sm-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="instagram_link"
                                        :class="isEdit != true ? 'active' : ''"
                                        placeholder="update instagram_link"
                                        v-model="userDetails.instagram_link"
                                        @keyup.prevent="
                                            errors.instagram_link = ''
                                        "
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.instagram_link"
                                        >{{
                                            errors.instagram_link.toString()
                                        }}</small
                                    >
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="my-3">
                            <div class="row">
                                <div class="col-sm-3 pe-0">
                                    <label class="text-color">Address:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="address"
                                        :class="isEdit != true ? 'active' : ''"
                                        placeholder="update address"
                                        v-model="userDetails.address"
                                        @keyup.prevent="errors.address = ''"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.address"
                                        >{{ errors.address.toString() }}</small
                                    >
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="my-3 float-end" v-if="isEdit != false">
                            <button class="btn btn-theme-color">
                                <i
                                    v-if="updating"
                                    class="fa fa-spinner fa-spin pl-2"
                                    aria-hidden="true"
                                ></i>
                                Update
                            </button>
                        </fieldset>
                        <small
                            :class="success.color"
                            class="text-success"
                            v-if="success.message"
                            >{{ success.message }}</small
                        >
                    </form>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12">
                        <p
                            role="button"
                            @click="passwordUpdating = !passwordUpdating"
                        >
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            <span class="text-decoration-underline">
                                Update profile password
                            </span>
                        </p>
                    </div>

                    <div v-if="passwordUpdating" class="col-12 mt-2">
                        <div class="row form">
                            <form
                                @submit.prevent="updatePassword"
                                class="w-100"
                            >
                                <div class="col-12">
                                    <label>Old Password</label>
                                    <input
                                        v-model="form.old"
                                        type="password"
                                        class="form-control"
                                        placeholder="*********"
                                    />
                                    <span
                                        class="fw-light small text-danger"
                                        v-if="eForm && eForm.old"
                                        v-text="eForm.old.toString()"
                                    ></span>
                                </div>
                                <div class="col-12 mt-2">
                                    <label>New Password</label>
                                    <input
                                        v-model="form.newPassword"
                                        type="password"
                                        class="form-control"
                                        placeholder="*********"
                                    />
                                    <span
                                        class="fw-light small text-danger"
                                        v-if="eForm && eForm.newPassword"
                                        v-text="eForm.newPassword.toString()"
                                    ></span>
                                </div>
                                <div class="col-12 mt-2">
                                    <label>Confirm Password</label>
                                    <input
                                        v-model="form.newPassword_confirmation"
                                        type="password"
                                        class="form-control"
                                        placeholder="*********"
                                    />
                                    <span
                                        class="fw-light small text-danger"
                                        v-if="
                                            eForm &&
                                            eForm.newPassword_confirmation
                                        "
                                        v-text="
                                            eForm.newPassword_confirmation.toString()
                                        "
                                    ></span>
                                </div>
                                <div class="col-12 mt-3 text-end">
                                    <button
                                        :disabled="sForm"
                                        class="btn btn-theme-color"
                                    >
                                        <i
                                            v-if="sForm"
                                            class="fa fa-spinner fa-spin"
                                            aria-hidden="true"
                                        ></i>
                                        Update password
                                    </button>
                                </div>
                                <div class="col-12 mt-2 text-end">
                                    <span :class="rFormClass" v-text="rForm">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Loader from "../commonComponents/Loader.vue";
export default {
    components: { Loader },
    computed: {
        userDetails() {
            return this.$store.state.auth_user;
        },
    },
    data() {
        return {
            passwordUpdating: false,

            success: {
                message: "",
                color: "",
            },
            isEdit: false,
            updating: false,
            errors: {
                name: "",
                contact: "",
                google_link: "",
                facebook_link: "",
                instagram_link: "",
                address: "",
            },

            // Update password data
            form: {
                old: "",
                newPassword: "",
                newPassword_confirmation: "",
            },
            eForm: null,
            sForm: false,

            rForm: "",
            rFormClass: "",

            // Update Profile image
            updatingAvatar: false,
            avatarError: "",
        };
    },
    methods: {
        async changeAvatar(e) {
            let self = this;
            const file = e.target.files[0];

            const avatar = new FormData();
            avatar.append("avatar", file);

            self.updatingAvatar = true;

            self.avatarError = "";

            const authToken = this.$store.state.auth_token;

            await axios
                .post(`/api/user/update-user-avatar`, avatar, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        Authorization: `Bearer ${authToken}`,
                    },
                })
                .then((res) => {
                    self.updatingAvatar = false;
                    self.$store.commit(
                        "UpdateUserAvatar",
                        res.data.data.avatar
                    );
                })
                .catch((err) => {
                    self.avatarError = err.response.data.message;
                    console.log(err.response);
                    self.updatingAvatar = false;
                });
        },

        async updatePassword() {
            const self = this;
            self.sForm = true;
            self.eForm = {};
            self.rForm = "Please wait...";
            self.rFormClass = "text-muted";

            const token = this.$store.state.auth_token;

            await axios
                .post("/api/user/setting/update-password", self.form, {
                    headers: { Authorization: `Bearer ${token}` },
                })
                .then((res) => {
                    self.sForm = false;
                    self.form = {};
                    self.rForm = res.data.message;
                    self.rFormClass = "text-success";
                    self.logout();
                })
                .catch((err) => {
                    self.sForm = false;
                    self.eForm = err.response.data.errors;
                    self.rForm = err.response.data.message;
                    self.rFormClass = "text-danger";
                });
        },

        async logout() {
            const token = this.$store.state.auth_token;

            this.$store.commit("removeAuthToken");
            this.$store.commit("removeAuthUser");
            this.$store.commit("removeBookMark");
            this.$router.push("/login");
            await axios.post("/api/user/logout", {
                headers: { Authorization: `Bearer ${token}` },
            });
        },

        async update() {
            this.updating = true;
            const token = this.$store.state.auth_token;
            console.log(token);
            await axios
                .post("/api/user/update-profile", this.userDetails, {
                    headers: { Authorization: `Bearer ${token}` },
                })
                .then((response) => {
                    this.updating = false;
                    this.isEdit = false;
                    this.$store.commit("addAuthUser", response.data.data);
                    this.success.message = response.data.message;
                    this.success.color = "text-success";
                    setTimeout(() => {
                        this.success.color = "d-none";
                    }, 1000);
                })
                .catch((error) => {
                    this.updating = false;
                    const errorDisplay = error.response.data.errors;
                    this.errors.name = errorDisplay.name;
                    this.errors.contact = errorDisplay.contact;

                    this.errors.google_link = errorDisplay.google_link;
                    this.errors.facebook_link = errorDisplay.facebook_link;
                    this.errors.instagram_link = errorDisplay.instagram_link;
                    this.errors.address = errorDisplay.address;

                    this.success.message = response.data.message;

                    this.success.address = response.data.address;

                    this.success.color = "text-danger";
                    setTimeout(() => {
                        this.success.color = "d-none";
                    }, 1000);
                });
        },
    },
};
</script>
<style scoped>
.file-avatar {
    height: 0px;
    width: 0px;
    position: absolute;
    top: -200vh;
}
.user-avatar {
    height: auto;
    width: auto;
    max-width: 200px;
    max-height: 200px;
    border: 2px solid rgb(63, 62, 62);
    border-radius: 200px;
}
label {
    padding: 0.375rem 0;
}
input {
    padding: 0.375rem 0.75rem;
}
.active {
    border: 0;
    background-color: transparent;
    padding: 0.375rem 0;
    opacity: 1;
    pointer-events: none;
}
</style>
