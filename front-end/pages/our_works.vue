<template>
    <div class="container" >
        <div>
            <h1>
                Our Works
                ({{ total }})
            </h1>
            <p>
                Happy for us
            </p>
            <br/>
            <Loading v-if="loading"/>
            <List item-layout="vertical">
                <ListItem v-for="row in rows" :key="row.id">
                    <template slot="extra">
                        <img :src="$images(row.image)" width="250">
                    </template>
                    <ListItemMeta  :title="row.name" />
                    {{ row.description }}
                    <template slot="action">
                        <li v-if="row.link">
                           <NuxtLink :to="row.link"><Icon type="md-link" /> visit</NuxtLink>
                        </li>
                        <li>
                            <Icon type="md-calendar" /> {{ row.created_at}}
                        </li>
                    </template>
                </ListItem>
            </List>
            <template v-if="currentPage != lastPage">
                <Button type="primary" :loading="loading" @click="fetchData">
                    <span v-if="!loading">Click me!</span>
                    <span v-else>Loading...</span>
                </Button>
            </template>
        </div>
    </div>
</template>

<script>
    import Loading from '../components/loading'
    export default {
        comments: {
            Loading
        },
        data() {
            return {
                rows: [],
                loading: false,
                lastPage: 1,
                nextUrl: '',
                currentPage: 1,
                total: 0
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.loading = true;
                let url = process.env.moduleUrl + 'our_works';
                if (this.nextUrl !== '' && this.nextUrl != null) {
                    url = this.nextUrl;
                }
                this.$axios.$get(url).then((res) => {
                    if (this.rows.length > 0) {
                        this.rows = [...this.rows, ...res.payload.data];
                    } else {
                        this.rows = res.payload.data;
                    }
                    this.nextUrl = res.payload.next_page_url;
                    this.lastPage = res.payload.last_page;
                    this.currentPage = res.payload.current_page;
                    this.total = res.payload.total;
                    this.loading = false;
                })
            }
        }
    }
</script>

