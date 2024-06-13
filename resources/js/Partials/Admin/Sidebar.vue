<template>
    <div class="sidebar">
        <div class="sidebar-inner">
            <!-- ### $Sidebar Header ### -->
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="index.html">
                            <div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo">
                                        <img src="/storage/logo.png" alt="">
                                    </div>
                                </div>
                                <div class="peer peer-greed">
                                    <h5 class="lh-1 mB-0 logo-text">Karaev Corporation</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle">
                            <a href="" class="td-n">
                                <i class="ti-arrow-circle-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ### $Sidebar Menu ### -->
            <ul class="sidebar-menu scrollable pos-r">
                <li class="nav-item"
                    :class="!index ? 'mT-30' : ''"
                    v-for="(tab, index) in sidebar">
                    <Link :href="route(tab.link)" class='sidebar-link'>
                            <span class="icon-holder">
                              <i :class="tab.icon_css"></i>
                            </span>
                        <span class="title">{{tab.title}}</span>
                    </Link>
                </li>

<!--                <li class="nav-item dropdown">-->
<!--                    <a class="dropdown-toggle" href="javascript:void(0);">-->
<!--                        <span class="icon-holder">-->
<!--                          <i class="c-orange-500 ti-layout-list-thumb"></i>-->
<!--                        </span>-->
<!--                                <span class="title">Tables</span>-->
<!--                                <span class="arrow">-->
<!--                          <i class="ti-angle-right"></i>-->
<!--                        </span>-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li>-->
<!--                            <a class='sidebar-link' href="basic-table.html">Basic Table</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a class='sidebar-link' href="datatable.html">Data Table</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import sidebar from "../../../scripts/sidebar/index.js";

export default {
    components: {Link},
    computed: {
        sidebar() {
            return this.$page.props.sidebar
        }
    },
    mounted() {
        sidebar()
    }
}
</script>
