<template>
    <span>
        <button class="btn btn-primary" :class="crypto.toLowerCase()!='bitcoin'?'ar-icons':''" @click="getAddressToShow" v-html="type"></button>
        <modal v-if="showModal" @close="resetModal" modalType="modal-qrcode">
            <div slot="body">
                <h5 class="text-center" v-html="token"></h5>
                <hr>
                <div class="showcode text-center">
                    <div>
                        <qrcode :text="token" :size="400"></qrcode>
                    </div>
                </div>

                <div class="alert alert-warning text-center m-0 m-t-1">
                    Minimum deposit amount is {{ minbtc }} for <b v-html="crypto"></b>. <span v-if="crypto.toLowerCase()!='ethereum'">If you provide any lesser amount, it won't be accepted.</span>
                </div>
            </div>
        </modal>
    </span>
</template>

<script>
    export default {
        props: ['type', 'crypto', 'minbtc'],

        data() {
            return {
                showModal: false,
                token: ''
            };
        },

        mounted() {
            this.token = '<i class="fa fa-repeat fa-spin"></i> Loading ' + this.crypto + ' contract address ...';
        },

        methods: {
            getAddressToShow() {
                this.showModal = true;
                axios.get('/api/contract/address/' + this.crypto.toLowerCase()).then((r) => {
                    this.token = r.data.address;
                });
            },

            resetModal() {
                this.showModal = false;
                this.token = '<i class="fa fa-repeat fa-spin"></i> Loading ' + this.crypto + ' contract address ...';
            }
        }
    }
</script>
