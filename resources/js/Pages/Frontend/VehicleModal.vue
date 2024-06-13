<template>
    <!-- Main modal -->
    <div class="z-20" id="default-modal" aria-hidden="true">
        <div class="absolute" @click="$event.target.id === 'closeArea' && $emit('closeVehicleModal')">
            <div class="fixed inset-0 bg-black/30" @click="$emit('closeVehicleModal')"></div>
            <div class="z-20 fixed inset-0 flex items-center justify-center md:p-4" id="closeArea">
                <div
                    class="transform md:rounded-lg bg-white w-full shadow-xl transition-all sm:my-24 lg:max-w-7xl h-full overflow-auto">
                    <div
                        class="flex md:rounded-lg bg-white justify-between items-center top-0 p-4 w-full sticky z-30">
                        <div></div>
                        <h2><span
                            class="md:text-3xl text-gray-700 font-bold">{{ vehicle.name }}</span></h2>
                        <button
                            @click="$emit('closeVehicleModal')"
                            type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center"
                        >
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                            </svg>
                            <span class="sr-only">Close modal</span></button>
                    </div>
                    <div class="mt-3">
                        <div class="lg:flex mt-5 w-full px-4 md:px-8 relative">
                            <div class="flex-auto my-7 mt-10 lg:mt-0"><!---->
                                <div class="mt-2"><span
                                    class="text-xl font-bold text-gray-700 float-left pr-2 pl-2 ml-1 -mt-3.5">{{ __('Description') }}</span>
                                    <div class="mt-4">
                                        <div class="p-4 shadow-lg rounded-xl">
                                            <ul class="text-left text-gray-500 mt-2 grid md:grid-cols-2 gap-2">
                                                <li class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5"
                                                         stroke="currentColor" aria-hidden="true"
                                                         class="h-6 w-6 text-green-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495"></path>
                                                    </svg>
                                                    <span>{{ __('Transmission') }}:</span><span
                                                    class="font-semibold text-gray-900">{{ __(vehicle.gear_box) }}</span>
                                                </li>

                                                <li class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5"
                                                         stroke="currentColor" aria-hidden="true"
                                                         class="h-6 w-6 text-green-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path>
                                                    </svg>
                                                    <span>{{ __('Year of Manufacture') }}:</span><span
                                                    class="font-semibold text-gray-900">{{ vehicle.year }}</span></li>
                                                <li class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5"
                                                         stroke="currentColor" aria-hidden="true"
                                                         class="h-6 w-6 text-green-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"></path>
                                                    </svg>
                                                    <span>{{ __('Fuel Type') }}:</span><span
                                                    class="font-semibold text-gray-900">{{ __(vehicle.engine) }}</span></li>
                                                <li class="flex space-x-3">
                                                    <svg fill="#057d55" width="22px" height="22px"
                                                         stroke="currentColor" aria-hidden="true"
                                                         stroke-width="1.5"
                                                         class="text-green-600"
                                                         viewBox="-5.99 0 122.88 122.88" version="1.1" id="Layer_1"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                         style="enable-background:new 0 0 110.9 122.88"
                                                         xml:space="preserve">
                                                        <g>
                                                        <path
                                                            d="M99.06,20.2c0.27,0.13,0.51,0.3,0.74,0.52c0.06,0.06,0.11,0.12,0.16,0.18c2.89,2.29,5.78,4.88,7.88,8 c2.32,3.45,3.61,7.44,2.83,12.17c-0.33,1.98-1.08,3.71-2.22,5.24c-0.82,1.09-1.82,2.05-3,2.89c-0.06,1.53-0.08,3.03-0.08,4.52 c0.01,1.91,0.07,3.88,0.18,5.9c0.25,4.74,0.96,9.52,1.67,14.26c0.76,5.1,1.52,10.16,1.72,15.43c0.27,6.75-0.53,12.3-2.76,16.22 c-2.48,4.38-6.51,6.72-12.45,6.51v0c-7.09-0.13-11.45-4.11-13.42-11.46c-1.72-6.43-1.46-15.61,0.49-27.16 c-0.06-9.15-1.25-16.08-3.61-20.75c-1.54-3.05-3.63-5.07-6.27-6.03v59.91c0.86,0.41,1.64,0.97,2.3,1.64 c1.52,1.52,2.47,3.63,2.47,5.95v5.98c0,1.51-1.23,2.74-2.74,2.74H2.74c-1.51,0-2.74-1.23-2.74-2.74v-5.98 c0-2.32,0.95-4.42,2.47-5.95c0.47-0.47,1-0.89,1.57-1.24V14.52c0-4,1.63-7.63,4.26-10.26C10.93,1.63,14.56,0,18.56,0h37.78 C60.35,0,64,1.64,66.64,4.28c2.64,2.64,4.28,6.29,4.28,10.31v26.36c4.86,1.06,8.57,4.17,11.15,9.27 c2.77,5.47,4.15,13.31,4.19,23.46c0,0.16-0.01,0.32-0.04,0.47l0.01,0c-1.85,10.87-2.15,19.35-0.63,25.02 c1.27,4.77,3.95,7.35,8.24,7.41l0.05,0v0c3.66,0.12,6.09-1.22,7.52-3.75c1.69-2.98,2.28-7.55,2.05-13.31 c-0.19-4.88-0.94-9.85-1.68-14.85c-0.72-4.82-1.44-9.68-1.71-14.78c-0.11-2.01-0.17-4.06-0.18-6.18c-0.01-1.68,0.02-3.34,0.09-4.97 c-5.11-4.48-8.22-8.96-9.18-13.42c-0.91-4.23,0.05-8.29,3-12.17c-2.25-1.54-4.54-2.8-6.86-3.81c-3.17-1.38-6.43-2.31-9.75-2.85 c-1.49-0.24-2.5-1.65-2.26-3.14c0.24-1.49,1.65-2.5,3.14-2.26c3.76,0.61,7.45,1.66,11.06,3.23C92.54,15.82,95.85,17.75,99.06,20.2 L99.06,20.2z M65.44,44.23c-0.12-0.34-0.18-0.7-0.15-1.08c0.02-0.27,0.07-0.52,0.15-0.76v-27.8c0-2.5-1.03-4.78-2.68-6.43 c-1.65-1.65-3.93-2.68-6.43-2.68H18.56c-2.48,0-4.74,1.02-6.38,2.66c-1.64,1.64-2.66,3.9-2.66,6.38v91.22h55.92V44.23L65.44,44.23z M68.42,111.46c-0.08,0.01-0.15,0.01-0.23,0.01H7.26c-0.34,0.15-0.65,0.36-0.91,0.62c-0.53,0.53-0.86,1.26-0.86,2.07v3.24h64.73 v-3.24c0-0.8-0.33-1.53-0.86-2.07C69.09,111.82,68.77,111.61,68.42,111.46L68.42,111.46z M23.04,13.74h29.44 c1.53,0,2.92,0.62,3.92,1.63c0.07,0.07,0.14,0.14,0.2,0.22c0.89,0.99,1.43,2.29,1.43,3.7v18.78c0,1.53-0.62,2.92-1.63,3.92 c-1,1-2.39,1.63-3.92,1.63H23.04c-1.52,0-2.9-0.63-3.91-1.63l-0.01,0.01c-1-1-1.63-2.39-1.63-3.92V19.29 c0-1.53,0.62-2.92,1.63-3.92c0.07-0.07,0.14-0.14,0.22-0.2C20.33,14.28,21.63,13.74,23.04,13.74L23.04,13.74z M52.48,19.22H23.04 c-0.01,0-0.02,0-0.02,0L23,19.24c-0.01,0.01-0.02,0.03-0.02,0.04v18.78c0,0.01,0.01,0.03,0.02,0.04L23,38.12L23,38.12 c0.01,0.01,0.02,0.01,0.04,0.01h29.44c0.01,0,0.03-0.01,0.04-0.02c0.01-0.01,0.02-0.03,0.02-0.04V19.29c0-0.01,0-0.02,0-0.02 l-0.02-0.02C52.51,19.23,52.5,19.22,52.48,19.22L52.48,19.22z M98.15,26.5c-1.91,2.56-2.55,5.12-1.99,7.7 c0.67,3.12,3,6.44,6.88,9.95c0.39-0.35,0.74-0.72,1.03-1.11c0.61-0.81,1.02-1.76,1.19-2.84c0.52-3.16-0.37-5.87-1.97-8.25 C101.97,29.97,100.13,28.16,98.15,26.5L98.15,26.5z"/>
                                                        </g>
                                                    </svg>

                                                    <span>{{ __('Fuel Consumption') }}:</span><span
                                                    class="font-semibold text-gray-900">{{
                                                        vehicle.fuel_consumption
                                                    }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-8"><span
                                    class="text-xl font-bold text-gray-700 float-left pr-2 pl-2 ml-1 -mt-3.5">{{ __('Delivery') }}</span>
                                    <div class="mt-4">
                                        <div class="p-4 shadow-lg rounded-xl">
                                            <div class="grid gap-6 md:grid-cols-2 mt-2">
                                                <div class="grid w-full">
                                                    <div class="flex justify-between items-center"><span
                                                        class="text-gray-500">{{ __('Receiving') }}</span><span
                                                        class="font-bold text-lg text-gray-900">{{ this.dateRange?.startDate ?? '' }} {{ convertToTime(this.start) }}</span>
                                                    </div>
                                                    <div class="flex justify-between items-center mt-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor" aria-hidden="true"
                                                             class="h-5 w-5 text-green-600 font-bold mr-2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <input id="steps-range" type="range" min="0" max="23.5"
                                                               v-model="start"
                                                               step="0.5"
                                                               class="w-full h-2 bg-gray-200 accent-indigo-600 rounded-lg appearance-none cursor-pointer flex-auto">
                                                    </div>
                                                    <div class="mt-3.5">
                                                        <div
                                                            class="p-2 mt-2.5 flex justify-between items-center">
                                                            <span class="text-gray-500 text-sm">Nutsubidze Plato IV Micro-district, Tbilisi, Georgia</span>
                                                            <button type="button"
                                                                    class="text-green-600 border border-green-600 hover:bg-green-100 hover:text-white focus:outline-none font-medium cursor-pointer rounded-full text-sm p-1.5 text-center inline-flex items-center ml-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     fill="none" viewBox="0 0 24 24"
                                                                     stroke-width="1.5" stroke="currentColor"
                                                                     aria-hidden="true"
                                                                     class="h-5 w-5 text-green-600">
                                                                    <path stroke-linecap="round"
                                                                          stroke-linejoin="round"
                                                                          d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                    <path stroke-linecap="round"
                                                                          stroke-linejoin="round"
                                                                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid w-full">
                                                    <div class="flex justify-between items-center"><span
                                                        class="text-gray-500">{{ __('Return') }}</span><span
                                                        class="font-bold text-lg text-gray-900">{{ this.dateRange?.endDate ?? ''}} {{ convertToTime(this.finish) }}</span>
                                                    </div>
                                                    <div class="flex justify-between items-center mt-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor" aria-hidden="true"
                                                             class="h-5 w-5 text-green-600 font-bold mr-2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <input id="steps-range" type="range" min="0" max="23.5"
                                                               v-model="finish"
                                                               step="0.5"
                                                               class="w-full h-2 bg-gray-200 accent-indigo-600 rounded-lg appearance-none cursor-pointer flex-auto">
                                                    </div>
                                                    <div class="mt-3.5">
                                                        <div
                                                            class="p-2 mt-2.5 flex justify-between items-center">
                                                            <span class="text-gray-500 text-sm">Nutsubidze Plato IV Micro-district, Tbilisi, Georgia</span>
                                                            <button type="button"
                                                                    class="text-green-600 border border-green-600 hover:bg-green-100 hover:text-white focus:outline-none font-medium cursor-pointer rounded-full text-sm p-1.5 text-center inline-flex items-center ml-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     fill="none" viewBox="0 0 24 24"
                                                                     stroke-width="1.5" stroke="currentColor"
                                                                     aria-hidden="true"
                                                                     class="h-5 w-5 text-green-600">
                                                                    <path stroke-linecap="round"
                                                                          stroke-linejoin="round"
                                                                          d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                    <path stroke-linecap="round"
                                                                          stroke-linejoin="round"
                                                                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-8"><span
                                    class="text-xl font-bold text-gray-700 float-left pr-2 pl-2 ml-1 -mt-3.5">{{ __('Form') }}</span>
                                    <div class="mt-4">
                                        <div class="p-4 shadow-lg rounded-xl w-full">
                                            <div class="mt-3">
                                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                                    <div class="relative">
                                                        <input type="text" id="client_name"
                                                               v-model="contact_form.name"
                                                               :class="errors?.['contactForm.name']
                                                            ? 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-800 dark:text-gray-100 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer border-red-500 focus:border-red-500'
                                                            : 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer'"
                                                               placeholder=" ">
                                                        <label
                                                            for="client_name"
                                                            :class="errors?.['contactForm.name']
                                                            ? 'absolute text-xs text-gray-500 -top-2 z-10 bg-white dark:bg-gray-900 px-1.5 peer-focus:text-blue-600 dark:text-gray-400 left-2 text-red-600 peer-focus:text-red-600'
                                                            : 'absolute text-xs text-gray-500 -top-2  bg-white px-1.5 peer-focus:text-blue-600 left-2'"
                                                            class="absolute text-xs text-gray-500 -top-2  bg-white px-1.5 peer-focus:text-blue-600 left-2"
                                                        >
                                                            {{ __('Name') }}*
                                                        </label>
                                                        <div class="flex float-left" v-if="errors?.['contactForm.name']">
                                                            <div class="text-sm text-red-500">
                                                                {{ errors?.['contactForm.name'][0] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="relative">
                                                        <input type="text"
                                                               id="client_email"
                                                               v-model="contact_form.email"
                                                               :class="errors?.['contactForm.email']
                                                            ? 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-800 dark:text-gray-100 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer border-red-500 focus:border-red-500'
                                                            : 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer'"
                                                               placeholder=" ">
                                                        <label
                                                            for="client_email"
                                                            :class="errors?.['contactForm.email']
                                                            ? 'absolute text-xs text-gray-500 -top-2 z-10 bg-white dark:bg-gray-900 px-1.5 peer-focus:text-blue-600 dark:text-gray-400 left-2 text-red-600 peer-focus:text-red-600'
                                                            : 'absolute text-xs text-gray-500 -top-2  bg-white px-1.5 peer-focus:text-blue-600 left-2'"
                                                        >
                                                            {{ __('E-mail') }}*
                                                        </label>
                                                        <div class="flex float-left" v-if="errors?.['contactForm.email']">
                                                            <div class="text-sm text-red-500">
                                                                {{ errors?.['contactForm.email'][0] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="relative">
                                                        <input type="date"
                                                             v-model="contact_form.date_birthday"
                                                             id="client_date_of_birth"
                                                               :class="errors?.['contactForm.date_birthday']
                                                            ? 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-800 dark:text-gray-100 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer border-red-500 focus:border-red-500'
                                                            : 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer'"
                                                             placeholder=" ">
                                                        <label
                                                            for="client_date_of_birth"
                                                            :class="errors?.['contactForm.date_birthday']
                                                            ? 'absolute text-xs text-gray-500 -top-2 z-10 bg-white dark:bg-gray-900 px-1.5 peer-focus:text-blue-600 dark:text-gray-400 left-2 text-red-600 peer-focus:text-red-600'
                                                            : 'absolute text-xs text-gray-500 -top-2  bg-white px-1.5 peer-focus:text-blue-600 left-2'"
                                                        >
                                                            {{ __('Date of Birth') }}*
                                                        </label>
                                                        <div class="flex float-left" v-if="errors?.['contactForm.date_birthday']">
                                                            <div class="text-sm text-red-500">
                                                                {{ errors?.['contactForm.date_birthday'][0] }}
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="relative">
                                                        <input v-model="contact_form.phone"
                                                               id="client_phone"
                                                               :class="errors?.['contactForm.phone']
                                                            ? 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-800 dark:text-gray-100 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer border-red-500 focus:border-red-500'
                                                            : 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer'"
                                                               placeholder="(000) 000-0000">
                                                        <label for="client_phone"
                                                               :class="errors?.['contactForm.phone']
                                                            ? 'absolute text-xs text-gray-500 -top-2 z-10 bg-white dark:bg-gray-900 px-1.5 peer-focus:text-blue-600 dark:text-gray-400 left-2 text-red-600 peer-focus:text-red-600'
                                                            : 'absolute text-xs text-gray-500 -top-2  bg-white px-1.5 peer-focus:text-blue-600 left-2'"
                                                        >
                                                            {{ __('Phone') }}*
                                                        </label>
                                                        <div class="flex float-left" v-if="errors?.['contactForm.phone']">
                                                            <div class="text-sm text-red-500">
                                                                {{ errors?.['contactForm.phone'][0] }}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="mb-6">
                                                    <div class="relative">
                                                        <textarea rows="3"
                                                                  v-model="contact_form.comment"
                                                                  class="flex px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                                  placeholder=" "></textarea>
                                                        <label
                                                            for="client_comment"
                                                            class="absolute text-xs text-gray-500 -top-2  bg-white px-1.5 peer-focus:text-blue-600 left-2">
                                                            {{ __('Comment') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-6"><label class="flex items-center"><input
                                                    type="checkbox"
                                                    class="w-5 h-5 text-indigo-600 bg-gray-50 border-gray-300 rounded cursor-pointer focus:ring-offset-0 focus:ring-0"
                                                    value="true"><span
                                                    class="text-left text-gray-500 cursor-pointer ml-2"><span
                                                    class="text-sm font-medium text-gray-900 space-x-2">{{ __('I have read and agree to the') }} <a
                                                    href="/terms/georgia" rel="noopener noreferrer"
                                                    target="_blank"
                                                    class="text-blue-600 hover:underline">{{ __('Agreement') }}</a><span>{{ __('and') }}</span><a
                                                    href="/privacy_policy" rel="noopener noreferrer"
                                                    target="_blank"
                                                    class="text-blue-600 hover:underline">{{ __('Privacy Policy') }}</a></span></span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:max-w-md lg:min-w-md lg:pl-5 w-full">
                                <div class="relative lg:sticky lg:top-24">
                                    <swiper
                                        :slidesPerView="1"
                                        :spaceBetween="30"
                                        :centeredSlides="true"
                                        :loop="true"
                                        :navigation="true"
                                        :modules="modules"
                                        class="mySwiper mb-20"
                                        id="galleryID"
                                    >
                                        <swiper-slide v-for="(image, key) in this.vehicle.images" class="self-center">
                                            <a
                                                :key="key"
                                                :href="'/' + image.name"
                                                :data-pswp-width="2000"
                                                :data-pswp-height="2000"
                                                target="_blank"
                                                rel="noreferrer"
                                            >
                                                <img :src="'/' + image.name" alt=""/>

                                            </a>
                                        </swiper-slide>
                                    </swiper>

                                    <span
                                        class="text-xl font-bold text-gray-700 float-left pr-2 pl-2 ml-1 -mt-3.5">{{ __('Price') }}</span>
                                    <div class="mt-4 relative">
                                        <div class="p-4 shadow-lg rounded-xl w-full">
                                            <div>
                                                <div class="mt-4 max-sm:space-y-3">
                                                    <div class="flex text-md items-center space-x-2"><span
                                                        class="text-gray-500">{{ __('Rental Price Per Day') }}:</span>
                                                        <div class="flex items-center space-x-0.5"><span
                                                            class="font-semibold text-gray-500">$</span><span
                                                            class="text-lg font-bold text-gray-900">{{ this.perDayRentPrice }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex text-md items-center space-x-2"><span
                                                        class="text-gray-500">{{ __('Rental Price') }}:</span>
                                                        <div class="flex items-center space-x-0.5"><span
                                                            class="font-semibold text-gray-500">$</span><span
                                                            class="text-lg font-bold text-gray-900">{{ this.totalRentPrice }}</span>
                                                        </div>
                                                        <span class="text-gray-500">{{ __('for') }} {{ this.rentDays }} {{ __('days') }}</span>
                                                    </div>
                                                </div>

                                                <div class="flex items-center space-x-2"><span
                                                    class="text-gray-500">{{ __('Total') }}:</span>
                                                    <div class="flex items-center space-x-0.5"><span
                                                        class="font-semibold text-gray-500">$</span><span
                                                        class="text-lg font-bold text-gray-900">{{ this.totalRentPrice }}</span></div>
                                                </div>
                                                <hr class="h-px my-4 bg-gray-200 border-0">
                                                <div class="mt-4 max-sm:space-y-4">
                                                    <div
                                                        class="flex text-lg leading-6 font-semibold items-center space-x-2">
                                                        <span class="text-gray-600">{{ __('On Receiving') }}:</span>
                                                        <div class="flex items-center space-x-0.5"><span
                                                            class="font-semibold text-gray-500">$</span><span
                                                            class="text-lg font-bold text-gray-900">{{ this.totalRentPrice }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            @click="book"
                                            type="submit"
                                            :disabled="this.isBooking"
                                            class="bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl w-full px-4 rounded-lg py-2.5 text-lg font-medium leading-7 text-white my-6 disabled:opacity-40 h-min">
                                            <div
                                                v-if="isBooking"
                                                role="status"
                                                class="absolute -translate-x-1/2  left-1/2">
                                                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                                <span class="sr-only">Loading...</span>
                                            </div>

                                            <span>
                                                {{ __('Book for') }}
                                                <span> ${{ this.totalRentPrice }}</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';
import PhotoSwipe from 'photoswipe';
import CarouselCard from "@/Components/Frontend/VehicleCard/CarouselCard.vue";
import {Swiper, SwiperSlide} from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import {Pagination, Navigation} from 'swiper/modules';
import {useToast} from "vue-toastification";

export default {
    components: {
        CarouselCard,
        Swiper,
        SwiperSlide,
    },
    props: {
        vehicle: Object
    },
    data() {
        let dateRange = this.getDateRange()

        return {
            isBooking: false,
            errors: {},
            dateRange,
            start: 0,
            finish: 0,
            notRequiredFields: ['comment'],
            contact_form: {
                name: '',
                email: '',
                phone: '',
                date_birthday: null,
                comment: ''
            },
            properties: {
                is_free_cancellation: false,
                is_second_driver: false,
                baby_seat: false,
                child_seat: false,
                receiving_city: 'Marneuli',
                return_city: 'Marneuli',
                receiving_address: 'Marneuli',
                return_address: 'Marneuli',
                day_price: 0,
                total_price: 0,
            },
            toast: useToast(),
        }
    },
    setup() {
        return {
            modules: [Pagination, Navigation],
        };
    },
    mounted() {
        if (!this.lightbox) {
            this.lightbox = new PhotoSwipeLightbox({
                gallery: '#galleryID',
                children: 'a',
                pswpModule: () => PhotoSwipe,
                showHideAnimationType: 'none'
            });
            this.lightbox.init();
        }
    },
    unmounted() {
        if (this.lightbox) {
            this.lightbox.destroy();
            this.lightbox = null;
        }
    },
    computed: {
        totalRentPrice() {
            return this.vehicle.booking ? this.vehicle.booking.total_price : (this.vehicle.rent_price * this.rentDays)
        },
        perDayRentPrice() {
            return this.vehicle.booking ? this.vehicle.booking.discount : this.vehicle.rent_price
        },
        rentDays() {
            if (this.vehicle.booking && this.vehicle.booking.days) {
                return this.vehicle.booking.days
            }

            const {startDate, endDate} = this.getDateRange()
            const start = new Date(startDate)
            const end = new Date(endDate)

            const difference = (end - start) / (1000 * 60 * 60 * 24)

            return Math.round(difference) + 1;
        }
    },
    methods: {
        book() {
            this.isBooking = true
            const body = {
                ...this.getFinalDate(),
                vehicle_id: this.vehicle.id,
                contactForm: this.contact_form,
                properties: this.properties
            }
            if (!this.isValidBookingForm(body)) {
                this.isBooking = false
                return
            }
            fetch(route('booking.execute'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(body)
            })
                .then(async data => {
                    const res = await data.json()
                    if (!data.ok) {
                        throw new Error(JSON.stringify(res.errors))
                        return
                    }
                    return res
                })
                .then(data => {
                    if (data.success) {
                        this.toast.success('You have successfully booked your car! \n We will contact you within a few minutes!', {
                            timeout: 10000,
                        })
                        this.$emit('closeVehicleModal')
                    }
                })
                .catch(async err => {
                    this.errors = await JSON.parse(err.message)
                })
                .finally(() => {
                    this.isBooking = false
                })
        },
        convertToTime(number) {
            const hours = Math.floor(number);
            const minutes = (number % 1) * 60;
            const formattedMinutes = minutes === 30 ? '30' : '00';
            return `${String(hours).padStart(2, '0')}:${formattedMinutes}`;
        },
        getFinalDate() {
            const today = this.dateRange.startDate
            const formattedFutureDate = this.dateRange.endDate

            const start = today + ' ' + this.convertToTime(this.start)
            const finish = formattedFutureDate + ' ' + this.convertToTime(this.finish)

            return {start, finish}
        },
        getDateRange() {
            let dateRange = {}
            const href = new URL(window.location.href)
            const datePickerClass = this.$page.props.filters.find(filter => filter.type === "booking-double-range-datepicker").class

            if (href.searchParams.has('filter')) {
                const filters = JSON.parse(atob(href.searchParams.get('filter')))
                if (datePickerClass in filters) {
                    return [datePickerClass].value
                }
            }

            if (!this.$inertia.page.rememberedState || !Object.keys(this.$inertia.page.rememberedState).length) {
                return this.$inertia.page.props.pickUpDateFilter.value
            }

            if (datePickerClass in this.$inertia.page.rememberedState) {
                dateRange = JSON.parse(this.$inertia.restore(datePickerClass))
            } else {
                dateRange = this.$inertia.page.props.pickUpDateFilter.value
            }

            return dateRange
        },
        isValidBookingForm(body) {
            this.errors = {}
            for (let contact in body.contactForm) {
                if (this.notRequiredFields.includes(contact)) {
                    continue
                }
                if (!body.contactForm[contact]) {
                    this.errors[`contactForm.${contact}`] = [`The ${this.snakeToWords(contact)} field is required.`]
                }
            }
            if (Object.keys(this.errors).length) {
                return false
            }
            return true
        },
        snakeToWords(str) {
            return str.replace(/_/g, ' ')
                .replace(/(?:^|\s)(\w)/g, (match, letter) => letter.toUpperCase())
                .replace(/(?!^)([A-Z])/g, ' $1')
        }
    }
}
</script>

<style scoped>
.swiper {
    width: 100%;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.swiper {
    margin-left: auto;
    margin-right: auto;
}
</style>
