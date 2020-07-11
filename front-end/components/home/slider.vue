<template>
    <Carousel v-model="value1" loop>
        <CarouselItem v-for="row in rows" :key="'slider_'+row.id">
            <div class="demo-carousel rel">
                <h1 v-if="row.name"  class="sliderTitle">{{ row.name}}</h1>
                <p v-if="row.des" class="sliderDes">{{ row.des}}</p>
                <img :src="$images(row.image , 'org')" style="width: 100%">
                <a class="more" v-if="row.link" :href="row.link">More</a>
            </div>
        </CarouselItem>
    </Carousel>
</template>
<script>
    export default {
        data() {
            return {
                rows: [],
                loading: true,
                value1: 0
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.loading = true;
                let url = process.env.moduleUrl + 'sliders';
                this.$axios.$get(url).then((res) => {
                    this.rows = res.payload.data;
                    this.loading = false;
                })
            }
        }
    }
</script>
<style>
    .rel {
        position: relative;
    }

    .sliderTitle {
        position: absolute;
        z-index: 10;
        top: 30%;
        left: 10%;
        font-size: 50px;
        color: #ffffff;
        background-color: #47494e;
        opacity: .8;
        padding: 10px;
        text-transform: uppercase;
    }

    .sliderDes {
        width: 450px;
        position: absolute;
        z-index: 10;
        top: 50%;
        left: 10%;
        color: #ffffff;
        background-color: orangered;
        opacity: .8;
        padding: 10px;
        text-transform: lowercase;
    }

    .more{
        position: absolute;
        z-index: 10;
        top: 80%;
        left: 10%;
        color: #ffffff;
        background-color: orangered;
        opacity: .8;
        padding: 10px;
        text-transform: lowercase;
    }

</style>