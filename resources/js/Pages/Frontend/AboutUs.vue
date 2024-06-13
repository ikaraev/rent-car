<template>
    <FrontendLayout>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
                    <div class="md:pt-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ __('Welcome to BigRent') }}</h1>

                        <p class="text-gray-600 mb-4">{{
                                __('Your trusted partner in the world of hassle - free and convenient car rentals.')
                            }}</p>

                        <p class="text-gray-600 mb-4">
                            {{
                                __('Established with a passion for providing top-notch services in the car rental sphere, we pride ourselves on delivering a seamless and enjoyable experience to our valued customers.')
                            }}
                        </p>

                        <p class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 md:text-left">

                            {{ __('Who we are') }}</p>

                        <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
                            {{
                                __('At BigRent, we strive to provide exceptional car rental services tailored to your needs. Whether you\'re traveling for business or pleasure, our diverse fleet of vehicles is ready to meet your requirements.')
                            }}
                        </p>
                    </div>
                    <div>
                        <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
                            <img src="https://png.pngtree.com/png-vector/20220630/ourmid/pngtree-man-traveler-rent-car-png-image_5650184.png" loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <div class="container mx-auto p-8">

                            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ __('Why Choose Us?') }}</h2>

                            <ul class="list-decimal list-inside mb-4 text-gray-600">
                                <li><strong>{{ __('Diverse Fleet') }}:</strong> {{__('Our extensive fleet of well-maintained vehicles caters to a variety of preferences and needs.')}}</li>

                                <li><strong>{{ __('Customer-Centric Approach') }}:</strong> {{__('Your satisfaction is our priority. Our dedicated team is committed to providing personalized and friendly service.')}}</li>

                                <li><strong>{{ __('Easy Booking Process') }}:</strong> {{__('Our user-friendly online platform allows you to book your desired vehicle with just a few clicks.')}}</li>

                                <li><strong>{{ __('Transparency and Fair Pricing') }}:</strong> {{__('No hidden fees or surprises. We believe in transparency and fair pricing.')}}</li>

                                <li><strong>{{ __('Convenient Locations') }}:</strong> {{__('With strategically located rental stations, we make it convenient for you to pick up and drop off your rental vehicle.')}}</li>

                                <li><strong>{{ __('Safety and Maintenance') }}:</strong> {{__('Your safety is our top priority. Our vehicles undergo regular maintenance checks to ensure they meet the highest safety standards.')}}</li>
                            </ul>

                            <p class="text-gray-600 mb-4">{{__('Join the countless satisfied customers who have experienced the ease and comfort of renting with BigRent. Discover the joy of hassle-free travel with a reliable partner by your side.')}}</p>

                            <p class="text-gray-600">{{__('Thank you for considering BigRent for your car rental needs. We look forward to serving you on your next journey!')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <ContactButton/>-->
    </FrontendLayout>
</template>

<script>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import ContactButton from "@/Partials/Frontend/Index/ContactButton.vue";

export default {
    components: {ContactButton, FrontendLayout},
}

</script>
