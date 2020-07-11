<template>
    <div class="layout">
        <Layout>
            <Header>
                <Menu mode="horizontal" theme="dark" active-name="1">
                    <div class="layout-logo">
                        <img src="5adamat-web1.png" alt="" width="130">
                    </div>
                    <div class="layout-nav">
                        <MenuItem name="1">
                            <NuxtLink to="/" class="white">
                                Home
                            </NuxtLink>
                        </MenuItem>
                        <MenuItem name="2">
                            <NuxtLink to="/services" class="white">
                                Services
                            </NuxtLink>
                        </MenuItem>
                        <MenuItem name="3">
                            <NuxtLink to="/teams" class="white">
                                Teams
                            </NuxtLink>
                        </MenuItem>
                        <MenuItem name="4">
                            <NuxtLink to="/our_works" class="white">
                                Our Works
                            </NuxtLink>
                        </MenuItem>
                        <MenuItem name="4">
                            <NuxtLink to="/clients" class="white">
                                Clients
                            </NuxtLink>
                        </MenuItem>
                        <MenuItem name="4">
                            <NuxtLink to="/pages/1" class="white">
                                About us
                            </NuxtLink>
                        </MenuItem>
                        <MenuItem name="4">
                            <NuxtLink to="/pages/2" class="white">
                                Privacy
                            </NuxtLink>
                        </MenuItem>
                        <MenuItem name="4">
                            <NuxtLink to="/pages/3" class="white">
                                Terms and condtions
                            </NuxtLink>
                        </MenuItem>
                    </div>
                </Menu>
            </Header>
            <Content style="padding: 0 50px ;margin-top:20px">
                <Card>
                    <div style="min-height: 200px;">
                        <Nuxt/>
                    </div>
                </Card>
            </Content>
            <Footer class="layout-footer-center">2020-2021 &copy; 5dmat-web.com</Footer>
        </Layout>
    </div>
</template>
<script>
    export default {
        head() {
            return {
                title: '5dmat-web',
            }
        }
    }
</script>
<style scoped>
    .layout {
        background: #f5f7f9;
        position: relative;
        overflow: hidden;
    }

    .layout-logo {
        width: 100px;
        height: 30px;
        float: left;
        position: relative;
        top: 15px;
        left: 20px;
        margin-right: 40px;
    }

    .layout-nav {
        margin: 0 10px 0 10px;
        margin-right: 20px;
    }

    .layout-footer-center {
        text-align: center;
    }
    .white{
        color: white;
    }
</style>
