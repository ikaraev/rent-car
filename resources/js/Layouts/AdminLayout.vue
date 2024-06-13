<template>
    <div class="app">
        <!-- #Left Sidebar ==================== -->
        <Sidebar />
        <!-- #Main ============================ -->
        <div class="page-container">
            <!-- ### $Topbar ### -->
            <Topbar />
            <!-- ### $App Screen Content ### -->
            <main class='main-content bgc-grey-100'>
                <div id='mainContent'>
                    <slot/>
                </div>
            </main>

            <!-- ### $App Screen Footer ### -->
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>Copyright © 2021 Designed by <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
            </footer>
        </div>
    </div>
</template>

<script>
import '../../styles/sass/index.scss'
import masonry from "../../scripts/masonry/index.js"
import popover from "../../scripts/popover/index.js";
import scrollbar from "../../scripts/scrollbar/index.js";
import skycons from "../../scripts/skycons/index.js"
import chat from "../../scripts/chat/index.js";
import datepicker from "../../scripts/datepicker/index.js";
import email from "../../scripts/email/index.js";
import googleMaps from "../../scripts/googleMaps/index.js";
import utils from "../../scripts/utils/index.js";
import {Link} from "@inertiajs/vue3";
import Sidebar from "@/Partials/Admin/Sidebar.vue";
import Topbar from "@/Partials/Admin/Topbar.vue";

export default {
    components: {Topbar, Sidebar, Link},
    mounted() {
        skycons()
        masonry()
        popover()
        scrollbar()
        chat()
        datepicker()
        email()
        googleMaps()
        utils()
    }
}
</script>
