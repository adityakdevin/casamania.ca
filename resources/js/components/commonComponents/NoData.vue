<template>
    <div>
        <div class="text-center mt-5 mb-2">
            <img src="/assets/images/layouts/noDataFound.png" alt="" />
        </div>
        <div class="text-center">
            <span v-if="text" class="p-0 m-0 mt-2 text-center">
                <div v-if="text !== 'filterRes'">{{ text }}</div>
                <div class="text-center" v-else>
                    <h5 class="text-center">No Results</h5>
                    <p class="small">Please refine your search criteria.</p>
                    <div class="wrapper m-auto">
                        <div class="text-left">
                            <strong>Suggestions:</strong>
                            <ul class="suggestions m-0">
                                <li>Modify your search criteria</li>
                                <li>Update your search location</li>
                                <li>Broaden your map area</li>
                                <li>Modify your keywords</li>
                            </ul>
                            <hr />
                            Or <a href="">Clear your filter</a>
                        </div>
                    </div>
                </div>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        text: {
            type: String,
            default: "No data found.",
        },
    },
};
</script>

<style scoped>
img {
    max-width: 220px;
}

.text-left {
    text-align: left !important;
}
.wrapper {
    width: 250px;
}
.suggestions {
    padding-left: 20px;
}
</style>
