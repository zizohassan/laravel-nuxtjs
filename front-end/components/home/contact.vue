<template>
    <div>
        <Divider dashed><h2>Contact us</h2></Divider>
        <form action="">
            <Row>
                <Col span="8">
                    <div style="margin-bottom: 10px;margin-right: 10px">
                        <Input v-model="name" placeholder="Enter your name..."/>
                        <template v-if="errors.name">
                            <Alert type="error">{{ errors.name[0] }}</Alert>
                        </template>
                    </div>
                </Col>
                <Col span="8">
                    <div style="margin-bottom: 10px;margin-right: 10px">
                        <Input v-model="email" type="email" placeholder="Enter your email..."/>
                        <template v-if="errors.email">
                            <Alert type="error">{{ errors.email[0] }}</Alert>
                        </template>
                    </div>
                </Col>
                <Col span="8">
                    <div style="margin-bottom: 10px;margin-right: 10px">
                        <Input v-model="mobile" placeholder="Enter your mobile..."/>
                        <template v-if="errors.mobile">
                            <Alert type="error">{{ errors.mobile[0] }}</Alert>
                        </template>
                    </div>
                </Col>
                <Col span="24">
                    <Input v-model="message"  show-word-limit type="textarea"
                           placeholder="Enter something..."/>
                    <template v-if="errors.message">
                        <Alert type="error">{{ errors.message[0] }}</Alert>
                    </template>
                </Col>
                <Button style="margin-top: 10px;" type="primary" @click.prevent="contact">Send Message</Button>
            </Row>
        </form>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                name:'',
                email:'',
                mobile:'',
                message:'',
                loading: true,
                value1: 0,
                response:[],
                errors:{},
            }
        },
        mounted() {

        },
        methods: {
            contact() {
                this.loading = true;
                let url = process.env.baseUrl + 'api/contacts';
                let data = {
                    name : this.name,
                    email : this.email,
                    mobile:this.mobile,
                    message:this.message
                }
                this.$axios.post(url , data).then((res) => {
                    this.response = res.data;
                    if(this.response.status == true){
                        this.$Message.success(this.response.message);
                        this.errors= {};
                        this.name = '';
                        this.email = '';
                        this.mobile = '';
                        this.message = '';
                    }else{
                        this.$Message.error(this.response.message);
                        this.errors = res.data.payload;
                    }
                });

            }
        }
    }
</script>