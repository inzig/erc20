<template>

    <transition name="slide-fade">
        <div key="kyc" class="panel panel-primary margin-top-50 margin-bottom-70">
            <div class="panel-heading">
                <i class="fa fa-user-fa-fw"></i> User detail information for KYC
            </div>

            <div class="panel-body form-material padding-80">
                <div class="row" v-if="!message">
                    <form id="kycForm" @submit.prevent="uploadKYCForm">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputFirstName" class="text-white-color">First Name:</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" required v-model="kycForm.first_name">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputMiddleName" class="text-white-color">Middle Name:</label>
                                <input class="form-control" id="inputMiddleName" type="text" placeholder="Enter your middle name" v-model="kycForm.middle_name">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputLastName" class="text-white-color">Last Name:</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" required v-model="kycForm.last_name">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputDOBName" class="text-white-color">Date of birth:</label>
                                <input class="form-control" id="inputDOBName" name="inputDOBName" type="date" placeholder="YYYY-MM-DD"
                                       pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"
                                       title="Enter date of birth"
                                       required v-model="kycForm.dob">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputCountryName">Country of Residence:</label>
                                <select class="form-control" id="inputCountryName" v-model="kycForm.country" required>
                                    <option value="">Select your county</option>
                                    <option v-for="(alias, country) in dataList.countries" :value="country" v-html="country"></option>
                                </select>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputNationalityName">Nationality:</label>
                                <select class="form-control" id="inputNationalityName" v-model="kycForm.nationality" required>
                                    <option value="">Select your nationality</option>
                                    <option v-for="(alias, country) in dataList.countries" :value="alias.toUpperCase()" v-html="alias.toUpperCase()"></option>
                                </select>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputAddressName" class="text-white-color">Complete Address:</label>
                                <input class="form-control" id="inputAddressName" type="text" placeholder="Enter your complete address" required v-model="kycForm.address">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputCityName" class="text-white-color">City:</label>
                                <input class="form-control" id="inputCityName" type="text" placeholder="Enter your city" required v-model="kycForm.city">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputStateName" class="text-white-color">State:</label>
                                <input class="form-control" id="inputStateName" type="text" placeholder="Enter your state/province" required v-model="kycForm.state">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <button class="btn btn-primary waves-effect btn-copy update-btn waves-light" data-loading-text="&lt;i class=&quot;fa fa-refresh fa-spin&quot;&gt;&lt;/i&gt; Uploading KYC ..."><span class="btn-label"><i class="fa fa-check"></i></span> Click to Continue</button>
                        </div>

                        <div class="col-sm-5 col-sm-offset-1">

                            <h2 class="text-white">Upload your document <br>
                                <small class="text-white">Admin will verify your details</small>
                            </h2>

                            <div class="form-group margin-top-50">
                                <label for="inputDocType">Document type:</label>
                                <select class="form-control" id="inputDocType" v-model="kycForm.doc_type" required>
                                    <option value="">Select upload document type</option>
                                    <option>Passport</option>
                                    <option>Driving license</option>
                                    <option>National Identity Card</option>
                                </select>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>

                            <transition name="slide-fade">
                                <div key="doc_selector" v-show="kycForm.doc_type!==''"><input type="file" id="input-doc-now" :data-default-file="kycForm.document" @change="onFileChange"></div>
                            </transition>
                        </div>
                    </form>
                </div>

                <div class="row" v-else>
                    <div class="col-lg-12">
                        <div class="alert alert-success text-center m-0" role="alert" v-html="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </transition>

</template>

<script>
    export default {
        name: "k-y-c-form",

        data() {
            return {
                dataList: {},
                message: '',
                drEvent: '',
                kycForm: {
                    first_name: '',
                    middle_name: '',
                    last_name: '',
                    dob: '',
                    country: '',
                    nationality: '',
                    address: '',
                    city: '',
                    state: '',
                    doc_type: '',
                    document: ''
                }
            };
        },

        mounted() {
            this.prepareComponent();
        },

        methods: {
            prepareComponent() {
                axios.get('/api/kyc/data').then(r => {
                    this.dataList = r.data;
                    setTimeout(() => {
                        if (this.dataList.form)
                            this.kycForm = this.dataList.form;

                        if (this.kycForm.verified)
                            this.message = 'Your KYC has been verified and now you can buy tokens.';
                        else
                            setTimeout(() => {
                                this.drEvent = $('#input-doc-now').dropify();
                            }, 100);
                    }, 300);
                });

            },

            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;

                if (!files.length)
                    return;

                let formData = new FormData();
                formData.append('avatar', files[0]);

                axios.post('/api/image/upload', formData).then((r) => {
                    this.kycForm.document = r.data.path;
                });
            },

            uploadKYCForm(e) {
                if (!this.kycForm.document) {
                    new Noty({
                        type: 'warning',
                        text: '<div><p class="m-0">Please add document for KYC.</p></div>'
                    }).show();
                    return;
                }

                let $btn = $(e.target).find('button').button('loading');

                axios.post('/api/kyc/admin', this.kycForm).then((r) => {
                    $btn.button('reset');
                    new Noty({
                        type: 'success',
                        text: '<div><p class="m-0">' + r.data.status + '</p></div>'
                    }).show();
                });
            },

            clearForm() {
                let drEvent = this.drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                $('#kycForm')[0].reset();
            }
        }
    }
</script>

<style scoped>

</style>