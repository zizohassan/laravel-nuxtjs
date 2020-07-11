<template>
    <div class="container">
        <div>
            <Slider />
            <Service />
            <Test />
            <Contact />
        </div>
    </div>
</template>

<script>
    import Slider from '../components/home/slider'
    import Test from '../components/home/test'
    import Service from '../components/home/service'
    import Contact from '../components/home/contact'

    export default {
        comments: {
            Slider,
            Test,
            Service,
            Contact
        }
    }
</script>

