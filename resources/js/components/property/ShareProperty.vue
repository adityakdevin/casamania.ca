<template>
    <div>
        <div class="modal" :id="`shareModal${mid}`">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ property.Addr }}</h4>
                        <button
                            type="button"
                            class="close btn btn-outline-danger"
                            data-dismiss="modal"
                        >
                            &times;
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body p-0">
                        <div class="thumb-wrapper">
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
                                src="/assets/images/cards/e18b5e8d0dd16ff8b5f0a909ee27e764.jpeg"
                                class="card-img-top"
                                alt="Not Found"
                            />
                        </div>

                        <div class="content-wrapper p-4">
                            <span>
                                {{ property.Ad_text }}
                            </span>
                        </div>
                        <div
                            class="share-options d-flex justify-content-between"
                        >
                            <div class="fb flex-fill p-2">
                                <ShareNetwork
                                    network="facebook"
                                    class="
                                        btn btn-block btn-theme-color
                                        w-100
                                        py-3
                                        rounded-0
                                    "
                                    :url="`http://casamania.ca/property/view/${mid}`"
                                    :title="`casamania.ca - ${property.Addr}`"
                                    :description="`${property.Ad_text}`"
                                    hashtags="casamania.ca,remax"
                                >
                                    Share on Facebook
                                </ShareNetwork>
                            </div>
                            <div class="em flex-fill p-2">
                                <ShareNetwork
                                    network="Email"
                                    class="
                                        btn btn-block btn-theme-color
                                        w-100
                                        py-3
                                        rounded-0
                                    "
                                    :url="`http://casamania.ca/property/view/${mid}`"
                                    :title="`casamania.ca - ${property.Addr}`"
                                    :description="`${property.Ad_text}`"
                                >
                                    Share on Email
                                </ShareNetwork>
                            </div>
                            <div class="cp flex-fill p-2">
                                <button
                                    class="btn btn-block w-100 py-3 rounded-0"
                                    :class="
                                        copyText === 'Copied'
                                            ? 'btn-theme-color copied'
                                            : 'btn-theme-color'
                                    "
                                    @click="
                                        cptxt(
                                            `http://casamania.ca/property/view/${mid}`
                                        )
                                    "
                                >
                                    {{ copyText }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import swal from "sweetalert";
export default {
    data() {
        return {
            copyText: "Copy Link",
        };
    },
    props: {
        mid: {
            type: String,
            require: true,
        },
        property: {
            type: Object,
            default: () => ({}),
        },
    },
    methods: {
        cptxt(url) {
            const el = document.createElement("textarea");
            el.value = url;
            el.setAttribute("readonly", "");
            el.style.position = "absolute";
            el.style.left = "-9999px";
            document.body.appendChild(el);
            const selected =
                document.getSelection().rangeCount > 0
                    ? document.getSelection().getRangeAt(0)
                    : false;
            el.select();
            document.execCommand("copy");
            document.body.removeChild(el);
            if (selected) {
                document.getSelection().removeAllRanges();
                document.getSelection().addRange(selected);
                this.copyText = "Copied";
                swal({
                    icon: "success",
                    text: "Copied to clipboard",
                });
            } else {
                this.copyText = "Failed";
                swal({
                    icon: "error",
                    text: "Oops! Something went wrong. Try again.",
                });
            }
        },
    },
};
</script>

<style scoped>
.modal {
    backdrop-filter: blur(3px);
}
.thumb-wrapper {
    height: 30vh;
}
.thumb-wrapper img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}
.share-options {
    padding: 0.75rem;
    border-top: 1px solid #dee2e6;
    border-bottom-right-radius: calc(0.3rem - 1px);
    border-bottom-left-radius: calc(0.3rem - 1px);
}
</style>
