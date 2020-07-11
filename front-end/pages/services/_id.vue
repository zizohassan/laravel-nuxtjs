<template>
    <div class="container">
        <div>
            <Loading v-if="loading"/>
            <Row v-else>
                <Col span="24">
                    <div style="text-align:center">
                        <img :src="$images(row.image , 'org')" style="width: 100%" >
                    </div>
                    <br>
                    <h1 >{{ row.name }}</h1>
                    <br>
                    <p v-html="row.description"></p>
                </Col>
            </Row>
        </div>
    </div>
</template>

<script>
    import Loading from '../../components/loading'

    export default {
        comments: {
            Loading
        },
        data() {
            return {
                row: {},
                loading: true,
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.loading = true;
                let url = process.env.moduleUrl + 'services/' + this.$route.params.id;
                this.$axios.$get(url).then((res) => {
                    this.row = res.payload;
                    this.loading = false;
                })
            }
        }
    }
</script>

