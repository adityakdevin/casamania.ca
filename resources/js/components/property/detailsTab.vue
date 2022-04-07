<template>
    <div class="container pb-5">
        <div class="mt-5 c-tabs">
            <ul class="c-tab-outer">
                <li>
                    <span
                        @click="activeTab == 1 ? '' : (activeTab = 1)"
                        class="text-color"
                        :class="activeTab == 1 ? 'active' : ''"
                        >Property</span
                    >
                </li>
                <li>
                    <span
                        @click="activeTab == 2 ? '' : (activeTab = 2)"
                        class="text-color"
                        :class="activeTab == 2 ? 'active' : ''"
                        >Inside</span
                    >
                </li>
                <li>
                    <span
                        @click="activeTab == 3 ? '' : (activeTab = 3)"
                        class="text-color"
                        :class="activeTab == 3 ? 'active' : ''"
                        >Building</span
                    >
                </li>
                <li>
                    <span
                        @click="activeTab == 4 ? '' : (activeTab = 4)"
                        class="text-color"
                        :class="activeTab == 4 ? 'active' : ''"
                        >Parking</span
                    >
                </li>
                <li>
                    <span
                        @click="activeTab == 5 ? '' : (activeTab = 5)"
                        class="text-color"
                        :class="activeTab == 5 ? 'active' : ''"
                        >Fees</span
                    >
                </li>
                <li>
                    <span
                        @click="activeTab == 8 ? '' : (activeTab = 8)"
                        class="text-color"
                        :class="activeTab == 8 ? 'active' : ''"
                        >Land</span
                    >
                </li>
                <li v-if="property.Rms">
                    <span
                        @click="activeTab == 9 ? '' : (activeTab = 9)"
                        class="text-color"
                        :class="activeTab == 9 ? 'active' : ''"
                        >Rooms</span
                    >
                </li>
                <li>
                    <span
                        @click="activeTab == 10 ? '' : (activeTab = 10)"
                        class="text-color"
                        :class="activeTab == 10 ? 'active' : ''"
                        >Water Feature</span
                    >
                </li>
                <li>
                    <span
                        @click="activeTab == 11 ? '' : (activeTab = 11)"
                        class="text-color"
                        :class="activeTab == 11 ? 'active' : ''"
                        >Extras</span
                    >
                </li>
                <li>
                    <span
                        @click="activeTab == 12 ? '' : (activeTab = 12)"
                        class="text-color"
                        :class="activeTab == 12 ? 'active' : ''"
                        >Virtual Tour URL</span
                    >
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="c-content mt-4">
            <div class="row">
                <div class="col-md-9">
                    <div class="bg-white border p-4">
                        <div v-if="activeTab == 1" class="content">
                            <div class="c">
                                <span class="title">Status</span>
                                <span class="value">{{ property.S_r }}</span>
                            </div>
                            <div class="c">
                                <span class="title">Type</span>
                                <span class="value">{{
                                    property.Type_own1_out || "N/A"
                                }}</span>
                            </div>
                            <div class="c">
                                <span class="title">Size (sq ft)</span>
                                <span class="value">{{
                                    property.Sqft || "N/A"
                                }}</span>
                            </div>
                            <div class="c">
                                <span class="title">Age</span>
                                <span class="value">{{
                                    property.Yr_built || "N/A"
                                }}</span>
                            </div>
                            <div class="c">
                                <span class="title">Area</span>
                                <span class="value">{{
                                    property.Area || "N/A"
                                }}</span>
                            </div>
                            <div class="c">
                                <span class="title">Community</span>
                                <span class="value">
                                    {{ property.Community || "N/A" }}
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 2" class="content">
                            <div class="c">
                                <span class="title">Bedrooms</span>
                                <span class="value">{{
                                    property.Br || "0"
                                }}</span>
                            </div>
                            <div class="c">
                                <span class="title">Bathrooms</span>
                                <span class="value">
                                    {{ property.Bath_tot || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Kitchens</span>
                                <span class="value">
                                    {{ property.Num_kit || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Rooms</span>
                                <span class="value">
                                    {{ property.Rms || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Rooms plus</span>
                                <span class="value">
                                    {{ property.Rms_plus || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Den/Family Room</span>
                                <span class="value">
                                    {{ property.Den_fr || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Air Conditioning</span>
                                <span class="value">
                                    {{ property.A_c || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Fireplace</span>
                                <span class="value">
                                    {{ property.Fpl_num || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Furnished</span>
                                <span class="value">
                                    {{ property.Furnished || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Laundry</span>
                                <span class="value">
                                    {{ property.Laundry || "N/A" }}
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 3" class="content">
                            <div class="c">
                                <span class="title">Basement</span>
                                <span class="value">
                                    {{ property.Bsmt1_out || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Heating</span>
                                <span class="value">
                                    {{ property.Fuel || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Heating</span>
                                <span class="value">
                                    {{ property.Heating || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Water supply</span>
                                <span class="value">
                                    {{ property.Water || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Exterior</span>
                                <span class="value">
                                    {{ property.Constr1_out || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Private Entrance</span>
                                <span class="value">
                                    {{ property.Pvt_ent || "N/A" }}
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 4" class="content">
                            <div class="c">
                                <span class="title">Driveway</span>
                                <span class="value">
                                    {{ property.Drive || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Garage</span>
                                <span class="value">
                                    {{ property.Gar_type || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Parking Places</span>
                                <span class="value">
                                    {{ property.Park_spcs || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Parking Total</span>
                                <span class="value">
                                    {{ property.Tot_park_spcs || "N/A" }}
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 5" class="content">
                            <div class="c">
                                <span class="title">Cable Included</span>
                                <span class="value">
                                    {{ property.Cable || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Central A/C Included</span>
                                <span class="value">
                                    {{ property.Cac_inc || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title"
                                    >Common Elements Included</span
                                >
                                <span class="value">
                                    {{ property.Comel_inc || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Heating Included</span>
                                <span class="value">
                                    {{ property.Heat_inc || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Hydro Included</span>
                                <span class="value">
                                    {{ property.Hydro_inc || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Parking Included</span>
                                <span class="value">
                                    {{ property.Prkg_inc || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Water Included</span>
                                <span class="value">
                                    {{ property.Water_inc || "N/A" }}
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 8" class="content">
                            <div class="c">
                                <span class="title">Fronting On</span>
                                <span class="value">
                                    {{ property.Comp_pts || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Acres</span>
                                <span class="value">
                                    {{ property.Acres || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Pool</span>
                                <span class="value">
                                    {{ property.Pool || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Sewer</span>
                                <span class="value">
                                    {{ property.Sewer || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Cross Street</span>
                                <span class="value">
                                    {{ property.Cross_st || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Municipality District</span>
                                <span class="value">
                                    {{
                                        property.Municipality_district || "N/A"
                                    }}
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 9" class="content">
                            <div v-if="property.Rm1_dc1_out" class="c">
                                <span class="title">Room 1</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm1_dc1_out">
                                                <td class="p-2">
                                                    Room 1 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm1_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm1_dc2_out">
                                                <td class="p-2">
                                                    Room 1 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm1_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm1_dc3_out">
                                                <td class="p-2">
                                                    Room 1 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm1_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm1_len">
                                                <td class="p-2">
                                                    Room 1 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm1_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm1_out">
                                                <td class="p-2">Room 1</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm1_wth">
                                                <td class="p-2">
                                                    Room 1 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm1_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm2_dc1_out" class="c">
                                <span class="title">Room 2</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm2_dc1_out">
                                                <td class="p-2">
                                                    Room 2 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm2_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm2_dc2_out">
                                                <td class="p-2">
                                                    Room 2 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm2_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm2_dc3_out">
                                                <td class="p-2">
                                                    Room 2 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm2_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm2_len">
                                                <td class="p-2">
                                                    Room 2 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm2_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm2_out">
                                                <td class="p-2">Room 2</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm2_wth">
                                                <td class="p-2">
                                                    Room 2 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm2_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm3_dc1_out" class="c">
                                <span class="title">Room 3</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm3_dc1_out">
                                                <td class="p-2">
                                                    Room 3 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm3_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm3_dc2_out">
                                                <td class="p-2">
                                                    Room 3 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm3_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm3_dc3_out">
                                                <td class="p-2">
                                                    Room 3 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm3_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm3_len">
                                                <td class="p-2">
                                                    Room 3 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm3_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm3_out">
                                                <td class="p-2">Room 3</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm3_wth">
                                                <td class="p-2">
                                                    Room 3 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm3_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm4_dc1_out" class="c">
                                <span class="title">Room 4</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm4_dc1_out">
                                                <td class="p-2">
                                                    Room 4 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm4_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm4_dc2_out">
                                                <td class="p-2">
                                                    Room 4 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm4_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm4_dc3_out">
                                                <td class="p-2">
                                                    Room 4 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm4_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm4_len">
                                                <td class="p-2">
                                                    Room 4 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm4_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm4_out">
                                                <td class="p-2">Room 4</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm4_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm4_wth">
                                                <td class="p-2">
                                                    Room 4 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm4_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm5_dc1_out" class="c">
                                <span class="title">Room 5</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm5_dc1_out">
                                                <td class="p-2">
                                                    Room 5 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm5_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm5_dc2_out">
                                                <td class="p-2">
                                                    Room 5 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm5_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm5_dc3_out">
                                                <td class="p-2">
                                                    Room 5 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm5_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm5_len">
                                                <td class="p-2">
                                                    Room 5 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm5_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm5_out">
                                                <td class="p-2">Room 5</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm5_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm5_wth">
                                                <td class="p-2">
                                                    Room 5 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm5_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm6_dc1_out" class="c">
                                <span class="title">Room 6</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm6_dc1_out">
                                                <td class="p-2">
                                                    Room 6 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm6_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm6_dc2_out">
                                                <td class="p-2">
                                                    Room 6 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm6_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm6_dc3_out">
                                                <td class="p-2">
                                                    Room 6 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm6_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm6_len">
                                                <td class="p-2">
                                                    Room 6 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm6_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm6_out">
                                                <td class="p-2">Room 6</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm6_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm6_wth">
                                                <td class="p-2">
                                                    Room 6 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm6_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm7_dc1_out" class="c">
                                <span class="title">Room 7</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm7_dc1_out">
                                                <td class="p-2">
                                                    Room 7 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm7_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm7_dc2_out">
                                                <td class="p-2">
                                                    Room 7 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm7_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm7_dc3_out">
                                                <td class="p-2">
                                                    Room 7 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm7_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm7_len">
                                                <td class="p-2">
                                                    Room 7 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm7_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm7_out">
                                                <td class="p-2">Room 7</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm7_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm7_wth">
                                                <td class="p-2">
                                                    Room 7 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm7_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm8_dc1_out" class="c">
                                <span class="title">Room 8</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm8_dc1_out">
                                                <td class="p-2">
                                                    Room 8 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm8_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm8_dc2_out">
                                                <td class="p-2">
                                                    Room 8 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm8_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm8_dc3_out">
                                                <td class="p-2">
                                                    Room 8 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm8_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm8_len">
                                                <td class="p-2">
                                                    Room 8 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm8_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm8_out">
                                                <td class="p-2">Room 8</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm8_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm8_wth">
                                                <td class="p-2">
                                                    Room 8 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm8_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm9_dc1_out" class="c">
                                <span class="title">Room 9</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm9_dc1_out">
                                                <td class="p-2">
                                                    Room 9 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm9_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm9_dc2_out">
                                                <td class="p-2">
                                                    Room 9 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm9_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm9_dc3_out">
                                                <td class="p-2">
                                                    Room 9 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm9_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm9_len">
                                                <td class="p-2">
                                                    Room 9 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm9_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm9_out">
                                                <td class="p-2">Room 9</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm9_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm9_wth">
                                                <td class="p-2">
                                                    Room 9 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm9_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm10_dc1_out" class="c">
                                <span class="title">Room 10</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm10_dc1_out">
                                                <td class="p-2">
                                                    Room 10 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm10_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm10_dc2_out">
                                                <td class="p-2">
                                                    Room 10 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm10_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm10_dc3_out">
                                                <td class="p-2">
                                                    Room 10 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm10_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm10_len">
                                                <td class="p-2">
                                                    Room 10 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm10_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm10_out">
                                                <td class="p-2">Room 10</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm10_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm10_wth">
                                                <td class="p-2">
                                                    Room 10 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm10_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm11_dc1_out" class="c">
                                <span class="title">Room 11</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm11_dc1_out">
                                                <td class="p-2">
                                                    Room 11 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm11_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm11_dc2_out">
                                                <td class="p-2">
                                                    Room 11 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm11_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm11_dc3_out">
                                                <td class="p-2">
                                                    Room 11 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm11_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm11_len">
                                                <td class="p-2">
                                                    Room 11 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm11_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm11_out">
                                                <td class="p-2">Room 11</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm11_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm11_wth">
                                                <td class="p-2">
                                                    Room 11 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm11_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                            <div v-if="property.Rm12_dc1_out" class="c">
                                <span class="title">Room 12</span>
                                <span class="value">
                                    <table>
                                        <tbody>
                                            <tr v-if="property.Rm12_dc1_out">
                                                <td class="p-2">
                                                    Room 12 Desc 1
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm12_dc1_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm12_dc2_out">
                                                <td class="p-2">
                                                    Room 12 Desc 2
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm12_dc2_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm12_dc3_out">
                                                <td class="p-2">
                                                    Room 12 Desc 3
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm12_dc3_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm12_len">
                                                <td class="p-2">
                                                    Room 12 Length
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm12_len }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm12_out">
                                                <td class="p-2">Room 12</td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm12_out }}
                                                </td>
                                            </tr>
                                            <tr v-if="property.Rm12_wth">
                                                <td class="p-2">
                                                    Room 12 Width
                                                </td>
                                                <td>:</td>
                                                <td class="p-2">
                                                    {{ property.Rm12_wth }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 10" class="content">
                            <div class="c">
                                <span class="title">Water Features 1</span>
                                <span class="value">
                                    {{ property.Water_feat1 || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Water Features 2</span>
                                <span class="value">
                                    {{ property.Water_feat2 || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Water Features 3</span>
                                <span class="value">
                                    {{ property.Water_feat3 || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Water Features 4</span>
                                <span class="value">
                                    {{ property.Water_feat4 || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Water Features 5</span>
                                <span class="value">
                                    {{ property.Water_feat5 || "N/A" }}
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 11" class="content">
                            <div class="c">
                                <span class="title">Shoreline Allowance</span>
                                <span class="value">
                                    {{ property.Shore_allow || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Shoreline Exposure</span>
                                <span class="value">
                                    {{ property.Shoreline_exp || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Alternative Power</span>
                                <span class="value">
                                    {{ property.Alt_power1 || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Retirement</span>
                                <span class="value">
                                    {{ property.Retirement || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Elevator</span>
                                <span class="value">
                                    {{ property.Elevator || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title"
                                    >Display Address On internet</span
                                >
                                <span class="value">
                                    {{ property.Disp_addr || "N/A" }}
                                </span>
                            </div>
                            <div class="c">
                                <span class="title">Legal Description</span>
                                <span class="value">
                                    {{ property.Legal_desc || "N/A" }}
                                </span>
                            </div>
                        </div>
                        <div v-if="activeTab == 12" class="content">
                            <div class="c">
                                <span class="title">URL</span>
                                <span class="value">
                                    <span v-if="property.Tour_url">
                                        <a
                                            target="_blank"
                                            :href="property.Tour_url"
                                            >Click To View</a
                                        >
                                    </span>
                                    <span v-else> N/A </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details in tabular format -->
        <section class="container d-none">
            <div class="row">
                <div class="col-sm-4 col-lg-4 col-md-4 table-responsive">
                    <table class="table table-bordered border mb-2">
                        <tr>
                            <th colspan="2" class="p-2 text-center">
                                Property
                            </th>
                        </tr>

                        <tr v-if="property.Level1">
                            <th class="p-2">Level 1</th>
                            <td class="p-2">{{ property.Level1 }}</td>
                        </tr>
                        <tr v-if="property.Level10">
                            <th class="p-2">Level 10</th>
                            <td class="p-2">{{ property.Level10 }}</td>
                        </tr>
                        <tr v-if="property.Level11">
                            <th class="p-2">Level 11</th>
                            <td class="p-2">{{ property.Level11 }}</td>
                        </tr>
                        <tr v-if="property.Level12">
                            <th class="p-2">Level 12</th>
                            <td class="p-2">{{ property.Level12 }}</td>
                        </tr>
                        <tr v-if="property.Level2">
                            <th class="p-2">Level 2</th>
                            <td class="p-2">{{ property.Level2 }}</td>
                        </tr>
                        <tr v-if="property.Level3">
                            <th class="p-2">Level 3</th>
                            <td class="p-2">{{ property.Level3 }}</td>
                        </tr>
                        <tr v-if="property.Level4">
                            <th class="p-2">Level 4</th>
                            <td class="p-2">{{ property.Level4 }}</td>
                        </tr>
                        <tr v-if="property.Level5">
                            <th class="p-2">Level 5</th>
                            <td class="p-2">{{ property.Level5 }}</td>
                        </tr>
                        <tr v-if="property.Level6">
                            <th class="p-2">Level 6</th>
                            <td class="p-2">{{ property.Level6 }}</td>
                        </tr>
                        <tr v-if="property.Level7">
                            <th class="p-2">Level 7</th>
                            <td class="p-2">{{ property.Level7 }}</td>
                        </tr>
                        <tr v-if="property.Level8">
                            <th class="p-2">Level 8</th>
                            <td class="p-2">{{ property.Level8 }}</td>
                        </tr>
                        <tr v-if="property.Level9">
                            <th class="p-2">Level 9</th>
                            <td class="p-2">{{ property.Level9 }}</td>
                        </tr>
                        <tr v-if="property.Lotsz_code">
                            <th class="p-2">Lot Size Code</th>
                            <td class="p-2">
                                {{ property.Lotsz_code }}
                            </td>
                        </tr>
                        <tr v-if="property.Lse_terms">
                            <th class="p-2">Leased Terms</th>
                            <td class="p-2">
                                {{ property.Lse_terms }}
                            </td>
                        </tr>
                        <tr v-if="property.Mmap_col">
                            <th class="p-2">Map Column #</th>
                            <td class="p-2">{{ property.Mmap_col }}</td>
                        </tr>
                        <tr v-if="property.Mmap_page">
                            <th class="p-2">Map #</th>
                            <td class="p-2">
                                {{ property.Mmap_page }}
                            </td>
                        </tr>
                        <tr v-if="property.Mmap_row">
                            <th class="p-2">Map Row</th>
                            <td class="p-2">{{ property.Mmap_row }}</td>
                        </tr>
                        <tr v-if="property.Acreage">
                            <th class="p-2">Acres</th>
                            <td class="p-2">{{ property.Acreage }}</td>
                        </tr>
                        <tr v-if="property.Addl_mo_fee">
                            <th class="p-2">Add Monthly Fees</th>
                            <td class="p-2">
                                {{ property.Addl_mo_fee }}
                            </td>
                        </tr>
                        <tr v-if="property.All_inc">
                            <th class="p-2">All Inclusive</th>
                            <td class="p-2">{{ property.All_inc }}</td>
                        </tr>
                        <tr v-if="property.Apt_num">
                            <th class="p-2">Apt/Unit</th>
                            <td class="p-2">{{ property.Apt_num }}</td>
                        </tr>
                        <tr v-if="property.Ass_year">
                            <th class="p-2">Assessment Year</th>
                            <td class="p-2">{{ property.Ass_year }}</td>
                        </tr>
                        <tr v-if="property.Portion_property_lease1_out">
                            <th class="p-2">PortionPropertyLease1</th>
                            <td class="p-2">
                                {{ property.Portion_property_lease1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Portion_property_lease2_out">
                            <th class="p-2">PortionPropertyLease2</th>
                            <td class="p-2">
                                {{ property.Portion_property_lease2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Portion_property_lease3_out">
                            <th class="p-2">PortionPropertyLease3</th>
                            <td class="p-2">
                                {{ property.Portion_property_lease3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Portion_property_lease4_out">
                            <th class="p-2">PortionPropertyLease4</th>
                            <td class="p-2">
                                {{ property.Portion_property_lease4_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Portion_property_lease_srch">
                            <th class="p-2">PortionPropertyLeaseSrch</th>
                            <td class="p-2">
                                {{ property.Portion_property_lease_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Portion_lease_comments">
                            <th class="p-2">Portion Lease Comments</th>
                            <td class="p-2">
                                {{ property.Portion_lease_comments }}
                            </td>
                        </tr>
                        <tr v-if="property.Assignment">
                            <th class="p-2">Assignment</th>
                            <td class="p-2">
                                {{ property.Assignment }}
                            </td>
                        </tr>
                        <tr v-if="property.Fractional_ownership">
                            <th class="p-2">FractionalOwnership</th>
                            <td class="p-2">
                                {{ property.Fractional_ownership }}
                            </td>
                        </tr>
                        <tr v-if="property.Spec_des1_out">
                            <th class="p-2">Special Designation 1</th>
                            <td class="p-2">
                                {{ property.Spec_des1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Spec_des2_out">
                            <th class="p-2">Special Designation 2</th>
                            <td class="p-2">
                                {{ property.Spec_des2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Spec_des3_out">
                            <th class="p-2">Special Designation 3</th>
                            <td class="p-2">
                                {{ property.Spec_des3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Spec_des4_out">
                            <th class="p-2">Special Designation 4</th>
                            <td class="p-2">
                                {{ property.Spec_des4_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Spec_des5_out">
                            <th class="p-2">Special Designation 5</th>
                            <td class="p-2">
                                {{ property.Spec_des5_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Sqft">
                            <th class="p-2">Approx Square Footage</th>
                            <td class="p-2">{{ property.Sqft }}</td>
                        </tr>
                        <tr v-if="property.Style">
                            <th class="p-2">Style</th>
                            <td class="p-2">{{ property.Style }}</td>
                        </tr>
                        <tr v-if="property.Taxes">
                            <th class="p-2">Taxes</th>
                            <td class="p-2">{{ property.Taxes }}</td>
                        </tr>
                        <tr v-if="property.Community_code">
                            <th class="p-2">Community Code</th>
                            <td class="p-2">
                                {{ property.Community_code }}
                            </td>
                        </tr>
                        <tr v-if="property.Area_code">
                            <th class="p-2">Area Code</th>
                            <td class="p-2">
                                {{ property.Area_code }}
                            </td>
                        </tr>
                        <tr v-if="property.Tv">
                            <th class="p-2">Assessment</th>
                            <td class="p-2">{{ property.Tv }}</td>
                        </tr>
                        <tr v-if="property.Type_own_srch">
                            <th class="p-2">Type</th>
                            <td class="p-2">
                                {{ property.Type_own_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Uffi">
                            <th class="p-2">UFFI</th>
                            <td class="p-2">{{ property.Uffi }}</td>
                        </tr>
                        <tr v-if="property.Util_cable">
                            <th class="p-2">Utilities-Cable</th>
                            <td class="p-2">
                                {{ property.Util_cable }}
                            </td>
                        </tr>
                        <tr v-if="property.Util_tel">
                            <th class="p-2">Utilities-Telephone</th>
                            <td class="p-2">{{ property.Util_tel }}</td>
                        </tr>
                        <tr v-if="property.Vend_pis">
                            <th class="p-2">Seller Property Info Statement</th>
                            <td class="p-2">{{ property.Vend_pis }}</td>
                        </tr>
                        <tr v-if="property.Vtour_updt">
                            <th class="p-2">Virtual Tour Upload Date</th>
                            <td class="p-2">
                                {{ property.Vtour_updt }}
                            </td>
                        </tr>
                        <tr v-if="property.Waterfront">
                            <th class="p-2">Waterfront</th>
                            <td class="p-2">
                                {{ property.Waterfront }}
                            </td>
                        </tr>
                        <tr v-if="property.Wtr_suptyp">
                            <th class="p-2">Water Supply Types</th>
                            <td class="p-2">
                                {{ property.Wtr_suptyp }}
                            </td>
                        </tr>
                        <tr v-if="property.Yr">
                            <th class="p-2">Tax Year</th>
                            <td class="p-2">{{ property.Yr }}</td>
                        </tr>
                        <tr v-if="property.Yr_built">
                            <th class="p-2">Approx Age</th>
                            <td class="p-2">{{ property.Yr_built }}</td>
                        </tr>
                        <tr v-if="property.Zip">
                            <th class="p-2">Postal Code</th>
                            <td class="p-2">{{ property.Zip }}</td>
                        </tr>
                        <tr v-if="property.Zoning">
                            <th class="p-2">Zoning</th>
                            <td class="p-2">{{ property.Zoning }}</td>
                        </tr>
                        <tr v-if="property.Bsmt2_out">
                            <th class="p-2">Basement2</th>
                            <td class="p-2">
                                {{ property.Bsmt2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Central_vac">
                            <th class="p-2">Central Vac</th>
                            <td class="p-2">
                                {{ property.Central_vac }}
                            </td>
                        </tr>
                        <tr v-if="property.Constr2_out">
                            <th class="p-2">Exterior2</th>
                            <td class="p-2">
                                {{ property.Constr2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.County">
                            <th class="p-2">Province</th>
                            <td class="p-2">{{ property.County }}</td>
                        </tr>
                        <tr v-if="property.Spec_des6_out">
                            <th class="p-2">Special Designation 6</th>
                            <td class="p-2">
                                {{ property.Spec_des6_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_body">
                            <th class="p-2">Water Body Name</th>
                            <td class="p-2">
                                {{ property.Water_body }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_type">
                            <th class="p-2">Water Body Type</th>
                            <td class="p-2">
                                {{ property.Water_type }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_front">
                            <th class="p-2">Water Frontage</th>
                            <td class="p-2">
                                {{ property.Water_front }}
                            </td>
                        </tr>
                        <tr v-if="property.Access_prop1">
                            <th class="p-2">Access To Property1</th>
                            <td class="p-2">
                                {{ property.Access_prop1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Easement_rest1">
                            <th class="p-2">Easements Restrictions1</th>
                            <td class="p-2">
                                {{ property.Easement_rest1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Easement_rest2">
                            <th class="p-2">Easements Restrictions2</th>
                            <td class="p-2">
                                {{ property.Easement_rest2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Easement_rest3">
                            <th class="p-2">Easements Restrictions3</th>
                            <td class="p-2">
                                {{ property.Easement_rest3 }}
                            </td>
                        </tr>
                        <tr v-if="property.Easement_rest4">
                            <th class="p-2">Easements Restrictions4</th>
                            <td class="p-2">
                                {{ property.Easement_rest4 }}
                            </td>
                        </tr>
                        <tr v-if="property.Rural_svc1">
                            <th class="p-2">Rural Services1</th>
                            <td class="p-2">
                                {{ property.Rural_svc1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Rural_svc2">
                            <th class="p-2">Rural Services2</th>
                            <td class="p-2">
                                {{ property.Rural_svc2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Rural_svc3">
                            <th class="p-2">Rural Services3</th>
                            <td class="p-2">
                                {{ property.Rural_svc3 }}
                            </td>
                        </tr>
                        <tr v-if="property.Rural_svc4">
                            <th class="p-2">Rural Services4</th>
                            <td class="p-2">
                                {{ property.Rural_svc4 }}
                            </td>
                        </tr>
                        <tr v-if="property.Rural_svc5">
                            <th class="p-2">Rural Services5</th>
                            <td class="p-2">
                                {{ property.Rural_svc5 }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_acc_bldg1">
                            <th class="p-2">Waterfront Accessory Bldgs1</th>
                            <td class="p-2">
                                {{ property.Water_acc_bldg1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_acc_bldg2">
                            <th class="p-2">Waterfront Accessory Bldgs2</th>
                            <td class="p-2">
                                {{ property.Water_acc_bldg2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_del_feat1">
                            <th class="p-2">Water Delivery Features1</th>
                            <td class="p-2">
                                {{ property.Water_del_feat1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_del_feat2">
                            <th class="p-2">Water Delivery Features2</th>
                            <td class="p-2">
                                {{ property.Water_del_feat2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Sewage1">
                            <th class="p-2">Sewage1</th>
                            <td class="p-2">{{ property.Sewage1 }}</td>
                        </tr>
                        <tr v-if="property.Sewage2">
                            <th class="p-2">Sewage2</th>
                            <td class="p-2">{{ property.Sewage2 }}</td>
                        </tr>
                        <tr v-if="property.Depth">
                            <th class="p-2">Lot Depth</th>
                            <td class="p-2">{{ property.Depth }}</td>
                        </tr>
                        <tr v-if="property.Disp_addr">
                            <th class="p-2">Display Address On Internet</th>
                            <td class="p-2">
                                {{ property.Disp_addr }}
                            </td>
                        </tr>
                        <tr v-if="property.Elec">
                            <th class="p-2">Utilities-Hydro</th>
                            <td class="p-2">{{ property.Elec }}</td>
                        </tr>
                        <tr v-if="property.Elevator">
                            <th class="p-2">Elevator</th>
                            <td class="p-2">{{ property.Elevator }}</td>
                        </tr>
                        <tr v-if="property.Farm_agri">
                            <th class="p-2">Farm/Agriculture</th>
                            <td class="p-2">
                                {{ property.Farm_agri }}
                            </td>
                        </tr>
                        <tr v-if="property.Occ">
                            <th class="p-2">Possession Remarks</th>
                            <td class="p-2">{{ property.Occ }}</td>
                        </tr>
                        <tr v-if="property.Access_prop2">
                            <th class="p-2">Access To Property2</th>
                            <td class="p-2">
                                {{ property.Access_prop2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Oth_struc1_out">
                            <th class="p-2">Other Structures1</th>
                            <td class="p-2">
                                {{ property.Oth_struc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Oth_struc2_out">
                            <th class="p-2">Other Structures2</th>
                            <td class="p-2">
                                {{ property.Oth_struc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Outof_area">
                            <th class="p-2">Out of Area Municipality</th>
                            <td class="p-2">
                                {{ property.Outof_area }}
                            </td>
                        </tr>
                        <tr v-if="property.Parcel_id">
                            <th class="p-2">PIN#</th>
                            <td class="p-2">
                                {{ property.Parcel_id }}
                            </td>
                        </tr>
                        <tr v-if="property.Prop_feat1_out">
                            <th class="p-2">Property Features 1</th>
                            <td class="p-2">
                                {{ property.Prop_feat1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Prop_feat2_out">
                            <th class="p-2">Property Features 2</th>
                            <td class="p-2">
                                {{ property.Prop_feat2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Prop_feat3_out">
                            <th class="p-2">Property Features 3</th>
                            <td class="p-2">
                                {{ property.Prop_feat3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Prop_feat4_out">
                            <th class="p-2">Property Features 4</th>
                            <td class="p-2">
                                {{ property.Prop_feat4_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Prop_feat5_out">
                            <th class="p-2">Property Features 5</th>
                            <td class="p-2">
                                {{ property.Prop_feat5_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Prop_feat6_out">
                            <th class="p-2">Property Features 6</th>
                            <td class="p-2">
                                {{ property.Prop_feat6_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Municipality">
                            <th class="p-2">Municipality</th>
                            <td class="p-2">
                                {{ property.Municipality }}
                            </td>
                        </tr>
                        <tr v-if="property.Pix_updt">
                            <th class="p-2">Pix updated date</th>
                            <td class="p-2">{{ property.Pix_updt }}</td>
                        </tr>
                        <tr v-if="property.Timestamp_sql">
                            <th class="p-2">Updated timestamp</th>
                            <td class="p-2">
                                {{ property.Timestamp_sql }}
                            </td>
                        </tr>
                        <tr v-if="property.Municipality_code">
                            <th class="p-2">Municipality Code</th>
                            <td class="p-2">
                                {{ property.Municipality_code }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4 col-lg-4 col-md-4 table-responsive">
                    <table class="table table-bordered border">
                        <tr>
                            <th colspan="2" class="p-2 text-center">
                                Building
                            </th>
                        </tr>
                        <tr v-if="property.Insur_bldg">
                            <th class="p-2">Building Insurance Included</th>
                            <td class="p-2">
                                {{ property.Insur_bldg }}
                            </td>
                        </tr>
                        <tr v-if="property.Bldg_amen1_out">
                            <th class="p-2">Building Amenities 1</th>
                            <td class="p-2">
                                {{ property.Bldg_amen1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Bldg_amen2_out">
                            <th class="p-2">Building Amenities 2</th>
                            <td class="p-2">
                                {{ property.Bldg_amen2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Bldg_amen3_out">
                            <th class="p-2">Building Amenities 3</th>
                            <td class="p-2">
                                {{ property.Bldg_amen3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Bldg_amen4_out">
                            <th class="p-2">Building Amenities 4</th>
                            <td class="p-2">
                                {{ property.Bldg_amen4_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Bldg_amen5_out">
                            <th class="p-2">Building Amenities 5</th>
                            <td class="p-2">
                                {{ property.Bldg_amen5_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Bldg_amen6_out">
                            <th class="p-2">Building Amenities 6</th>
                            <td class="p-2">
                                {{ property.Bldg_amen6_out }}
                            </td>
                        </tr>
                    </table>

                    <table class="table table-bordered border">
                        <tr>
                            <th colspan="2" class="p-2 text-center">Rooms</th>
                        </tr>
                        <tr v-if="property.Rooms_plus">
                            <th class="p-2">Rooms +</th>
                            <td class="p-2">
                                {{ property.Rooms_plus }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm1_dc1_out">
                            <th class="p-2">Room 1 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm1_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm1_dc2_out">
                            <th class="p-2">Room 1 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm1_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm1_dc3_out">
                            <th class="p-2">Room 1 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm1_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm1_len">
                            <th class="p-2">Room 1 Length</th>
                            <td class="p-2">{{ property.Rm1_len }}</td>
                        </tr>
                        <tr v-if="property.Rm1_out">
                            <th class="p-2">Room 1</th>
                            <td class="p-2">{{ property.Rm1_out }}</td>
                        </tr>
                        <tr v-if="property.Rm1_wth">
                            <th class="p-2">Room 1 Width</th>
                            <td class="p-2">{{ property.Rm1_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm10_dc1_out">
                            <th class="p-2">Room 10 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm10_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm10_dc2_out">
                            <th class="p-2">Room 10 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm10_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm10_dc3_out">
                            <th class="p-2">Room 10 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm10_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm10_len">
                            <th class="p-2">Room 10 Length</th>
                            <td class="p-2">{{ property.Rm10_len }}</td>
                        </tr>
                        <tr v-if="property.Rm10_out">
                            <th class="p-2">Room 10</th>
                            <td class="p-2">{{ property.Rm10_out }}</td>
                        </tr>
                        <tr v-if="property.Rm10_wth">
                            <th class="p-2">Room 10 Width</th>
                            <td class="p-2">{{ property.Rm10_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm11_dc1_out">
                            <th class="p-2">Room 11 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm11_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm11_dc2_out">
                            <th class="p-2">Room 11 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm11_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm11_dc3_out">
                            <th class="p-2">Room 11 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm11_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm11_len">
                            <th class="p-2">Room 11 Length</th>
                            <td class="p-2">{{ property.Rm11_len }}</td>
                        </tr>
                        <tr v-if="property.Rm11_wth">
                            <th class="p-2">Room 11 Width</th>
                            <td class="p-2">{{ property.Rm11_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm12_dc1_out">
                            <th class="p-2">Room 12 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm12_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm12_dc2_out">
                            <th class="p-2">Room 12 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm12_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm12_dc3_out">
                            <th class="p-2">Room 12 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm12_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm12_len">
                            <th class="p-2">Room 12 Length</th>
                            <td class="p-2">{{ property.Rm12_len }}</td>
                        </tr>
                        <tr v-if="property.Rm12_out">
                            <th class="p-2">Room 12</th>
                            <td class="p-2">{{ property.Rm12_out }}</td>
                        </tr>
                        <tr v-if="property.Rm12_wth">
                            <th class="p-2">Room 12 Width</th>
                            <td class="p-2">{{ property.Rm12_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm2_dc1_out">
                            <th class="p-2">Room 2 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm2_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm2_dc2_out">
                            <th class="p-2">Room 2 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm2_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm2_dc3_out">
                            <th class="p-2">Room 2 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm2_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm2_len">
                            <th class="p-2">Room 2 Length</th>
                            <td class="p-2">{{ property.Rm2_len }}</td>
                        </tr>
                        <tr v-if="property.Rm2_out">
                            <th class="p-2">Room 2</th>
                            <td class="p-2">{{ property.Rm2_out }}</td>
                        </tr>
                        <tr v-if="property.Rm2_wth">
                            <th class="p-2">Room 2 Width</th>
                            <td class="p-2">{{ property.Rm2_wth }}</td>
                        </tr>
                        <tr v-if="property.Room">
                            <th class="p-2">Rm3_dc1_out</th>
                            <td class="p-2">{{ property.Room }} 3 Desc 1</td>
                        </tr>
                        <tr v-if="property.Rm3_dc2_out">
                            <th class="p-2">Room 3 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm3_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm3_dc3_out">
                            <th class="p-2">Room 3 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm3_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm3_len">
                            <th class="p-2">Room 3 Length</th>
                            <td class="p-2">{{ property.Rm3_len }}</td>
                        </tr>
                        <tr v-if="property.Rm3_out">
                            <th class="p-2">Room 3</th>
                            <td class="p-2">{{ property.Rm3_out }}</td>
                        </tr>
                        <tr v-if="property.Rm3_wth">
                            <th class="p-2">Room 3 Width</th>
                            <td class="p-2">{{ property.Rm3_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm4_dc1_out">
                            <th class="p-2">Room 4 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm4_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm4_dc3_out">
                            <th class="p-2">Room 4 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm4_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm4_dc2_out">
                            <th class="p-2">Room 4 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm4_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm4_len">
                            <th class="p-2">Room 4 Length</th>
                            <td class="p-2">{{ property.Rm4_len }}</td>
                        </tr>
                        <tr v-if="property.Rm4_out">
                            <th class="p-2">Room 4</th>
                            <td class="p-2">{{ property.Rm4_out }}</td>
                        </tr>
                        <tr v-if="property.Rm4_wth">
                            <th class="p-2">Room 4 Width</th>
                            <td class="p-2">{{ property.Rm4_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm5_dc1_out">
                            <th class="p-2">Room 5 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm5_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm5_dc2_out">
                            <th class="p-2">Room 5 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm5_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm5_dc3_out">
                            <th class="p-2">Room 5 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm5_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm5_len">
                            <th class="p-2">Room 5 Length</th>
                            <td class="p-2">{{ property.Rm5_len }}</td>
                        </tr>
                        <tr v-if="property.Rm5_out">
                            <th class="p-2">Room 5</th>
                            <td class="p-2">{{ property.Rm5_out }}</td>
                        </tr>
                        <tr v-if="property.Rm5_wth">
                            <th class="p-2">Room 5 Width</th>
                            <td class="p-2">{{ property.Rm5_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm6_dc1_out">
                            <th class="p-2">Room 6 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm6_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm6_dc2_out">
                            <th class="p-2">Room 6 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm6_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm6_dc3_out">
                            <th class="p-2">Room 6 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm6_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm6_len">
                            <th class="p-2">Room 6 Length</th>
                            <td class="p-2">{{ property.Rm6_len }}</td>
                        </tr>
                        <tr v-if="property.Rm6_out">
                            <th class="p-2">Room 6</th>
                            <td class="p-2">{{ property.Rm6_out }}</td>
                        </tr>
                        <tr v-if="property.Rm6_wth">
                            <th class="p-2">Room 6 Width</th>
                            <td class="p-2">{{ property.Rm6_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm7_dc1_out">
                            <th class="p-2">Room 7 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm7_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm7_dc2_out">
                            <th class="p-2">Room 7 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm7_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm7_len">
                            <th class="p-2">Room 7 Length</th>
                            <td class="p-2">{{ property.Rm7_len }}</td>
                        </tr>
                        <tr v-if="property.Rm7_out">
                            <th class="p-2">Room 7</th>
                            <td class="p-2">{{ property.Rm7_out }}</td>
                        </tr>
                        <tr v-if="property.Rm7_wth">
                            <th class="p-2">Room 7 Width</th>
                            <td class="p-2">{{ property.Rm7_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm8_dc1_out">
                            <th class="p-2">Room 8 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm8_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm8_dc2_out">
                            <th class="p-2">Room 8 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm8_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm8_dc3_out">
                            <th class="p-2">Room 8 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm8_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm8_len">
                            <th class="p-2">Room 8 Length</th>
                            <td class="p-2">{{ property.Rm8_len }}</td>
                        </tr>
                        <tr v-if="property.Rm8_out">
                            <th class="p-2">Room 8</th>
                            <td class="p-2">{{ property.Rm8_out }}</td>
                        </tr>
                        <tr v-if="property.Rm8_wth">
                            <th class="p-2">Room 8 Width</th>
                            <td class="p-2">{{ property.Rm8_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm9_dc1_out">
                            <th class="p-2">Room 9 Desc 1</th>
                            <td class="p-2">
                                {{ property.Rm9_dc1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm9_dc2_out">
                            <th class="p-2">Room 9 Desc 2</th>
                            <td class="p-2">
                                {{ property.Rm9_dc2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm9_dc3_out">
                            <th class="p-2">Room 9 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm9_dc3_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Rm9_len">
                            <th class="p-2">Room 9 Length</th>
                            <td class="p-2">{{ property.Rm9_len }}</td>
                        </tr>
                        <tr v-if="property.Rm9_out">
                            <th class="p-2">Room 9</th>
                            <td class="p-2">{{ property.Rm9_out }}</td>
                        </tr>
                        <tr v-if="property.Rm9_wth">
                            <th class="p-2">Room 9 Width</th>
                            <td class="p-2">{{ property.Rm9_wth }}</td>
                        </tr>
                        <tr v-if="property.Rm11_out">
                            <th class="p-2">Room 11</th>
                            <td class="p-2">{{ property.Rm11_out }}</td>
                        </tr>
                        <tr v-if="property.Rm7_dc3_out">
                            <th class="p-2">Room 7 Desc 3</th>
                            <td class="p-2">
                                {{ property.Rm7_dc3_out }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4 col-lg-4 col-md-4 table-responsive">
                    <table class="table table-bordered border">
                        <tr>
                            <th colspan="2" class="p-2 text-center">
                                Washrooms
                            </th>
                        </tr>
                        <tr v-if="property.Bath_tot">
                            <th class="p-2">Washrooms</th>
                            <td class="p-2">{{ property.Bath_tot }}</td>
                        </tr>
                        <tr v-if="property.Wcloset_p1">
                            <th class="p-2">Washrooms Type 1 # Pcs</th>
                            <td class="p-2">
                                {{ property.Wcloset_p1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_p2">
                            <th class="p-2">Washrooms Type 2 # Pcs</th>
                            <td class="p-2">
                                {{ property.Wcloset_p2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_p3">
                            <th class="p-2">Washrooms Type 3 # Pcs</th>
                            <td class="p-2">
                                {{ property.Wcloset_p3 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_p4">
                            <th class="p-2">Washrooms Type 4 # Pcs</th>
                            <td class="p-2">
                                {{ property.Wcloset_p4 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_p5">
                            <th class="p-2">Washrooms Type 5 # Pcs</th>
                            <td class="p-2">
                                {{ property.Wcloset_p5 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t1lvl">
                            <th class="p-2">Washrooms Type 1 Level</th>
                            <td class="p-2">
                                {{ property.Wcloset_t1lvl }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t2">
                            <th class="p-2">Washrooms Type 2</th>
                            <td class="p-2">
                                {{ property.Wcloset_t2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t2lvl">
                            <th class="p-2">Washrooms Type 2 Level</th>
                            <td class="p-2">
                                {{ property.Wcloset_t2lvl }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t3">
                            <th class="p-2">Washrooms Type 3</th>
                            <td class="p-2">
                                {{ property.Wcloset_t3 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t3lvl">
                            <th class="p-2">Washrooms Type 3 Level</th>
                            <td class="p-2">
                                {{ property.Wcloset_t3lvl }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t4">
                            <th class="p-2">Washrooms Type 4</th>
                            <td class="p-2">
                                {{ property.Wcloset_t4 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t4lvl">
                            <th class="p-2">Washrooms Type 4 Level</th>
                            <td class="p-2">
                                {{ property.Wcloset_t4lvl }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t5">
                            <th class="p-2">Washrooms Type 5</th>
                            <td class="p-2">
                                {{ property.Wcloset_t5 }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t5lvl">
                            <th class="p-2">Washrooms Type 5 Level</th>
                            <td class="p-2">
                                {{ property.Wcloset_t5lvl }}
                            </td>
                        </tr>
                        <tr v-if="property.Wcloset_t1">
                            <th class="p-2">Washrooms Type 1</th>
                            <td class="p-2">
                                {{ property.Wcloset_t1 }}
                            </td>
                        </tr>
                    </table>
                    <table
                        class="table table-bordered border"
                        v-if="property.Potl"
                    >
                        <tr>
                            <th colspan="2" class="p-2 text-center">Land</th>
                        </tr>
                        <tr v-if="property.Potl">
                            <th class="p-2">Parcel of Tied Land</th>
                            <td class="p-2">{{ property.Potl }}</td>
                        </tr>
                    </table>

                    <table class="table table-bordered border">
                        <tr>
                            <th colspan="2" class="p-2 text-center">Condo</th>
                        </tr>
                        <tr v-if="property.Cond_txinc">
                            <th class="p-2">Condo Taxes Included</th>
                            <td class="p-2">
                                {{ property.Cond_txinc }}
                            </td>
                        </tr>
                        <tr v-if="property.Condo_corp">
                            <th class="p-2">Condo Registry Office</th>
                            <td class="p-2">
                                {{ property.Condo_corp }}
                            </td>
                        </tr>
                        <tr v-if="property.Condo_exp">
                            <th class="p-2">Exposure</th>
                            <td class="p-2">
                                {{ property.Condo_exp }}
                            </td>
                        </tr>
                        <tr v-if="property.Corp_num">
                            <th class="p-2">Condo Corp#</th>
                            <td class="p-2">{{ property.Corp_num }}</td>
                        </tr>
                    </table>

                    <table class="table table-bordered border mt-4">
                        <tr>
                            <th colspan="2" class="p-2 text-center">Inside</th>
                        </tr>
                        <tr v-if="property.Irreg">
                            <th class="p-2">Lot Irregularities</th>
                            <td class="p-2">{{ property.Irreg }}</td>
                        </tr>
                        <tr v-if="property.Kit_plus">
                            <th class="p-2">Kitchens Plus</th>
                            <td class="p-2">{{ property.Kit_plus }}</td>
                        </tr>
                        <tr v-if="property.Laundry_lev">
                            <th class="p-2">Laundry Level</th>
                            <td class="p-2">
                                {{ property.Laundry_lev }}
                            </td>
                        </tr>
                        <tr v-if="property.Front_ft">
                            <th class="p-2">Lot Front</th>
                            <td class="p-2">{{ property.Front_ft }}</td>
                        </tr>
                        <tr v-if="property.Gar_spaces">
                            <th class="p-2">Garage Spaces</th>
                            <td class="p-2">
                                {{ property.Gar_spaces }}
                            </td>
                        </tr>
                        <tr v-if="property.Gas">
                            <th class="p-2">Utilities-Gas</th>
                            <td class="p-2">{{ property.Gas }}</td>
                        </tr>
                    </table>

                    <table class="table table-bordered border">
                        <tr>
                            <th colspan="2" class="p-2 text-center">Parking</th>
                        </tr>
                        <tr v-if="property.Park_chgs">
                            <th class="p-2">Park Cost/Mo</th>
                            <td class="p-2">
                                {{ property.Park_chgs }}
                            </td>
                        </tr>
                        <tr v-if="property.Park_desig">
                            <th class="p-2">Parking Type</th>
                            <td class="p-2">
                                {{ property.Park_desig }}
                            </td>
                        </tr>
                        <tr v-if="property.Park_desig_2">
                            <th class="p-2">Parking Type2</th>
                            <td class="p-2">
                                {{ property.Park_desig_2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Park_fac">
                            <th class="p-2">Parking/Drive</th>
                            <td class="p-2">{{ property.Park_fac }}</td>
                        </tr>
                        <tr v-if="property.Park_lgl_desc1">
                            <th class="p-2">Parking Legal Description</th>
                            <td class="p-2">
                                {{ property.Park_lgl_desc1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Park_lgl_desc2">
                            <th class="p-2">Parking Legal Description2</th>
                            <td class="p-2">
                                {{ property.Park_lgl_desc2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Park_spc1">
                            <th class="p-2">Parking Spot #1</th>
                            <td class="p-2">
                                {{ property.Park_spc1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Park_spc2">
                            <th class="p-2">Parking Spot #2</th>
                            <td class="p-2">
                                {{ property.Park_spc2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Trlr_pk_spt">
                            <th class="p-2"># Trailer Parking Spots</th>
                            <td class="p-2">
                                {{ property.Trlr_pk_spt }}
                            </td>
                        </tr>
                    </table>

                    <table class="table table-bordered border">
                        <tr>
                            <th colspan="2" class="p-2 text-center">
                                Highlights
                            </th>
                        </tr>
                        <tr v-if="property.Idx_dt">
                            <th class="p-2">IDX updated date</th>
                            <td class="p-2">{{ property.Idx_dt }}</td>
                        </tr>
                        <tr v-if="property.Exp_actest">
                            <th class="p-2">Expenses Actual/Estimated</th>
                            <td class="p-2">
                                {{ property.Exp_actest }}
                            </td>
                        </tr>
                        <tr v-if="property.Fin_stmnt">
                            <th class="p-2">Financial Statement</th>
                            <td class="p-2">
                                {{ property.Fin_stmnt }}
                            </td>
                        </tr>
                        <tr v-if="property.Franchise">
                            <th class="p-2">Franchise</th>
                            <td class="p-2">
                                {{ property.Franchise }}
                            </td>
                        </tr>
                        <tr v-if="property.Freestandg">
                            <th class="p-2">Freestandg</th>
                            <td class="p-2">
                                {{ property.Freestandg }}
                            </td>
                        </tr>
                        <tr v-if="property.Gross_inc">
                            <th class="p-2">Gross_inc</th>
                            <td class="p-2">
                                {{ property.Gross_inc }}
                            </td>
                        </tr>
                        <tr v-if="property.Heat_exp">
                            <th class="p-2">Heat_exp</th>
                            <td class="p-2">{{ property.Heat_exp }}</td>
                        </tr>
                        <tr v-if="property.Hours_open">
                            <th class="p-2">Hours_open</th>
                            <td class="p-2">
                                {{ property.Hours_open }}
                            </td>
                        </tr>
                        <tr v-if="property.Hydro_exp">
                            <th class="p-2">Hydro_exp</th>
                            <td class="p-2">
                                {{ property.Hydro_exp }}
                            </td>
                        </tr>
                        <tr v-if="property.Ind_area">
                            <th class="p-2">Ind_area</th>
                            <td class="p-2">{{ property.Ind_area }}</td>
                        </tr>
                        <tr v-if="property.Ind_areacd">
                            <th class="p-2">Ind_areacd</th>
                            <td class="p-2">
                                {{ property.Ind_areacd }}
                            </td>
                        </tr>
                        <tr v-if="property.Insur">
                            <th class="p-2">Insur</th>
                            <td class="p-2">{{ property.Insur }}</td>
                        </tr>
                        <tr v-if="property.Inventory">
                            <th class="p-2">Inventory</th>
                            <td class="p-2">
                                {{ property.Inventory }}
                            </td>
                        </tr>
                        <tr v-if="property.Llbo">
                            <th class="p-2">Llbo</th>
                            <td class="p-2">{{ property.Llbo }}</td>
                        </tr>
                        <tr v-if="property.Lot_code">
                            <th class="p-2">Lot_code</th>
                            <td class="p-2">{{ property.Lot_code }}</td>
                        </tr>
                        <tr v-if="property.Lp_code">
                            <th class="p-2">Lp_code</th>
                            <td class="p-2">{{ property.Lp_code }}</td>
                        </tr>
                        <tr v-if="property.Maint">
                            <th class="p-2">Maint</th>
                            <td class="p-2">{{ property.Maint }}</td>
                        </tr>
                        <tr v-if="property.Mgmt">
                            <th class="p-2">Mgmt</th>
                            <td class="p-2">{{ property.Mgmt }}</td>
                        </tr>
                        <tr v-if="property.Minrenttrm">
                            <th class="p-2">Minrenttrm</th>
                            <td class="p-2">
                                {{ property.Minrenttrm }}
                            </td>
                        </tr>
                        <tr v-if="property.Net_inc">
                            <th class="p-2">Net_inc</th>
                            <td class="p-2">{{ property.Net_inc }}</td>
                        </tr>
                        <tr v-if="property.Oa_area">
                            <th class="p-2">Oa_area</th>
                            <td class="p-2">{{ property.Oa_area }}</td>
                        </tr>
                        <tr v-if="property.Occupancy">
                            <th class="p-2">Occupancy</th>
                            <td class="p-2">
                                {{ property.Occupancy }}
                            </td>
                        </tr>
                        <tr v-if="property.Off_areacd">
                            <th class="p-2">Off_areacd</th>
                            <td class="p-2">
                                {{ property.Off_areacd }}
                            </td>
                        </tr>
                        <tr v-if="property.Oper_exp">
                            <th class="p-2">Oper_exp</th>
                            <td class="p-2">{{ property.Oper_exp }}</td>
                        </tr>
                        <tr v-if="property.Other">
                            <th class="p-2">Other</th>
                            <td class="p-2">{{ property.Other }}</td>
                        </tr>
                        <tr v-if="property.Out_storg">
                            <th class="p-2">Out_storg</th>
                            <td class="p-2">
                                {{ property.Out_storg }}
                            </td>
                        </tr>
                        <tr v-if="property.Perc_bldg">
                            <th class="p-2">Perc_bldg</th>
                            <td class="p-2">
                                {{ property.Perc_bldg }}
                            </td>
                        </tr>
                        <tr v-if="property.Amps">
                            <th class="p-2">Amps</th>
                            <td class="p-2">{{ property.Amps }}</td>
                        </tr>
                        <tr v-if="property.Area_infl1_out">
                            <th class="p-2">Area_infl1_out</th>
                            <td class="p-2">
                                {{ property.Area_infl1_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Area_infl2_out">
                            <th class="p-2">Area_infl2_out</th>
                            <td class="p-2">
                                {{ property.Area_infl2_out }}
                            </td>
                        </tr>
                        <tr v-if="property.Bay_size1">
                            <th class="p-2">Bay_size1</th>
                            <td class="p-2">
                                {{ property.Bay_size1 }}
                            </td>
                        </tr>
                        <tr v-if="property.Bay_size1_in">
                            <th class="p-2">Bay_size1_in</th>
                            <td class="p-2">
                                {{ property.Bay_size1_in }}
                            </td>
                        </tr>
                        <tr v-if="property.Bay_size2">
                            <th class="p-2">Bay_size2</th>
                            <td class="p-2">
                                {{ property.Bay_size2 }}
                            </td>
                        </tr>
                        <tr v-if="property.Bay_size2_in">
                            <th class="p-2">Bay_size2_in</th>
                            <td class="p-2">
                                {{ property.Bay_size2_in }}
                            </td>
                        </tr>
                        <tr v-if="property.Bus_type">
                            <th class="p-2">Bus_type</th>
                            <td class="p-2">{{ property.Bus_type }}</td>
                        </tr>
                        <tr v-if="property.Ceil_ht">
                            <th class="p-2">Ceil_ht</th>
                            <td class="p-2">{{ property.Ceil_ht }}</td>
                        </tr>
                        <tr v-if="property.Ceil_ht_in">
                            <th class="p-2">Ceil_ht_in</th>
                            <td class="p-2">
                                {{ property.Ceil_ht_in }}
                            </td>
                        </tr>
                        <tr v-if="property.Chattels">
                            <th class="p-2">Chattels</th>
                            <td class="p-2">{{ property.Chattels }}</td>
                        </tr>
                        <tr v-if="property.Com_chgs">
                            <th class="p-2">Com_chgs</th>
                            <td class="p-2">{{ property.Com_chgs }}</td>
                        </tr>
                        <tr v-if="property.Com_cn_fee">
                            <th class="p-2">Com_cn_fee</th>
                            <td class="p-2">
                                {{ property.Com_cn_fee }}
                            </td>
                        </tr>
                        <tr v-if="property.Crane">
                            <th class="p-2">Crane</th>
                            <td class="p-2">{{ property.Crane }}</td>
                        </tr>
                        <tr v-if="property.Days_open">
                            <th class="p-2">Days_open</th>
                            <td class="p-2">
                                {{ property.Days_open }}
                            </td>
                        </tr>
                        <tr v-if="property.Dba">
                            <th class="p-2">Dba</th>
                            <td class="p-2">{{ property.Dba }}</td>
                        </tr>
                        <tr v-if="property.Employees">
                            <th class="p-2">Employees</th>
                            <td class="p-2">
                                {{ property.Employees }}
                            </td>
                        </tr>
                        <tr v-if="property.Seats">
                            <th class="p-2">Seats</th>
                            <td class="p-2">{{ property.Seats }}</td>
                        </tr>
                        <tr v-if="property.Shpdrsdlhtft">
                            <th class="p-2">
                                Drive-In Level Shipping Doors Height Feet
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsdlhtft }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdlhtin">
                            <th class="p-2">
                                Drive-In Level Shipping Doors Height Inches
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsdlhtin }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdlnu">
                            <th class="p-2">Drive-In Level Shipping Doors</th>
                            <td class="p-2">
                                {{ property.Shpdrsdlnu }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdlwdft">
                            <th class="p-2">
                                Drive-In Level Shipping Doors Width Feet
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsdlwdft }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdlwdin">
                            <th class="p-2">
                                Drive-In Level Shipping Doors Width Inches
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsdlwdin }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdmhtft">
                            <th class="p-2">
                                Double Man Shipping Doors Height Feet
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsdmhtft }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdmhtin">
                            <th class="p-2">
                                Double Man Shipping Doors Height Inches
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsdmhtin }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdmnu">
                            <th class="p-2">Double Man Shipping Doors #</th>
                            <td class="p-2">
                                {{ property.Shpdrsdmnu }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdmwdft">
                            <th class="p-2">
                                Double Man Shipping Doors Width Feet
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsdmwdft }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsdmwdin">
                            <th class="p-2">
                                Double Man Shipping Doors Width Inches
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsdmwdin }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsglhtft">
                            <th class="p-2">
                                Grade Level Shipping Doors Height Feet
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsglhtft }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsglhtin">
                            <th class="p-2">
                                Grade Level Shipping Doors Height Inches
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsglhtin }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsglnu">
                            <th class="p-2">Grade Level Shipping Doors #</th>
                            <td class="p-2">
                                {{ property.Shpdrsglnu }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsglwdft">
                            <th class="p-2">
                                Grade Level Shipping Doors Width Feet
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsglwdft }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrsglwdin">
                            <th class="p-2">
                                Grade Level Shipping Doors Width Inches
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrsglwdin }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrstlhtft">
                            <th class="p-2">
                                Truck Level Shipping Doors Height Feet
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrstlhtft }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrstlhtin">
                            <th class="p-2">
                                Truck Level Shipping Doors Height Inches
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrstlhtin }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrstlnu">
                            <th class="p-2">Truck Level Shipping Doors #</th>
                            <td class="p-2">
                                {{ property.Shpdrstlnu }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrstlwdft">
                            <th class="p-2">
                                Truck Level Shipping Doors Width Feet
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrstlwdft }}
                            </td>
                        </tr>
                        <tr v-if="property.Shpdrstlwdin">
                            <th class="p-2">
                                Truck Level Shipping Doors Width Inches
                            </th>
                            <td class="p-2">
                                {{ property.Shpdrstlwdin }}
                            </td>
                        </tr>
                        <tr v-if="property.Soil_test">
                            <th class="p-2">Soil_test</th>
                            <td class="p-2">
                                {{ property.Soil_test }}
                            </td>
                        </tr>
                        <tr v-if="property.Sprinklers">
                            <th class="p-2">Sprinklers</th>
                            <td class="p-2">
                                {{ property.Sprinklers }}
                            </td>
                        </tr>
                        <tr v-if="property.Survey">
                            <th class="p-2">Survey</th>
                            <td class="p-2">{{ property.Survey }}</td>
                        </tr>
                        <tr v-if="property.Taxes_exp">
                            <th class="p-2">Maximum Rental Term</th>
                            <td class="p-2">
                                {{ property.Taxes_exp }}
                            </td>
                        </tr>
                        <tr v-if="property.Terms">
                            <th class="p-2">Terms</th>
                            <td class="p-2">{{ property.Terms }}</td>
                        </tr>
                        <tr v-if="property.Tot_area">
                            <th class="p-2">Total Area</th>
                            <td class="p-2">{{ property.Tot_area }}</td>
                        </tr>
                        <tr v-if="property.Tot_areacd">
                            <th class="p-2">Tot_areacd</th>
                            <td class="p-2">
                                {{ property.Tot_areacd }}
                            </td>
                        </tr>
                        <tr v-if="property.Type_taxes">
                            <th class="p-2">Type Taxes</th>
                            <td class="p-2">
                                {{ property.Type_taxes }}
                            </td>
                        </tr>
                        <tr v-if="property.Utilities">
                            <th class="p-2">Utilities</th>
                            <td class="p-2">
                                {{ property.Utilities }}
                            </td>
                        </tr>
                        <tr v-if="property.Vac_perc">
                            <th class="p-2">Vacancy Allowance</th>
                            <td class="p-2">{{ property.Vac_perc }}</td>
                        </tr>
                        <tr v-if="property.Volts">
                            <th class="p-2">Volts</th>
                            <td class="p-2">{{ property.Volts }}</td>
                        </tr>
                        <tr v-if="property.Water_exp">
                            <th class="p-2">Water Expense</th>
                            <td class="p-2">
                                {{ property.Water_exp }}
                            </td>
                        </tr>
                        <tr v-if="property.Yr_exp">
                            <th class="p-2">Year Expenses</th>
                            <td class="p-2">{{ property.Yr_exp }}</td>
                        </tr>
                        <tr v-if="property.Perc_rent">
                            <th class="p-2">Percentage Rent</th>
                            <td class="p-2">
                                {{ property.Perc_rent }}
                            </td>
                        </tr>
                        <tr v-if="property.Prop_type">
                            <th class="p-2">Category</th>
                            <td class="p-2">
                                {{ property.Prop_type }}
                            </td>
                        </tr>
                        <tr v-if="property.Rail">
                            <th class="p-2">Rail</th>
                            <td class="p-2">{{ property.Rail }}</td>
                        </tr>
                        <tr v-if="property.Retail_a">
                            <th class="p-2">Retail Area</th>
                            <td class="p-2">{{ property.Retail_a }}</td>
                        </tr>
                        <tr v-if="property.Retail_ac">
                            <th class="p-2">Retail Area Code</th>
                            <td class="p-2">
                                {{ property.Retail_ac }}
                            </td>
                        </tr>
                        <tr v-if="property.Ens_lndry">
                            <th class="p-2">Ensuite Laundry</th>
                            <td class="p-2">
                                {{ property.Ens_lndry }}
                            </td>
                        </tr>
                        <tr v-if="property.Gar">
                            <th class="p-2">Garage/Park Spaces</th>
                            <td class="p-2">{{ property.Gar }}</td>
                        </tr>
                        <tr v-if="property.Sewage_srch">
                            <th class="p-2">Sewage Search</th>
                            <td class="p-2">
                                {{ property.Sewage_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Locker_lev_unit">
                            <th class="p-2">Locker Level</th>
                            <td class="p-2">
                                {{ property.Locker_lev_unit }}
                            </td>
                        </tr>
                        <tr v-if="property.Locker_unit">
                            <th class="p-2">Locker Unit</th>
                            <td class="p-2">
                                {{ property.Locker_unit }}
                            </td>
                        </tr>
                        <tr v-if="property.Access_prop_srch">
                            <th class="p-2">Access To Property Search</th>
                            <td class="p-2">
                                {{ property.Access_prop_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_feat_srch">
                            <th class="p-2">Water Features Search</th>
                            <td class="p-2">
                                {{ property.Water_feat_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Shoreline_srch">
                            <th class="p-2">Shoreline Search</th>
                            <td class="p-2">
                                {{ property.Shoreline_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Pets">
                            <th class="p-2">Pets Permitted</th>
                            <td class="p-2">{{ property.Pets }}</td>
                        </tr>
                        <tr v-if="property.Patio_ter">
                            <th class="p-2">Balcony</th>
                            <td class="p-2">
                                {{ property.Patio_ter }}
                            </td>
                        </tr>
                        <tr v-if="property.Lease_term">
                            <th class="p-2">Lease Term</th>
                            <td class="p-2">
                                {{ property.Lease_term }}
                            </td>
                        </tr>
                        <tr v-if="property.Locker">
                            <th class="p-2">Locker</th>
                            <td class="p-2">{{ property.Locker }}</td>
                        </tr>
                        <tr v-if="property.Locker_num">
                            <th class="p-2">Locker #</th>
                            <td class="p-2">
                                {{ property.Locker_num }}
                            </td>
                        </tr>
                        <tr v-if="property.Alt_power_srch">
                            <th class="p-2">Alternative Power Search</th>
                            <td class="p-2">
                                {{ property.Alt_power_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Easement_rest_srch">
                            <th class="p-2">Easements Restrictions Search</th>
                            <td class="p-2">
                                {{ property.Easement_rest_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Rural_svc_srch">
                            <th class="p-2">Rural Services Search</th>
                            <td class="p-2">
                                {{ property.Rural_svc_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_acc_bldg_srch">
                            <th class="p-2">
                                Waterfront Accessory Bldgs Search
                            </th>
                            <td class="p-2">
                                {{ property.Water_acc_bldg_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Water_del_feat_srch">
                            <th class="p-2">Water Delivery Features Search</th>
                            <td class="p-2">
                                {{ property.Water_del_feat_srch }}
                            </td>
                        </tr>
                        <tr v-if="property.Stories">
                            <th class="p-2">Level</th>
                            <td class="p-2">{{ property.Stories }}</td>
                        </tr>
                        <tr v-if="property.Unit_num">
                            <th class="p-2">Unit #</th>
                            <td class="p-2">{{ property.Unit_num }}</td>
                        </tr>
                        <tr v-if="property.Share_perc">
                            <th class="p-2"># Shares %</th>
                            <td class="p-2">
                                {{ property.Share_perc }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            activeTab: 1,
        };
    },
    props: {
        property: {
            type: Object,
            default: () => ({}),
        },
    },
};
</script>

<style lang="scss" scoped>
.c-tabs {
    background: #fff;
    height: 50px;
    overflow: hidden;

    .c-tab-outer {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        overflow-x: auto;
        height: 68px;
        overflow-y: hidden;
        background: #f5f5f5;
        position: relative;

        &:after {
            content: "";
            height: 1px;
            width: 100%;
            position: absolute;
            background: #032646;
            display: block;
            left: 0;
            top: 49px;
            display: none;
        }

        li {
            display: inline-block;
            height: 50px;
            span {
                display: inline-block;
                padding: 13px 20px;
                transition: all ease 0.4s;
                font-weight: 600;
                white-space: nowrap;
                cursor: pointer;

                &:hover {
                    background: rgba(3, 38, 70, 0.3);
                }

                &.active {
                    color: #fff !important;
                    background: #032646;
                }
            }
        }
    }
}

.c {
    padding: 5px;
    font-size: 17px;

    &:hover {
        background: #f0f0f0;
    }

    .title {
        position: relative;
        font-weight: 600;
        padding-right: 10px;

        &::after {
            content: ":";
        }
    }
}
</style>
