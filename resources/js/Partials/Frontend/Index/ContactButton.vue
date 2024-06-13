<template>
    <div data-dial-init class="fixed right-6 bottom-6 group z-50">
        <div id="speed-dial-menu-bottom-right" class="flex flex-col items-center hidden mb-4 space-y-2">
            <button type="button" data-tooltip-target="tooltip-WhatsApp" data-tooltip-placement="left"
                    class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600  focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg height="512px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x31_3-whatsapp"><g><g><path d="M256.063,16.75h-0.125C124.379,16.75,17.397,124.051,17.397,256     c0,52.336,16.819,100.848,45.422,140.232l-29.732,88.873l91.716-29.394c37.725,25.063,82.731,39.538,131.26,39.538     c131.559,0,238.541-107.335,238.541-239.25C494.604,124.083,387.621,16.75,256.063,16.75L256.063,16.75z M256.063,16.75" style="fill:#5ACF5F;"/><path d="M394.896,354.596c-5.758,16.304-28.604,29.817-46.824,33.771     c-12.473,2.657-28.754,4.785-83.568-18.006c-70.125-29.127-115.28-100.575-118.795-105.21     c-3.375-4.637-28.336-37.827-28.336-72.165c0-34.331,17.386-51.052,24.398-58.223c5.751-5.897,15.267-8.583,24.394-8.583     c2.954,0,5.606,0.146,7.997,0.267c7.008,0.302,10.524,0.717,15.151,11.813c5.756,13.909,19.77,48.239,21.445,51.771     c1.701,3.53,3.396,8.311,1.012,12.945c-2.24,4.788-4.205,6.91-7.725,10.975c-3.521,4.073-6.865,7.182-10.381,11.544     c-3.219,3.798-6.859,7.867-2.801,14.896c4.055,6.879,18.07,29.812,38.707,48.235c26.641,23.775,48.229,31.372,55.957,34.604     c5.756,2.395,12.615,1.822,16.816-2.663c5.34-5.774,11.938-15.342,18.645-24.759c4.771-6.76,10.795-7.599,17.119-5.208     c6.441,2.244,40.531,19.143,47.541,22.641c7.006,3.529,11.635,5.203,13.334,8.165     C400.652,324.361,400.652,338.271,394.896,354.596L394.896,354.596z M394.896,354.596" style="fill:#FCFCFC;"/></g></g></g><g id="Layer_1"/></svg>
                <span class="sr-only">WhatsApp</span>
            </button>
            <div id="tooltip-WhatsApp" role="tooltip"
                 class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                WhatsApp
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button type="button" data-tooltip-target="tooltip-Telegram" data-tooltip-placement="left"
                    class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600  focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                    <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path><path fill="#fff" d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"></path><path fill="#b0bec5" d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"></path><path fill="#cfd8dc" d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"></path>
                </svg>
                <span class="sr-only">Telegram</span>
            </button>
            <div id="tooltip-Telegram" role="tooltip"
                 class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Telegram
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        <button type="button" data-dial-toggle="speed-dial-menu-bottom-right"
                aria-controls="speed-dial-menu-bottom-right" aria-expanded="false"
                class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700  focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
            <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 1v16M1 9h16"/>
            </svg>
            <span class="sr-only">Open actions menu</span>
        </button>
    </div>
</template>

<script>
export default {}
</script>
<style scoped>

</style>
